<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index()
    {
        $title = 'Berita Publik';
        $search = request()->input('search');
        $start_date = request()->input('start_date');
        $end_date = request()->input('end_date');

        $beritas = Berita::when($start_date && $end_date, function ($query) use ($start_date, $end_date) {
            $query->whereBetween('date', [$start_date, $end_date]);
        })
        ->when($search, function ($query) use ($search) {
            $query->where('judul', 'LIKE', '%' . $search . '%');
        })
        ->orderBy('id', 'DESC')
        ->paginate(10)
        ->withQueryString();

        return view('berita.index', compact(
            'title',
            'beritas'
        ));
    }

    public function tambah()
    {
        $title = 'Berita Publik';

        return view('berita.tambah', compact(
            'title',
        ));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'berita_file_path' => 'required|image|file|max:10240',
        ]);

        if ($request->file('berita_file_path')) {
            $validated['berita_file_path'] = $request->file('berita_file_path')->store('berita_file_path');
        }

        $validated['date'] = date('Y-m-d');
        $validated['created_by'] = auth()->user()->id;

        Berita::create($validated);

        return redirect('/berita')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $title = 'Berita Publik';
        $berita = Berita::find($id);

        return view('berita.edit', compact(
            'title',
            'berita',
        ));
    }

    public function update(Request $request, $id)
    {
        $berita = Berita::find($id);

        $validated = $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'berita_file_path' => 'image|file|max:10240',
        ]);

        if ($request->file('berita_file_path')) {
            $validated['berita_file_path'] = $request->file('berita_file_path')->store('berita_file_path');
        }

        $validated['updated_by'] = auth()->user()->id;

        $berita->update($validated);

        return redirect('/berita')->with('success', 'Data Berhasil Diupdate');
    }

    public function delete($id)
    {
        $berita = Berita::find($id);
        $berita->delete();
        return redirect('/berita')->with('success', 'Data Berhasil Dihapus');
    }

    public function myBerita()
    {
        $title = 'Berita Publik';
        $search = request()->input('search');

        $beritas = Berita::when($search, function ($query) use ($search) {
            $query->where('judul', 'LIKE', '%' . $search . '%');
        })
        ->orderBy('id', 'DESC')
        ->paginate(10)
        ->withQueryString();

        return view('berita.myBerita', compact(
            'title',
            'beritas'
        ));
    }

    public function showMyBerita($id)
    {
        $title = 'Berita Publik';
        $berita = Berita::find($id);

        return view('berita.showMyBerita', compact(
            'title',
            'berita'
        ));
    }
}
