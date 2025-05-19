<?php

namespace App\Http\Controllers;

use App\Models\Keluarga;
use Illuminate\Http\Request;
use App\Models\SuratPengantar;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class SuratPengantarController extends Controller
{
    public function index()
    {
        $title = 'Surat Pengantar';
        $search = request()->input('search');
        $start_date = request()->input('start_date');
        $end_date = request()->input('end_date');

        $surat_pengantars = SuratPengantar::when($start_date && $end_date, function ($query) use ($start_date, $end_date) {
            $query->whereBetween('date', [$start_date, $end_date]);
        })
        ->when($search, function ($query) use ($search) {
            $query->where(function ($query) use ($search) {
                $query->where('surat_pengantar_number', 'LIKE', '%' . $search . '%')
                ->orWhere('letter_type', 'LIKE', '%' . $search . '%')
                ->orWhere('alamat', 'LIKE', '%' . $search . '%')
                ->orWhereHas('keluarga', function ($q) use ($search) {
                    $q->where('nama_keluarga', 'LIKE', '%' . $search . '%');
                });
            });
        })
        ->orderBy('id', 'DESC')
        ->paginate(10)
        ->withQueryString();

        return view('surat-pengantar.index', compact(
            'title',
            'surat_pengantars'
        ));
    }

    public function print($id)
    {
        $surat_pengantar = SuratPengantar::find($id);

        $pdf = Pdf::loadView('surat-pengantar.print', [
            'surat_pengantar' => $surat_pengantar
        ]);

        $filename = $surat_pengantar->surat_pengantar_number.'.pdf';

        return $pdf->stream($filename);
    }

    public function mySuratPengantar()
    {
        $title = 'Surat Pengantar';
        $start_date = request()->input('start_date');
        $end_date = request()->input('end_date');

        $surat_pengantars = SuratPengantar::where('user_id', auth()->user()->id)
        ->when($start_date && $end_date, function ($query) use ($start_date, $end_date) {
            $query->whereBetween('date', [$start_date, $end_date]);
        })
        ->orderBy('id', 'DESC')
        ->paginate(10)
        ->withQueryString();

        return view('surat-pengantar.mySuratPengantar', compact(
            'title',
            'surat_pengantars'
        ));
    }

    public function tambahMySuratPengantar()
    {
        $title = 'Surat Pengantar';
        $keluargas = Keluarga::where('user_id', auth()->user()->id)->orderBy('nama_keluarga')->get();
        $surat_pengantar_number = old('surat_pengantar_number') ? old('surat_pengantar_number') : (new SuratPengantar())->getCounter();

        return view('surat-pengantar.tambahMySuratPengantar', compact(
            'title',
            'keluargas',
            'surat_pengantar_number',
        ));
    }

    public function storeMySuratPengantar(Request $request)
    {
        $result = null;
        DB::transaction(function ()  use ($request, $result) {
            $validated = $request->validate([
                'keluarga_id' => 'required',
                'surat_pengantar_number' => 'required',
                'date' => 'required',
                'born_place' => 'required',
                'born_date' => 'required',
                'gender' => 'required',
                'nation' => 'required',
                'religion' => 'required',
                'ktp_number' => 'required',
                'married_status' => 'required',
                'job' => 'required',
                'alamat' => 'required',
                'letter_type' => 'required',
                'letter_type_text' => 'required_if:letter_type,Lainnya',
            ]);

            $validated['user_id'] = auth()->user()->id;
            $validated['created_by'] = auth()->user()->id;
            $surat_pengantar = SuratPengantar::create($validated);
            $this->result = $surat_pengantar->id;
        });

        return redirect('/my-surat-pengantar/show/'.$this->result)->with('success', 'Data Berhasil Ditambahkan');
    }

    public function editMySuratPengantar($id)
    {
        $title = 'Surat Pengantar';
        $surat_pengantar = SuratPengantar::find($id);
        $keluargas = Keluarga::where('user_id', auth()->user()->id)->orderBy('nama_keluarga')->get();

        return view('surat-pengantar.editMySuratPengantar', compact(
            'title',
            'keluargas',
            'surat_pengantar',
        ));
    }

    public function updateMySuratPengantar(Request $request, $id)
    {
        $surat_pengantar = SuratPengantar::find($id);
        DB::transaction(function ()  use ($request, $surat_pengantar) {
            $validated = $request->validate([
                'keluarga_id' => 'required',
                'surat_pengantar_number' => 'required',
                'date' => 'required',
                'born_place' => 'required',
                'born_date' => 'required',
                'gender' => 'required',
                'nation' => 'required',
                'religion' => 'required',
                'ktp_number' => 'required',
                'married_status' => 'required',
                'job' => 'required',
                'alamat' => 'required',
                'letter_type' => 'required',
                'letter_type_text' => 'required_if:letter_type,Lainnya',
            ]);

            $validated['updated_by'] = auth()->user()->id;
            $surat_pengantar->update($validated);
        });

        return redirect('/my-surat-pengantar/show/'.$id)->with('success', 'Data Berhasil Diupdate');
    }

    public function showMySuratPengantar($id)
    {
        $title = 'Surat Pengantar';
        $surat_pengantar = SuratPengantar::find($id);

        return view('surat-pengantar.showMySuratPengantar', compact(
            'title',
            'surat_pengantar',
        ));
    }


    public function printMySuratPengantar($id)
    {
        $surat_pengantar = SuratPengantar::find($id);

        $pdf = Pdf::loadView('surat-pengantar.printMySuratPengantar', [
            'surat_pengantar' => $surat_pengantar
        ]);

        $filename = $surat_pengantar->surat_pengantar_number.'.pdf';

        return $pdf->stream($filename);
    }

    public function deleteMySuratPengantar($id)
    {
        $surat_pengantar = SuratPengantar::find($id);
        DB::transaction(function ()  use ($surat_pengantar) {
            $surat_pengantar->delete();
        });

        return redirect('/my-surat-pengantar')->with('success', 'Data Berhasil Didelete');
    }

    public function getKeluarga(Request $request)
    {
        $keluarga = Keluarga::find($request->keluarga_id);
        return $keluarga;
    }
}
