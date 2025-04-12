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
            'H' => '"Rp" #,##0',
            'J' => '"Rp" #,##0',
            'L' => '"Rp" #,##0',
            'N' => '"Rp" #,##0',
            'P' => '"Rp" #,##0',
            'R' => '"Rp" #,##0',
            'T' => '"Rp" #,##0',
            'V' => '"Rp" #,##0',
            'X' => '"Rp" #,##0',
            'Z' => '"Rp" #,##0',
            'AB' => '"Rp" #,##0',
            'AD' => '"Rp" #,##0',
        ];
    }

    public function view(): View
    {
        if (request()->input('year')) {
            $year = request()->input('year');
        } else {
            $year = date('Y');
        }

        $search = request()->input('search');
        $rt = request()->input('rt');
        $status = request()->input('status');
        $month = request()->input('month');
        $status_transaksi = request()->input('status_transaksi');

        $users = User::where('name', '!=', 'Admin')
        ->when($search, function ($query) use ($search) {
            $query->where(function ($query) use ($search) {
                $query->where('name', 'LIKE', '%'.$search.'%')
                ->orWhere('alamat', 'LIKE', '%'.$search.'%');
            });
        })
        ->when($rt, function ($query) use ($rt) {
            $query->where('rt', $rt);
        })
        ->when($status, function ($query) use ($status) {
            $query->where('status', $status);
        })
        ->when($status_transaksi == 'tagihan belum dibuat', function ($query) use ($month, $year) {
            $query->whereDoesntHave('transaction', function ($q) use ($month, $year) {
                $q->where('type', 'IPKL')
                  ->where('month', $month)
                  ->where('year', $year);
            });
        })
        ->when($status_transaksi == 'paid', function ($query) use ($month, $year) {
            $query->whereHas('transaction', function ($q) use ($month, $year) {
                $q->where('type', 'IPKL')
                  ->where('status', 'paid')
                  ->where('month', $month)
                  ->where('year', $year);
            });
        })
        ->when($status_transaksi == 'unpaid', function ($query) use ($month, $year) {
            $query->whereHas('transaction', function ($q) use ($month, $year) {
                $q->where('type', 'IPKL')
                  ->where('status', 'unpaid')
                  ->where('month', $month)
                  ->where('year', $year);
            })
            ->whereDoesntHave('transaction', function ($q) use ($month, $year) {
                $q->where('type', 'IPKL')
                  ->where('status', 'paid')
                  ->where('month', $month)
                  ->where('year', $year);
            });
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
        if (request()->input('year')) {
            $year = request()->input('year');
        } else {
            $year = date('Y');
        }

        $search = request()->input('search');
        $rt = request()->input('rt');
        $status = request()->input('status');
        $month = request()->input('month');
        $status_transaksi = request()->input('status_transaksi');

        $totalUsers = User::where('name', '!=', 'Admin')
        ->when($search, function ($query) use ($search) {
            $query->where(function ($query) use ($search) {
                $query->where('name', 'LIKE', '%'.$search.'%')
                ->orWhere('alamat', 'LIKE', '%'.$search.'%');
            });
        })
        ->when($rt, function ($query) use ($rt) {
            $query->where('rt', $rt);
        })
        ->when($status, function ($query) use ($status) {
            $query->where('status', $status);
        })
        ->when($status_transaksi == 'tagihan belum dibuat', function ($query) use ($month, $year) {
            $query->whereDoesntHave('transaction', function ($q) use ($month, $year) {
                $q->where('type', 'IPKL')
                  ->where('month', $month)
                  ->where('year', $year);
            });
        })
        ->when($status_transaksi == 'paid', function ($query) use ($month, $year) {
            $query->whereHas('transaction', function ($q) use ($month, $year) {
                $q->where('type', 'IPKL')
                  ->where('status', 'paid')
                  ->where('month', $month)
                  ->where('year', $year);
            });
        })
        ->when($status_transaksi == 'unpaid', function ($query) use ($month, $year) {
            $query->whereHas('transaction', function ($q) use ($month, $year) {
                $q->where('type', 'IPKL')
                  ->where('status', 'unpaid')
                  ->where('month', $month)
                  ->where('year', $year);
            })
            ->whereDoesntHave('transaction', function ($q) use ($month, $year) {
                $q->where('type', 'IPKL')
                  ->where('status', 'paid')
                  ->where('month', $month)
                  ->where('year', $year);
            });
        })
        ->count();

        // Baris awal tabel (header) adalah 1
        $startRow = 1;
        $endRow = $totalUsers + 2; // +1 untuk header, +1 untuk footer

        // Tentukan range tabel yang hanya sampai kolom R
        $tableRange = "A{$startRow}:AD" . ($endRow - 1); // Data tanpa footer
        $footerTotalRange = "A{$endRow}:E{$endRow}"; // Kolom A - E (Total)
        $footerOtherRange = "F{$endRow}:AD{$endRow}"; // Kolom F - R (Bulan & total)

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
                'alignment' => ['horizontal' => 'center'],
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
                'alignment' => ['horizontal' => 'center'],
                'fill' => [
                    'fillType' => Fill::FILL_SOLID,
                    'startColor' => ['rgb' => 'D7D7D7'], // Warna abu-abu terang
                ],
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    ],
                ],
            ],
        ];
    }




    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                // Daftar kolom dari F sampai AD (total 25 kolom)
                $columns = [
                    'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O',
                    'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y',
                    'Z', 'AA', 'AB', 'AC', 'AD'
                ];

                // Set lebar kolom secara manual
                foreach ($columns as $column) {
                    $event->sheet->getColumnDimension($column)->setAutoSize(false);
                    $event->sheet->getColumnDimension($column)->setWidth(20); // ~200px
                }

                // Kolom A sampai E tetap auto-size
                foreach (range('A', 'E') as $column) {
                    $event->sheet->getColumnDimension($column)->setAutoSize(true);
                }
            },
        ];
    }

}
