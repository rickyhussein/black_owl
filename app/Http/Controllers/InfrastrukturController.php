<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Infrastruktur;
use App\Models\InfrastrukturItem;

class InfrastrukturController extends Controller
{
    public function index(Request $request)
    {
        $title = 'Infrastruktur';
        $start_date = request()->input('start_date');
        $end_date = request()->input('end_date');

        $infrastrukturs = Infrastruktur::when($start_date && $end_date, function ($query) use ($start_date, $end_date) {
            $query->whereBetween('date', [$start_date, $end_date]);
        })
        ->orderBy('id', 'DESC')
        ->paginate(10)
        ->withQueryString();

        return view('infrastruktur.index', compact(
            'title',
            'infrastrukturs',
        ));
    }

    public function tambah()
    {
        $title = 'Infrastruktur';

        return view('infrastruktur.tambah', compact(
            'title',
        ));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'date' => 'required',
            'title' => 'required',
            'description' => 'required',
        ]);

        $validated['created_by'] = auth()->user()->id;

        $infrastruktur = Infrastruktur::create($validated);

        $infrastruktur_file_path = $request->file('infrastruktur_file_path');

        if (is_array($infrastruktur_file_path)) {
            foreach ($infrastruktur_file_path as $file) {
                if ($file && $file->isValid()) {
                    $path = $file->store('infrastruktur_file_path');
                    $name = $file->getClientOriginalName();

                    InfrastrukturItem::create([
                        'infrastruktur_id' => $infrastruktur->id,
                        'infrastruktur_file_path' => $path,
                        'infrastruktur_file_name' => $name,
                    ]);
                }
            }
        }

        return redirect('/infrastruktur/show/'.$infrastruktur->id)->with('success', 'Data Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $title = 'Infrastruktur';
        $infrastruktur = Infrastruktur::find($id);

        return view('infrastruktur.edit', compact(
            'title',
            'infrastruktur',
        ));
    }

    public function update(Request $request, $id)
    {
        $infrastruktur = Infrastruktur::find($id);

        $validated = $request->validate([
            'date' => 'required',
            'title' => 'required',
            'description' => 'required',
        ]);

        $validated['updated_by'] = auth()->user()->id;

        $old_paths = $request->input('old_infrastruktur_file_path', []);
        $old_names = $request->input('old_infrastruktur_file_name', []);
        $new_files = $request->file('infrastruktur_file_path', []);

        InfrastrukturItem::where('infrastruktur_id', $infrastruktur->id)->delete();

        $all_indexes = array_unique(array_merge(
            array_keys($old_paths),
            array_keys($new_files)
        ));

        foreach ($all_indexes as $i) {
            if (isset($new_files[$i]) && $new_files[$i] && $new_files[$i]->isValid()) {
                $path = $new_files[$i]->store('infrastruktur_file_path');
                $name = $new_files[$i]->getClientOriginalName();
            } elseif (!empty($old_paths[$i]) && !empty($old_names[$i])) {
                $path = $old_paths[$i];
                $name = $old_names[$i];
            } else {
                continue;
            }

            InfrastrukturItem::create([
                'infrastruktur_id' => $infrastruktur->id,
                'infrastruktur_file_path' => $path,
                'infrastruktur_file_name' => $name,
            ]);
        }

        $infrastruktur->update($validated);

        return redirect('/infrastruktur/show/'.$infrastruktur->id)->with('success', 'Data Berhasil Diupdate');
    }

    public function show($id)
    {
        $title = 'Infrastruktur';
        $infrastruktur = Infrastruktur::find($id);

        return view('infrastruktur.show', compact(
            'title',
            'infrastruktur',
        ));
    }

    public function delete($id)
    {
        $infrastruktur = Infrastruktur::find($id);
        $infrastruktur->delete();
        return redirect('/infrastruktur')->with('success', 'Data Berhasil Dihapus');
    }

    public function myInfrastruktur(Request $request)
    {
        $title = 'Infrastruktur';
        $start_date = request()->input('start_date');
        $end_date = request()->input('end_date');

        $infrastrukturs = Infrastruktur::when($start_date && $end_date, function ($query) use ($start_date, $end_date) {
            $query->whereBetween('date', [$start_date, $end_date]);
        })
        ->orderBy('id', 'DESC')
        ->paginate(10)
        ->withQueryString();

        return view('infrastruktur.myInfrastruktur', compact(
            'title',
            'infrastrukturs',
        ));
    }

    public function showMyInfrastruktur($id)
    {
        $title = 'Infrastruktur';
        $infrastruktur = Infrastruktur::find($id);

        return view('infrastruktur.showMyInfrastruktur', compact(
            'title',
            'infrastruktur',
        ));
    }
}
