<?php

namespace App\Http\Controllers;

use App\Models\Pengurus;
use Illuminate\Http\Request;

class PengurusController extends Controller
{
    public function index(Request $request)
    {
        $title = 'Pengurus';
        $search = request()->input('search');

        $pengurus = Pengurus::when($search, function ($query) use ($search) {
            $query->where('nama', 'LIKE', '%'.$search.'%');
        })
        ->orderBy('id', 'ASC')
        ->paginate(10)
        ->withQueryString();

        return view('pengurus.index', compact(
            'title',
            'pengurus'
        ));
    }

    public function tambah()
    {
        $title = 'Pengurus';

        return view('pengurus.tambah', compact(
            'title',
        ));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'posisi' => 'required',
            'foto_pengurus' => 'required|image|file|max:10240',
            'instagram' => 'nullable',
            'youtube' => 'nullable',
            'whatsapp' => 'nullable',
            'facebook' => 'nullable',
        ]);

        if ($request->file('foto_pengurus')) {
            $validated['foto_pengurus'] = $request->file('foto_pengurus')->store('foto_pengurus');
        }

        Pengurus::create($validated);

        return redirect('/pengurus')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $title = 'Pengurus';
        $pengurus = Pengurus::find($id);

        return view('pengurus.edit', compact(
            'title',
            'pengurus',
        ));
    }

    public function update(Request $request, $id)
    {
        $pengurus = Pengurus::find($id);

        $validated = $request->validate([
            'nama' => 'required',
            'posisi' => 'required',
            'foto_pengurus' => 'image|file|max:10240',
            'instagram' => 'nullable',
            'youtube' => 'nullable',
            'whatsapp' => 'nullable',
            'facebook' => 'nullable',
        ]);

        if ($request->file('foto_pengurus')) {
            $validated['foto_pengurus'] = $request->file('foto_pengurus')->store('foto_pengurus');
        }

        $pengurus->update($validated);

        return redirect('/pengurus')->with('success', 'Data Berhasil Diupdate');
    }

    public function delete($id)
    {
        $pengurus = Pengurus::find($id);
        $pengurus->delete();
        return redirect('/pengurus')->with('success', 'Data Berhasil Dihapus');

    }
}
