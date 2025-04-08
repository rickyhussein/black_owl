<?php

namespace App\Exports;

use Carbon\Carbon;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Style\Border;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;

class UserExport implements FromQuery, WithColumnFormatting, WithMapping, WithHeadings,ShouldAutoSize,WithStyles
{
    use Exportable;

    public function styles(Worksheet $sheet)
    {
        $highestColumn = $sheet->getHighestColumn();
        $highestRow = $sheet->getHighestRow();

        // BORDER untuk semua sel
        $sheet->getStyle("A1:$highestColumn" . $highestRow)
            ->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);

        // WRAP TEXT untuk semua sel agar teks tidak terpotong
        $sheet->getStyle("A1:$highestColumn" . $highestRow)
            ->getAlignment()->setWrapText(true);

        // HEADER (Tengah & Bold)
        $sheet->getStyle("A1:" . $highestColumn . "1")->applyFromArray([
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical'   => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            ],
            'font' => [
                'bold' => true,
            ]
        ]);

        // SELURUH DATA (Tengah secara Horizontal & Vertikal)
        $sheet->getStyle("A2:$highestColumn" . $highestRow)->applyFromArray([
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical'   => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            ],
        ]);
    }

    public function headings(): array
    {
        return [
            'Nama',
            'Alamat',
            'RT',
            'Status',
            'Nomor HP',
            'Email',
            'Keterangan',
            'Role',
            'Anggota Keluarga',
        ];
    }

    public function map($model): array
    {
        $roles = count($model->roles) > 0  ? implode("\n", $model->roles->pluck('name')->toArray()) : '-';
        $keluarga = count($model->keluarga) > 0
                    ? implode("\n", $model->keluarga->map(function ($kel) {
                        return "{$kel->nama_keluarga} ({$kel->status_keluarga})";
                    })->toArray())
                    : '-';

        return [
            $model->name ?? '-',
            $model->alamat ?? '-',
            $model->rt ?? '-',
            $model->status ?? '-',
            $model->no_hp ?? '-',
            $model->email ?? '-',
            $model->keterangan ?? '-',
            $roles,
            $keluarga
        ];


    }

    public function columnFormats(): array
    {
        return [
        ];
    }

    public function query()
    {
        $search = request()->input('search');

        $users = User::when($search, function ($query) use ($search) {
            $query->where(function ($query) use ($search) {
                $query->where('name', 'LIKE', '%'.$search.'%')
                ->orWhere('email', 'LIKE', '%'.$search.'%');
            });
        })
        ->orderBy('rt', 'asc')
        ->orderBy('alamat', 'asc');

        return $users;
    }
}
