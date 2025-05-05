<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\KritikSaran;
use Illuminate\Http\Request;
use App\Exports\KritikSaranExport;
use Illuminate\Support\Facades\DB;

class KritiksSaranController extends Controller
{
    public function index()
    {
        $title = 'Kritik & Saran';
        $search = request()->input('search');
        $status = request()->input('status');

        $kritik_sarans = KritikSaran::when($search, function ($query) use ($search) {
            $query->where(function ($query) use ($search) {
                $query->where('judul', 'LIKE', '%' . $search . '%')
                ->orWhere('kritik_saran', 'LIKE', '%' . $search . '%')
                ->orWhereHas('user', function ($q) use ($search) {
                    $q->where('name', 'LIKE', '%' . $search . '%')
                    ->orWhere('alamat', 'LIKE', '%' . $search . '%');
                });
            });
        })
        ->when($status, function ($query) use ($status) {
            $query->where('status', $status);
        })
        ->orderBy('id', 'DESC')
        ->paginate(10)
        ->withQueryString();

        return view('kritik_saran.index', compact(
            'title',
            'kritik_sarans',
        ));
    }

    public function export()
    {
        return (new KritikSaranExport($_GET))->download('Kritik & Saran.xlsx');
    }

    public function show($id)
    {
        $title = 'Kritik & Saran';
        $kritik_saran = KritikSaran::find($id);

        return view('kritik_saran.show', compact(
            'title',
            'kritik_saran',
        ));
    }

    public function approval(Request $request, $id)
    {
        $kritik_saran = KritikSaran::find($id);
        $status = null;
        DB::transaction(function ()  use ($request, $kritik_saran, $status) {
            $validated = $request->validate([
                'status' => 'required',
                'catatan_pengurus' => 'nullable',
            ]);

            $validated['approved_by'] = auth()->user()->id;

            $kritik_saran->update($validated);

            if ($request->status == 'approved') {
                $this->status = 'Diapprove';
                $message = 'Kritik & Saran anda telah di approve oleh ' . auth()->user()->name;
            } else {
                $this->status = 'Direject';
                $message = 'Kritik & Saran anda telah di reject oleh ' . auth()->user()->name;
            }

            $user = User::find($kritik_saran->user_id);
            $user->messages = [
                'user_id'   =>  auth()->user()->id,
                'from'   =>  auth()->user()->name,
                'message'   =>  $message ,
                'action'   =>  '/my-kritik-saran/show/'.$kritik_saran->id
            ];
            $user->notify(new \App\Notifications\UserNotification);

        });

        return redirect('/kritik-saran/show/'.$id)->with('success', 'Data Berhasil ' . $this->status);
    }

    public function myKritikSaran()
    {
        $title = 'Kritik & Saran';
        $search = request()->input('search');
        $search_2 = request()->input('search_2');

        $my_kritik_sarans = KritikSaran::where('user_id', auth()->user()->id)
        ->when($search, function ($query) use ($search) {
            $query->where('judul', 'LIKE', '%' . $search . '%');
        })
        ->orderBy('id', 'DESC')
        ->paginate(10, ['*'], 'my')
        ->withQueryString();

        $all_kritik_sarans = KritikSaran::where('status', 'approved')
        ->when($search_2, function ($query) use ($search_2) {
            $query->where(function ($query) use ($search_2) {
                $query->where('judul', 'LIKE', '%' . $search_2 . '%')
                ->orWhereHas('user', function ($q) use ($search_2) {
                    $q->where('name', 'LIKE', '%' . $search_2 . '%');
                });
            });
        })
        ->orderBy('id', 'DESC')
        ->paginate(10, ['*'], 'all')
        ->withQueryString();

        if (request()->has('all') || $search_2) {
            $active_tab = 'all';
        } else {
            $active_tab = 'my';
        }

        return view('kritik_saran.myKritikSaran', compact(
            'title',
            'my_kritik_sarans',
            'all_kritik_sarans',
            'active_tab',
        ));
    }

    public function tambahMyKritikSaran()
    {
        $title = 'Kritik & Saran';

        return view('kritik_saran.tambahMyKritikSaran', compact(
            'title',
        ));
    }

    public function storeMyKritikSaran(Request $request)
    {
        $result = null;
        DB::transaction(function ()  use ($request, $result) {
            $validated = $request->validate([
                'judul' => 'required',
                'kritik_saran' => 'required',
                'kritik_saran_file_path' => 'file|max:10240',
            ]);

            if ($request->file('kritik_saran_file_path')) {
                $validated['kritik_saran_file_path'] = $request->file('kritik_saran_file_path')->store('kritik_saran_file_path');
                $validated['kritik_saran_file_name'] = $request->file('kritik_saran_file_path')->getClientOriginalName();
            }

            $validated['date'] = date('Y-m-d');
            $validated['status'] = 'draft';
            $validated['user_id'] = auth()->user()->id;

            $kritik_saran = KritikSaran::create($validated);
            $this->result = $kritik_saran->id;

            $users = User::whereHas('roles', function ($query) {
                $query->where('name', 'admin');
            })->get();

            foreach ($users as $user) {
                $user->messages = [
                    'user_id'   =>  auth()->user()->id,
                    'from'   =>  auth()->user()->name,
                    'message'   =>  'Kritik & Saran dari ' . auth()->user()->name . ' dengan judul ' . $kritik_saran->judul . ' membutuhkan approval dari anda.',
                    'action'   =>  '/kritik-saran/show/'.$kritik_saran->id
                ];
                $user->notify(new \App\Notifications\UserNotification);
            }
        });

        return redirect('/my-kritik-saran/show/'.$this->result)->with('success', 'Data Berhasil Ditambahkan');
    }

    public function editMyKritikSaran($id)
    {
        $title = 'Kritik & Saran';
        $kritik_saran = KritikSaran::find($id);

        return view('kritik_saran.editMyKritikSaran', compact(
            'title',
            'kritik_saran',
        ));
    }

    public function updateMyKritikSaran(Request $request, $id)
    {
        $kritik_saran = KritikSaran::find($id);
        DB::transaction(function ()  use ($request, $kritik_saran) {
            $validated = $request->validate([
                'judul' => 'required',
                'kritik_saran' => 'required',
                'kritik_saran_file_path' => 'file|max:10240',
            ]);

            if ($request->file('kritik_saran_file_path')) {
                $validated['kritik_saran_file_path'] = $request->file('kritik_saran_file_path')->store('kritik_saran_file_path');
                $validated['kritik_saran_file_name'] = $request->file('kritik_saran_file_path')->getClientOriginalName();
            }

            $kritik_saran->update($validated);

            $users = User::whereHas('roles', function ($query) {
                $query->where('name', 'admin');
            })->get();

            foreach ($users as $user) {
                $user->messages = [
                    'user_id'   =>  auth()->user()->id,
                    'from'   =>  auth()->user()->name,
                    'message'   =>  'Kritik & Saran dari ' . auth()->user()->name . ' dengan judul ' . $kritik_saran->judul . ' membutuhkan approval dari anda.',
                    'action'   =>  '/kritik-saran/show/'.$kritik_saran->id
                ];
                $user->notify(new \App\Notifications\UserNotification);
            }
        });

        return redirect('/my-kritik-saran/show/'.$id)->with('success', 'Data Berhasil Diupdate');
    }

    public function showMyKritikSaran($id)
    {
        $title = 'Kritik & Saran';
        $kritik_saran = KritikSaran::find($id);

        return view('kritik_saran.showMyKritikSaran', compact(
            'title',
            'kritik_saran',
        ));
    }

    public function deleteMyKritikSaran($id)
    {
        $kritik_saran = KritikSaran::find($id);
        DB::transaction(function ()  use ($kritik_saran) {
            $kritik_saran->delete();
        });

        return redirect('/my-kritik-saran')->with('success', 'Data Berhasil Didelete');
    }
}
