<?php

namespace App\Http\Controllers;

use App\Models\Umkm;
use App\Models\UmkmItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UmkmController extends Controller
{
    public function myUmkm()
    {
        $title = 'UMKM';
        $search = request()->input('search');

        $umkms = Umkm::where('user_id', auth()->user()->id)
        ->when($search, function ($query) use ($search) {
            $query->where('name', 'LIKE', '%' . $search . '%');
        })
        ->orderBy('id', 'DESC')
        ->paginate(10)
        ->withQueryString();

        return view('umkm.myUmkm', compact(
            'title',
            'umkms'
        ));
    }

    public function tambahMyUmkm()
    {
        $title = 'UMKM';

        return view('umkm.tambahMyUmkm', compact(
            'title',
        ));
    }

    public function storeMyUmkm(Request $request)
    {
        $result = null;
        DB::transaction(function ()  use ($request, $result) {
            $validated = $request->validate([
                'name' => 'required',
                'description' => 'required',
                'price' => 'required',
                'video_file_path' => 'nullable',
            ]);

            if ($request->file('video_file_path')) {
                $validated['video_file_path'] = $request->file('video_file_path')->store('video_file_path');
                $validated['video_file_name'] = $request->file('video_file_path')->getClientOriginalName();
            }

            $validated['price'] = $request->price ? str_replace(',', '', $request->price) : 0;
            $validated['date'] = date('Y-m-d');
            $validated['user_id'] = auth()->user()->id;
            $validated['created_by'] = auth()->user()->id;

            $umkm = Umkm::create($validated);
            $this->result = $umkm->id;

            $umkm_file_path = $request->file('umkm_file_path');

            if (is_array($umkm_file_path)) {
                foreach ($umkm_file_path as $file) {
                    if ($file && $file->isValid()) {
                        $path = $file->store('umkm_file_path');
                        $name = $file->getClientOriginalName();

                        UmkmItem::create([
                            'umkm_id' => $umkm->id,
                            'umkm_file_path' => $path,
                            'umkm_file_name' => $name,
                        ]);
                    }
                }
            }
        });

        return redirect('/my-umkm/show/'.$this->result)->with('success', 'Data Berhasil Ditambahkan');
    }

    public function editMyUmkm($id)
    {
        $title = 'UMKM';
        $umkm = Umkm::find($id);

        return view('umkm.editMyUmkm', compact(
            'title',
            'umkm',
        ));
    }

    public function updateMyUmkm(Request $request, $id)
    {
        $umkm = Umkm::find($id);
        DB::transaction(function ()  use ($request, $umkm) {
            $validated = $request->validate([
                'name' => 'required',
                'description' => 'required',
                'price' => 'required',
                'video_file_path' => 'nullable',
            ]);

            if ($request->file('video_file_path')) {
                $validated['video_file_path'] = $request->file('video_file_path')->store('video_file_path');
                $validated['video_file_name'] = $request->file('video_file_path')->getClientOriginalName();
            }

            $validated['price'] = $request->price ? str_replace(',', '', $request->price) : 0;
            $validated['updated_by'] = auth()->user()->id;

            $umkm->update($validated);

            $old_paths = $request->input('old_umkm_file_path', []);
            $old_names = $request->input('old_umkm_file_name', []);
            $new_files = $request->file('umkm_file_path', []);

            UmkmItem::where('umkm_id', $umkm->id)->delete();

            $all_indexes = array_unique(array_merge(
                array_keys($old_paths),
                array_keys($new_files)
            ));

            foreach ($all_indexes as $i) {
                if (isset($new_files[$i]) && $new_files[$i] && $new_files[$i]->isValid()) {
                    $path = $new_files[$i]->store('umkm_file_path');
                    $name = $new_files[$i]->getClientOriginalName();
                } elseif (!empty($old_paths[$i]) && !empty($old_names[$i])) {
                    $path = $old_paths[$i];
                    $name = $old_names[$i];
                } else {
                    continue;
                }

                UmkmItem::create([
                    'umkm_id' => $umkm->id,
                    'umkm_file_path' => $path,
                    'umkm_file_name' => $name,
                ]);
            }
        });

        return redirect('/my-umkm/show/'.$umkm->id)->with('success', 'Data Berhasil Diupdate');
    }

    public function showMyUmkm($id)
    {
        $title = 'UMKM';
        $umkm = Umkm::find($id);

        return view('umkm.showMyUmkm', compact(
            'title',
            'umkm',
        ));
    }

    public function deleteMyUmkm($id)
    {
        $umkm = Umkm::find($id);
        $umkm->delete();
        return redirect('/my-umkm')->with('success', 'Data Berhasil Dihapus');
    }
}
