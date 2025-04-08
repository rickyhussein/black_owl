<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
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
                'file_transaction_path' => 'file|max:10240',
                'notes' => 'nullable',
            ]);

            if ($request->file('file_transaction_path')) {
                $validated['file_transaction_path'] = $request->file('file_transaction_path')->store('file_transaction_path');
                $validated['file_transaction_name'] = $request->file('file_transaction_path')->getClientOriginalName();
            }

            $validated['nominal'] = $request->nominal ? str_replace(',', '', $request->nominal) : 0;
            $validated['month'] = date('m', strtotime($request->date));
            $validated['year'] = date('Y', strtotime($request->date));
            $validated['status'] = 'paid';
            $validated['in_out'] = 'out';
            $validated['created_by'] = auth()->user()->id;

            $pengeluaran = Transaction::create($validated);
            $this->result = $pengeluaran->id;
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
                'file_transaction_path' => 'file|max:10240',
                'notes' => 'nullable',
            ]);

            if ($request->file('file_transaction_path')) {
                $validated['file_transaction_path'] = $request->file('file_transaction_path')->store('file_transaction_path');
                $validated['file_transaction_name'] = $request->file('file_transaction_path')->getClientOriginalName();
            }

            $validated['nominal'] = $request->nominal ? str_replace(',', '', $request->nominal) : 0;
            $validated['month'] = date('m', strtotime($request->date));
            $validated['year'] = date('Y', strtotime($request->date));
            $validated['updated_by'] = auth()->user()->id;

            $pengeluaran->update($validated);
        });

        return redirect('/pengeluaran/show/'.$pengeluaran->id)->with('success', 'Data Berhasil Diupdate');
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
        if (request()->input('year')) {
            $year = request()->input('year');
        } else {
            $year = date('Y');
        }

        $title = 'Laporan Pengeluaran ' . $year;
        $year = request()->input('year');

        $transaction_pengeluaran = Transaction::where('in_out', 'out')
        ->when($year, function ($query) use ($year) {
            $query->where('year', $year);
        })
        ->orderBy('id', 'DESC')
        ->paginate(10)
        ->withQueryString();

        return view('pengeluaran.laporanPengeluaran', compact(
            'title',
            'transaction_pengeluaran'
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
