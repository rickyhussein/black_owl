<?php

namespace App\Http\Controllers;

use App\Models\Kontak;
use Illuminate\Http\Request;

class KontakController extends Controller
{
    public function index(Request $request)
    {
        $title = 'Kontak';
        $search = request()->input('search');

        $kontak = Kontak::when($search, function ($query) use ($search) {
            $query->where('nama', 'LIKE', '%'.$search.'%')
            ->orWhere('nomor', 'LIKE', '%'.$search.'%');
        })
        ->orderBy('id', 'ASC')
        ->paginate(10)
        ->withQueryString();

        return view('kontak.index', compact(
            'title',
            'kontak'
        ));
    }

    public function tambah()
    {
        $title = 'Kontak';

        return view('kontak.tambah', compact(
            'title',
        ));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'nomor' => 'required',
        ]);

        Kontak::create($validated);

        return redirect('/kontak')->with('success', 'Data Berhasil di Tambahkan');
    }

    public function edit($id)
    {
        $title = 'Kontak';
        $kontak = Kontak::find($id);

        return view('kontak.edit', compact(
            'title',
            'kontak',
        ));
    }

    public function update(Request $request, $id)
    {
        $kontak = Kontak::find($id);

        $validated = $request->validate([
            'nama' => 'required',
            'nomor' => 'required',
        ]);

        $kontak->update($validated);

        return redirect('/kontak')->with('success', 'Data Berhasil di Diupdate');
    }

    public function delete($id)
    {
        $kontak = Kontak::find($id);
        $kontak->delete();
        return back()->with('success', 'Data Berhasil di Dihapus');
    }
}
