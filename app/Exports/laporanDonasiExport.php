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

class laporanDonasiExport implements FromView, WithStyles, WithEvents, WithColumnFormatting
{
    public function columnFormats(): array
    {
        return [
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
            'S' => '"Rp" #,##0',
            'T' => '"Rp" #,##0',
            'U' => '"Rp" #,##0',
            'V' => '"Rp" #,##0',
            'W' => '"Rp" #,##0',
            'X' => '"Rp" #,##0',
            'Y' => '"Rp" #,##0',
            'Z' => '"Rp" #,##0',
            'AA' => '"Rp" #,##0',
            'AB' => '"Rp" #,##0',
            'AC' => '"Rp" #,##0',
            'AD' => '"Rp" #,##0',
            'AE' => '"Rp" #,##0',
            'AF' => '"Rp" #,##0',
            'AG' => '"Rp" #,##0',
            'AH' => '"Rp" #,##0',
            'AI' => '"Rp" #,##0',
            'AJ' => '"Rp" #,##0',
            'AK' => '"Rp" #,##0',
            'AL' => '"Rp" #,##0',
            'AM' => '"Rp" #,##0',
            'AN' => '"Rp" #,##0',
            'AO' => '"Rp" #,##0',
            'AP' => '"Rp" #,##0',
            'AQ' => '"Rp" #,##0',
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
        $rw = request()->input('rw');
        $status = request()->input('status');
        $month = request()->input('month');

        $users = User::when($search, function ($query) use ($search) {
            $query->where(function ($query) use ($search) {
                $query->where('name', 'LIKE', '%'.$search.'%')
                ->orWhere('alamat', 'LIKE', '%'.$search.'%');
            });
        })
        ->when($rt, function ($query) use ($rt) {
            $query->where('rt', $rt);
        })
        ->when($rw, function ($query) use ($rw) {
            $query->where('rw', $rw);
        })
        ->when($status, function ($query) use ($status) {
            $query->where('status', $status);
        })
        ->orderBy('rt', 'asc')
        ->orderBy('alamat', 'asc')
        ->get();

        return view('ipkl.laporanDonasiExport', [
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
        $rw = request()->input('rw');
        $status = request()->input('status');
        $month = request()->input('month');

        $totalUsers = User::when($search, function ($query) use ($search) {
            $query->where(function ($query) use ($search) {
                $query->where('name', 'LIKE', '%'.$search.'%')
                ->orWhere('alamat', 'LIKE', '%'.$search.'%');
            });
        })
        ->when($rt, function ($query) use ($rt) {
            $query->where('rt', $rt);
        })
        ->when($rw, function ($query) use ($rw) {
            $query->where('rw', $rw);
        })
        ->when($status, function ($query) use ($status) {
            $query->where('status', $status);
        })
        ->orderBy('rt', 'asc')
        ->orderBy('alamat', 'asc')
        ->count();

        $startRow = 1;
        $endRow = $totalUsers + 3;

        if ($month) {
            $tableRange = "A{$startRow}:J" . ($endRow - 1);
        } else {
            $tableRange = "A{$startRow}:AQ" . ($endRow - 1);
        }

        $footerTotalRange = "A{$endRow}:F{$endRow}";
        $footerOtherRange = $month
            ? "G{$endRow}:J{$endRow}"
            : "G{$endRow}:AQ{$endRow}";

        return [
            ($month ? 'A1:J2' : 'A1:AQ2') => [
                'font' => ['bold' => true, 'size' => 12],
                'alignment' => [
                    'horizontal' => 'center',
                    'vertical' => 'center',
                    'wrapText' => true
                ],
                'fill' => [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                    'startColor' => ['rgb' => 'D7D7D7'],
                ],
            ],

            $tableRange => [
                'alignment' => ['horizontal' => 'center'],
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    ],
                ],
            ],

            $footerTotalRange => [
                'font' => ['bold' => true],
                'alignment' => ['horizontal' => 'center'],
                'fill' => [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                    'startColor' => ['rgb' => '808080'],
                ],
            ],

            $footerOtherRange => [
                'alignment' => ['horizontal' => 'center'],
                'fill' => [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                    'startColor' => ['rgb' => 'D7D7D7'],
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
                    'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 'AA', 'AB', 'AC', 'AD', 'AE', 'AF', 'AG', 'AH', 'AI', 'AJ', 'AK', 'AL', 'AM', 'AN', 'AO', 'AP', 'AQ'
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
