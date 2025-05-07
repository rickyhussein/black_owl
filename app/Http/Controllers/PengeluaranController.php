<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\PengeluaranFile;
use App\Exports\PengeluaranExport;
use Illuminate\Support\Facades\DB;

class PengeluaranController extends Controller
{
    public function index(Request $request)
    {
        $title = 'Pengeluaran';
        $start_date = request()->input('start_date');
        $end_date = request()->input('end_date');
        $type = request()->input('type');
        $year = request()->input('year');

        $transaction_pengeluaran = Transaction::where('in_out', 'out')
        ->when($start_date && $end_date, function ($query) use ($start_date, $end_date) {
            $query->whereBetween('date', [$start_date, $end_date]);
        })
        ->when($type, function ($query) use ($type) {
            $query->where('type', $type);
        })
        ->when($year, function ($query) use ($year) {
            $query->where('year', $year);
        })
        ->orderBy('id', 'DESC')
        ->paginate(10)
        ->withQueryString();

        return view('pengeluaran.index', compact(
            'title',
            'transaction_pengeluaran'
        ));
    }

    public function fix()
    {
        $transaction_pengeluaran = Transaction::where('in_out', 'out')->get();
        foreach ($transaction_pengeluaran as $pengeluaran) {
            if ($pengeluaran->file_transaction_path) {
                PengeluaranFile::create([
                    'transaction_id' => $pengeluaran->id,
                    'pengeluaran_file_path' => $pengeluaran->file_transaction_path,
                    'pengeluaran_file_name' => $pengeluaran->file_transaction_name,
                ]);
            }
        }
    }

    public function export()
    {
        return (new PengeluaranExport($_GET))->download('Pengeluaran.xlsx');
    }

    public function tambah()
    {
        $title = 'Pengeluaran';

        return view('pengeluaran.tambah', compact(
            'title',
        ));
    }

    public function store(Request $request)
    {
        $result = null;
        DB::transaction(function ()  use ($request, $result) {
            $validated = $request->validate([
                'type' => 'required',
                'date' => 'required',
                'nominal' => 'required',
                'status' => 'required',
                'notes' => 'nullable',
            ]);

            $validated['nominal'] = $request->nominal ? str_replace(',', '', $request->nominal) : 0;
            $validated['month'] = date('m', strtotime($request->date));
            $validated['year'] = date('Y', strtotime($request->date));
            $validated['in_out'] = 'out';
            $validated['created_by'] = auth()->user()->id;

            $pengeluaran = Transaction::create($validated);
            $this->result = $pengeluaran->id;

            $pengeluaran_file_path = $request->file('pengeluaran_file_path');

            if (is_array($pengeluaran_file_path)) {
                foreach ($pengeluaran_file_path as $file) {
                    if ($file && $file->isValid()) {
                        $path = $file->store('pengeluaran_file_path');
                        $name = $file->getClientOriginalName();

                        PengeluaranFile::create([
                            'transaction_id' => $pengeluaran->id,
                            'pengeluaran_file_path' => $path,
                            'pengeluaran_file_name' => $name,
                        ]);
                    }
                }
            }
        });

        return redirect('/pengeluaran/show/'.$this->result)->with('success', 'Data Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $title = 'Pengeluaran';
        $pengeluaran = Transaction::find($id);

        return view('pengeluaran.edit', compact(
            'title',
            'pengeluaran',
        ));
    }

    public function update(Request $request, $id)
    {
        $pengeluaran = Transaction::find($id);
        DB::transaction(function ()  use ($request, $pengeluaran) {
            $validated = $request->validate([
                'type' => 'required',
                'date' => 'required',
                'nominal' => 'required',
                'status' => 'required',
                'notes' => 'nullable',
            ]);

            $validated['nominal'] = $request->nominal ? str_replace(',', '', $request->nominal) : 0;
            $validated['month'] = date('m', strtotime($request->date));
            $validated['year'] = date('Y', strtotime($request->date));
            $validated['updated_by'] = auth()->user()->id;


            $old_paths = $request->input('old_pengeluaran_file_path', []);
            $old_names = $request->input('old_pengeluaran_file_name', []);
            $new_files = $request->file('pengeluaran_file_path', []);

            PengeluaranFile::where('transaction_id', $pengeluaran->id)->delete();

            $all_indexes = array_unique(array_merge(
                array_keys($old_paths),
                array_keys($new_files)
            ));

            foreach ($all_indexes as $i) {
                if (isset($new_files[$i]) && $new_files[$i] && $new_files[$i]->isValid()) {
                    $path = $new_files[$i]->store('pengeluaran_file_path');
                    $name = $new_files[$i]->getClientOriginalName();
                } elseif (!empty($old_paths[$i]) && !empty($old_names[$i])) {
                    $path = $old_paths[$i];
                    $name = $old_names[$i];
                } else {
                    continue;
                }

                PengeluaranFile::create([
                    'transaction_id' => $pengeluaran->id,
                    'pengeluaran_file_path' => $path,
                    'pengeluaran_file_name' => $name,
                ]);
            }

            $pengeluaran->update($validated);
        });

        return redirect('/pengeluaran/show/'.$pengeluaran->id)->with('success', 'Data Berhasil Diupdate');
    }

    public function status(Request $request, $id)
    {
        $pengeluaran = Transaction::find($id);
        DB::transaction(function ()  use ($request, $pengeluaran) {
            $validated = $request->validate([
                'status' => 'required',
            ]);

            $validated['updated_by'] = auth()->user()->id;

            $pengeluaran->update($validated);
        });

        return redirect('/pengeluaran/show/'.$pengeluaran->id)->with('success', 'Status Berhasil Diupdate');
    }

    public function show($id)
    {
        $title = 'Pengeluaran';
        $pengeluaran = Transaction::find($id);

        return view('pengeluaran.show', compact(
            'title',
            'pengeluaran',
        ));
    }

    public function delete($id)
    {
        $pengeluaran = Transaction::find($id);
        $pengeluaran->delete();

        return back()->with('success', 'Data Berhasil Dihapus');
    }

    public function laporanPengeluaran(Request $request)
    {

        $title = 'Laporan Pengeluaran';
        $month = request()->input('month');
        $year = request()->input('year');

        $transaction_pengeluaran = Transaction::where('in_out', 'out')
        ->when($year, function ($query) use ($year) {
            $query->where('year', $year);
        })
        ->when($month, function ($query) use ($month) {
            $query->where('month', $month);
        })
        ->orderBy('id', 'DESC')
        ->paginate(10)
        ->withQueryString();

        $months = [
            '01' => 'Januari', '02' => 'Februari', '03' => 'Maret', '04' => 'April',
            '05' => 'Mei', '06' => 'Juni', '07' => 'Juli', '08' => 'Agustus',
            '09' => 'September', '10' => 'Oktober', '11' => 'November', '12' => 'Desember'
        ];

        return view('pengeluaran.laporanPengeluaran', compact(
            'title',
            'transaction_pengeluaran',
            'months',
        ));
    }

    public function laporanPengeluaranShow($id)
    {
        $title = 'Laporan Pengeluaran';
        $pengeluaran = Transaction::find($id);

        return view('pengeluaran.laporanPengeluaranShow', compact(
            'title',
            'pengeluaran',
        ));
    }
}
