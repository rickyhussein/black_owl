<?php

namespace App\Http\Controllers;

use App\Models\Agama;
use Illuminate\Http\Request;

class AgamaController extends Controller
{
    public function index()
    {
        $title = 'Agama';
        $search = request()->input('search');
        $start_date = request()->input('start_date');
        $end_date = request()->input('end_date');

        $agamas = Agama::when($start_date && $end_date, function ($query) use ($start_date, $end_date) {
            $query->whereBetween('date', [$start_date, $end_date]);
        })
        ->when($search, function ($query) use ($search) {
            $query->where('title', 'LIKE', '%' . $search . '%')
            ->orWhere('day', 'LIKE', '%' . $search . '%');
        })
        ->orderBy('type', 'DESC')
        ->orderBy('id', 'DESC')
        ->paginate(10)
        ->withQueryString();

        return view('agama.index', compact(
            'title',
            'agamas'
        ));
    }

    public function calendar()
    {
        $title = 'Agama';
        $agamas = Agama::orderBy('id', 'ASC')->get();

        return view('agama.calendar', compact(
            'title',
            'agamas'
        ));
    }

    public function tambah()
    {
        $title = 'Agama';
        return view('agama.tambah', compact(
            'title'
        ));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'type' => 'required',
            'day' => 'required_if:type,Jadwal Tetap|unique:agamas|nullable',
            'date' => 'required_if:type,Event',
            'title' => 'required',
            'note' => 'nullable',
            'contact_person' => 'nullable',
        ]);

        $validated['created_by'] = auth()->user()->id;
        Agama::create($validated);

        return redirect('/agama')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $title = 'Agama';
        $agama = Agama::find($id);

        return view('agama.edit', compact(
            'title',
            'agama',
        ));
    }

    public function update(Request $request, $id)
    {
        $agama = Agama::find($id);

        $rules = [
            'type' => 'required',
            'date' => 'required_if:type,Event',
            'title' => 'required',
            'note' => 'nullable',
            'contact_person' => 'nullable',
        ];

        if ($request->day != $agama->day) {
            $rules['day'] = 'required_if:type,Jadwal Tetap|unique:agamas|nullable';
        }

        $validated = $request->validate($rules);

        $validated['updated_by'] = auth()->user()->id;
        $agama->update($validated);

        return redirect('/agama')->with('success', 'Data Berhasil Diupdate');
    }

    public function delete($id)
    {
        $agama = Agama::find($id);
        $agama->delete();
        return redirect('/agama')->with('success', 'Data Berhasil Dihapus');
    }

    public function myAgama()
    {
        $title = 'Agama';
        $agamas = Agama::orderBy('id', 'ASC')->get();

        return view('agama.myAgama', compact(
            'title',
            'agamas'
        ));
    }
}
