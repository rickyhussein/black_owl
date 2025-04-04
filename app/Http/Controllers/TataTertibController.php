<?php

namespace App\Http\Controllers;

use App\Models\TataTertib;
use Illuminate\Http\Request;

class TataTertibController extends Controller
{
    public function index(Request $request)
    {
        $title = 'Tata Tertib';
        $search = request()->input('search');

        $tata_tertib = TataTertib::when($search, function ($query) use ($search) {
            $query->where('nama', 'LIKE', '%'.$search.'%');
        })
        ->orderBy('id', 'ASC')
        ->paginate(10)
        ->withQueryString();

        return view('tata-tertib.index', compact(
            'title',
            'tata_tertib'
        ));
    }

    public function tambah()
    {
        $title = 'Tata Tertib';

        return view('tata-tertib.tambah', compact(
            'title',
        ));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required',
        ]);

        TataTertib::create($validated);

        return redirect('/tata-tertib')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $title = 'Tata Tertib';
        $tata_tertib = TataTertib::find($id);

        return view('tata-tertib.edit', compact(
            'title',
            'tata_tertib',
        ));
    }

    public function update(Request $request, $id)
    {
        $tata_tertib = TataTertib::find($id);

        $validated = $request->validate([
            'nama' => 'required',
        ]);

        $tata_tertib->update($validated);

        return redirect('/tata-tertib')->with('success', 'Data Berhasil Diupdate');
    }

    public function delete($id)
    {
        $tata_tertib = TataTertib::find($id);
        $tata_tertib->delete();
        return redirect('/tata-tertib')->with('success', 'Data Berhasil Dihapus');
    }
}
