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

class laporanGateCardExport implements FromQuery, WithColumnFormatting, WithMapping, WithHeadings,ShouldAutoSize,WithStyles
{
    use Exportable;

    public function styles(Worksheet $sheet)
    {
        $highestColumn = $sheet->getHighestColumn();
        $highestRow = $sheet->getHighestRow();

        //BORDER
        $sheet->getStyle("A1:$highestColumn" . $highestRow)->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);

        // HEADER
        $sheet->getStyle("A1:" . $highestColumn . "1")->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

        // WRAP TEXT
        $sheet->getStyle("A1:$highestColumn" . $highestRow)->getAlignment()->setWrapText(true);

        // ALIGNMENT TEXT
        $sheet->getStyle("A1:$highestColumn" . $highestRow)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_TOP);

        //BOLD FIRST ROW
        return [
            // Style the first row as bold text.
            1    => ['font' => ['bold' => true]],
        ];
    }

    public function headings(): array
    {
        return [
            'Nama',
            'Alamat',
            'RT',
            'RW',
            'Status',
            'Total Pembayaran',
            'Jumlah Gate Card',
        ];
    }

    public function map($model): array
    {
        $total = $model->getGateCard($model->id);
        $qty = $model->getQtyGateCard($model->id);

        return [
            $model->name ?? '-',
            $model->alamat ?? '-',
            $model->rt ?? '-',
            $model->rw ?? '-',
            $model->status ?? '-',
            $total,
            $qty,
        ];


    }

    public function columnFormats(): array
    {
        return [
            'F' => '"Rp" #,##0',
        ];
    }

    public function query()
    {
        $search = request()->input('search');
        $rt = request()->input('rt');
        $rw = request()->input('rw');
        $status = request()->input('status');

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
        ->orderBy('alamat', 'asc');

        return $users;
    }
}
