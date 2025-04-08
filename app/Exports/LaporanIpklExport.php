<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithEvents;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use Maatwebsite\Excel\Events\AfterSheet;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class LaporanIpklExport implements FromView, WithStyles, WithEvents, WithColumnFormatting
{
    public function columnFormats(): array
    {
        return [
            'F' => '"Rp" #,##0',
            'G' => '"Rp" #,##0',
            'H' => '"Rp" #,##0',
            'I' => '"Rp" #,##0',
            'J' => '"Rp" #,##0',
            'K' => '"Rp" #,##0',
            'L' => '"Rp" #,##0',
            'M' => '"Rp" #,##0',
            'N' => '"Rp" #,##0',
            'O' => '"Rp" #,##0',
            'P' => '"Rp" #,##0',
            'Q' => '"Rp" #,##0',
            'R' => '"Rp" #,##0',
        ];
    }

    public function view(): View
    {
        if (request()->input('year')) {
            $year = request()->input('year');
        } else {
            $year = date('Y');
        }

        $title = 'Laporan IPKL ' . $year;
        $search = request()->input('search');
        $rt = request()->input('rt');

        $users = User::when($search, function ($query) use ($search) {
            $query->where(function ($query) use ($search) {
                $query->where('name', 'LIKE', '%'.$search.'%')
                ->orWhere('alamat', 'LIKE', '%'.$search.'%');
            });
        })
        ->when($rt, function ($query) use ($rt) {
            $query->where('rt', $rt);
        })
        ->orderBy('rt', 'asc')
        ->orderBy('alamat', 'asc')
        ->get();

        return view('ipkl.laporanIpklExport', [
            'users' => $users,
            'year' => $year,
        ]);
    }



    public function styles(Worksheet $sheet)
    {
        // Hitung jumlah baris data yang diekspor
        $totalUsers = User::when(request()->input('search'), function ($query) {
            $query->where('name', 'LIKE', '%'.request()->input('search').'%')
                ->orWhere('alamat', 'LIKE', '%'.request()->input('search').'%');
        })
        ->when(request()->input('rt'), function ($query) {
            $query->where('rt', request()->input('rt'));
        })
        ->count();

        // Baris awal tabel (header) adalah 1
        $startRow = 1;
        $endRow = $totalUsers + 2; // +1 untuk header, +1 untuk footer

        // Tentukan range tabel yang hanya sampai kolom R
        $tableRange = "A{$startRow}:R" . ($endRow - 1); // Data tanpa footer
        $footerTotalRange = "A{$endRow}:E{$endRow}"; // Kolom A - E (Total)
        $footerOtherRange = "F{$endRow}:R{$endRow}"; // Kolom F - R (Bulan & total)

        return [
            // Header di baris pertama (warna abu-abu & teks bold)
            1 => [
                'font' => ['bold' => true, 'size' => 12],
                'alignment' => ['horizontal' => 'center'],
                'fill' => [
                    'fillType' => Fill::FILL_SOLID,
                    'startColor' => ['rgb' => 'D7D7D7'], // Warna abu-abu
                ],
            ],

            // Border hanya untuk tabel sampai kolom R
            $tableRange => [
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    ],
                ],
            ],

            // Footer kolom "Total" (A - E) lebih gelap dan teks rata tengah
            $footerTotalRange => [
                'font' => ['bold' => true],
                'alignment' => ['horizontal' => 'center'],
                'fill' => [
                    'fillType' => Fill::FILL_SOLID,
                    'startColor' => ['rgb' => '808080'], // Warna abu-abu lebih gelap
                ],
            ],

            // Footer kolom lainnya tetap abu-abu biasa
            $footerOtherRange => [
                'fill' => [
                    'fillType' => Fill::FILL_SOLID,
                    'startColor' => ['rgb' => 'D7D7D7'], // Warna abu-abu terang
                ],
            ],
        ];
    }



    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                // Auto-fit semua kolom dari A hingga Z
                foreach (range('A', 'Z') as $column) {
                    $event->sheet->getColumnDimension($column)->setAutoSize(true);
                }
            },
        ];
    }
}
