<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\SuratIzinRenovasi;
use Illuminate\Support\Facades\DB;

class SuratIzinRenovasiController extends Controller
{
    public function index()
    {
        $title = 'Surat Izin Renovasi';
        $search = request()->input('search');
        $start_date = request()->input('start_date');
        $end_date = request()->input('end_date');

        $surat_izin_renovasis = SuratIzinRenovasi::when($start_date && $end_date, function ($query) use ($start_date, $end_date) {
            $query->where(function ($q) use ($start_date, $end_date) {
                $q->where('start_date', '<=', $end_date)
                  ->where('end_date', '>=', $start_date);
            });
        })
        ->when($search, function ($query) use ($search) {
            $query->where(function ($query) use ($search) {
                $query->where('type', 'LIKE', '%' . $search . '%')
                ->orWhere('contractor', 'LIKE', '%' . $search . '%')
                ->orWhere('company_name', 'LIKE', '%' . $search . '%')
                ->orWhereHas('user', function ($q) use ($search) {
                    $q->where('name', 'LIKE', '%' . $search . '%')
                    ->orWhere('alamat', 'LIKE', '%' . $search . '%');
                });
            });
        })
        ->orderBy('id', 'DESC')
        ->paginate(10)
        ->withQueryString();

        return view('surat-izin-renovasi.index', compact(
            'title',
            'surat_izin_renovasis'
        ));
    }

    public function print($id)
    {
        $surat_izin_renovasi = SuratIzinRenovasi::find($id);

        $number = str_pad($surat_izin_renovasi->id, 4, '0', STR_PAD_LEFT);
        $filename = 'SIR-'.$number.'.pdf';

        $pdf = Pdf::loadView('surat-izin-renovasi.print', [
            'surat_izin_renovasi' => $surat_izin_renovasi,
            'filename' => $filename,
        ]);

        $number = str_pad($surat_izin_renovasi->id, 4, '0', STR_PAD_LEFT);
        $filename = 'SIR-'.$number.'.pdf';

        return $pdf->stream($filename);
    }

    public function mySuratIzinRenovasi()
    {
        $title = 'Surat Izin Renovasi';
        $start_date = request()->input('start_date');
        $end_date = request()->input('end_date');

        $surat_izin_renovasis = SuratIzinRenovasi::where('user_id', auth()->user()->id)
        ->when($start_date && $end_date, function ($query) use ($start_date, $end_date) {
            $query->where(function ($q) use ($start_date, $end_date) {
                $q->where('start_date', '<=', $end_date)
                  ->where('end_date', '>=', $start_date);
            });
        })
        ->orderBy('id', 'DESC')
        ->paginate(10)
        ->withQueryString();

        return view('surat-izin-renovasi.mySuratIzinRenovasi', compact(
            'title',
            'surat_izin_renovasis'
        ));
    }

    public function tambahMySuratIzinRenovasi()
    {
        $title = 'Surat Izin Renovasi';

        return view('surat-izin-renovasi.tambahMySuratIzinRenovasi', compact(
            'title',
        ));
    }

    public function storeMySuratIzinRenovasi(Request $request)
    {
        $result = null;
        DB::transaction(function ()  use ($request, $result) {
            $validated = $request->validate([
                'date' => 'required',
                'type' => 'required',
                'type_text' => 'required_if:type,Lainnya',
                'size' => 'required',
                'start_date' => 'required',
                'end_date' => 'required',
                'contractor' => 'required',
                'company_name' => 'required',
                'company_phone' => 'required',
                'fotokopi_ktp_pemohon' => 'nullable',
                'gambar_design_renovasi' => 'nullable',
                'surat_persetujuan_tetangga_terdekat' => 'nullable',
                'dokumen_lainnya' => 'nullable',
                'dokumen_text' => 'required_if:dokumen_lainnya,1',
            ]);

            $validated['fotokopi_ktp_pemohon'] = $request->fotokopi_ktp_pemohon ?? null;
            $validated['gambar_design_renovasi'] = $request->gambar_design_renovasi ?? null;
            $validated['surat_persetujuan_tetangga_terdekat'] = $request->surat_persetujuan_tetangga_terdekat ?? null;
            $validated['dokumen_lainnya'] = $request->dokumen_lainnya ?? null;
            $validated['user_id'] = auth()->user()->id;
            $validated['created_by'] = auth()->user()->id;
            $surat_izin_renovasi = SuratIzinRenovasi::create($validated);
            $this->result = $surat_izin_renovasi->id;
        });

        return redirect('/my-surat-izin-renovasi/show/'.$this->result)->with('success', 'Data Berhasil Ditambahkan');
    }

    public function editMySuratIzinRenovasi($id)
    {
        $title = 'Surat Izin Renovasi';
        $surat_izin_renovasi = SuratIzinRenovasi::find($id);

        return view('surat-izin-renovasi.editMySuratIzinRenovasi', compact(
            'title',
            'surat_izin_renovasi',
        ));
    }

    public function updateMySuratIzinRenovasi(Request $request, $id)
    {
        $surat_izin_renovasi = SuratIzinRenovasi::find($id);
        DB::transaction(function ()  use ($request, $surat_izin_renovasi) {
            $validated = $request->validate([
                'date' => 'required',
                'type' => 'required',
                'type_text' => 'required_if:type,Lainnya',
                'size' => 'required',
                'start_date' => 'required',
                'end_date' => 'required',
                'contractor' => 'required',
                'company_name' => 'required',
                'company_phone' => 'required',
                'fotokopi_ktp_pemohon' => 'nullable',
                'gambar_design_renovasi' => 'nullable',
                'surat_persetujuan_tetangga_terdekat' => 'nullable',
                'dokumen_lainnya' => 'nullable',
                'dokumen_text' => 'required_if:dokumen_lainnya,1',
            ]);

            $validated['fotokopi_ktp_pemohon'] = $request->fotokopi_ktp_pemohon ?? null;
            $validated['gambar_design_renovasi'] = $request->gambar_design_renovasi ?? null;
            $validated['surat_persetujuan_tetangga_terdekat'] = $request->surat_persetujuan_tetangga_terdekat ?? null;
            $validated['dokumen_lainnya'] = $request->dokumen_lainnya ?? null;
            $validated['updated_by'] = auth()->user()->id;
            $surat_izin_renovasi->update($validated);
        });

        return redirect('/my-surat-izin-renovasi/show/'.$id)->with('success', 'Data Berhasil Diupdate');
    }

    public function showMySuratIzinRenovasi($id)
    {
        $title = 'Surat Izin Renovasi';
        $surat_izin_renovasi = SuratIzinRenovasi::find($id);

        return view('surat-izin-renovasi.showMySuratIzinRenovasi', compact(
            'title',
            'surat_izin_renovasi',
        ));
    }

    public function printMySuratIzinRenovasi($id)
    {
        $surat_izin_renovasi = SuratIzinRenovasi::find($id);

        $number = str_pad($surat_izin_renovasi->id, 4, '0', STR_PAD_LEFT);
        $filename = 'SIR-'.$number.'.pdf';

        $pdf = Pdf::loadView('surat-izin-renovasi.printMySuratIzinRenovasi', [
            'surat_izin_renovasi' => $surat_izin_renovasi,
            'filename' => $filename,
        ]);

        $number = str_pad($surat_izin_renovasi->id, 4, '0', STR_PAD_LEFT);
        $filename = 'SIR-'.$number.'.pdf';

        return $pdf->stream($filename);
    }

    public function deleteMySuratIzinRenovasi($id)
    {
        $surat_izin_renovasi = SuratIzinRenovasi::find($id);
        DB::transaction(function ()  use ($surat_izin_renovasi) {
            $surat_izin_renovasi->delete();
        });

        return redirect('/my-surat-izin-renovasi')->with('success', 'Data Berhasil Didelete');
    }
}
