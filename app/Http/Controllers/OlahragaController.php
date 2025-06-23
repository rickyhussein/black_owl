<?php

namespace App\Http\Controllers;

use App\Models\Olahraga;
use Illuminate\Http\Request;

class OlahragaController extends Controller
{
    public function index()
    {
        $title = 'Olahraga';
        $search = request()->input('search');
        $start_date = request()->input('start_date');
        $end_date = request()->input('end_date');

        $olahragas = Olahraga::when($start_date && $end_date, function ($query) use ($start_date, $end_date) {
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

        return view('olahraga.index', compact(
            'title',
            'olahragas'
        ));
    }

    public function calendar()
    {
        $title = 'Olahraga';
        $olahragas = Olahraga::orderBy('id', 'ASC')->get();

        return view('olahraga.calendar', compact(
            'title',
            'olahragas'
        ));
    }

    public function tambah()
    {
        $title = 'Olahraga';
        return view('olahraga.tambah', compact(
            'title'
        ));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'type' => 'required',
            'day' => 'required_if:type,Jadwal Tetap|unique:olahragas|nullable',
            'date' => 'required_if:type,Event',
            'title' => 'required',
            'note' => 'nullable',
            'contact_person' => 'nullable',
        ]);

        $validated['created_by'] = auth()->user()->id;
        Olahraga::create($validated);

        return redirect('/olahraga')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $title = 'Olahraga';
        $olahraga = Olahraga::find($id);

        return view('olahraga.edit', compact(
            'title',
            'olahraga',
        ));
    }

    public function update(Request $request, $id)
    {
        $olahraga = Olahraga::find($id);

        $rules = [
            'type' => 'required',
            'date' => 'required_if:type,Event',
            'title' => 'required',
            'note' => 'nullable',
            'contact_person' => 'nullable',
        ];

        if ($request->day != $olahraga->day) {
            $rules['day'] = 'required_if:type,Jadwal Tetap|unique:olahragas|nullable';
        }

        $validated = $request->validate($rules);

        $validated['updated_by'] = auth()->user()->id;
        $olahraga->update($validated);

        return redirect('/olahraga')->with('success', 'Data Berhasil Diupdate');
    }

    public function delete($id)
    {
        $olahraga = Olahraga::find($id);
        $olahraga->delete();
        return redirect('/olahraga')->with('success', 'Data Berhasil Dihapus');
    }

    public function myOlahraga()
    {
        $title = 'Olahraga';
        $olahragas = Olahraga::orderBy('id', 'ASC')->get();

        return view('olahraga.myOlahraga', compact(
            'title',
            'olahragas'
        ));
    }
}
