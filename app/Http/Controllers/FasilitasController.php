<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use Illuminate\Http\Request;

class FasilitasController extends Controller
{
    public function index(Request $request)
    {
        $title = 'Fasilitas';
        $search = request()->input('search');

        $fasilitas = Fasilitas::when($search, function ($query) use ($search) {
            $query->where('nama', 'LIKE', '%'.$search.'%');
        })
        ->orderBy('id', 'ASC')
        ->paginate(10)
        ->withQueryString();

        return view('fasilitas.index', compact(
            'title',
            'fasilitas'
        ));
    }

    public function tambah()
    {
        $title = 'Fasilitas';

        return view('fasilitas.tambah', compact(
            'title',
        ));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'fasilitas' => 'required|image|file|max:10240',
        ]);

        if ($request->file('fasilitas')) {
            $validated['fasilitas'] = $request->file('fasilitas')->store('fasilitas');
        }

        Fasilitas::create($validated);

        return redirect('/fasilitas')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $title = 'Fasilitas';
        $fasilitas = Fasilitas::find($id);

        return view('fasilitas.edit', compact(
            'title',
            'fasilitas',
        ));
    }

    public function update(Request $request, $id)
    {
        $fasilitas = Fasilitas::find($id);

        $validated = $request->validate([
            'nama' => 'required',
            'fasilitas' => 'image|file|max:10240',
        ]);

        if ($request->file('fasilitas')) {
            $validated['fasilitas'] = $request->file('fasilitas')->store('fasilitas');
        }

        $fasilitas->update($validated);

        return redirect('/fasilitas')->with('success', 'Data Berhasil Diupdate');
    }

    public function delete($id)
    {
        $fasilitas = Fasilitas::find($id);
        $fasilitas->delete();
        return back()->with('success', 'Data Berhasil Dihapus');
    }
}
