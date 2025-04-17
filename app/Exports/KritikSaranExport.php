<?php

namespace App\Exports;

use Carbon\Carbon;
use App\Models\KritikSaran;
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

class KritikSaranExport implements FromQuery, WithColumnFormatting, WithMapping, WithHeadings,ShouldAutoSize,WithStyles
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
            'Alamat',
            'Nama',
            'Tanggal',
            'judul',
            'Kritik & Saran',
            'User Approval',
            'Catatan',
            'status',
        ];
    }

    public function map($model): array
    {

        return [
            $model->user->alamat ?? '-',
            $model->user->name ?? '-',
            $model->date ?? '-',
            $model->judul ?? '-',
            $model->kritik_saran ?? '-',
            $model->approvedBy->name ?? '-',
            $model->catatan_pengurus ?? '-',
            $model->status ?? '-',
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
        $status = request()->input('status');

        $kritik_sarans = KritikSaran::when($search, function ($query) use ($search) {
            $query->where(function ($query) use ($search) {
                $query->where('judul', 'LIKE', '%' . $search . '%')
                ->orWhere('kritik_saran', 'LIKE', '%' . $search . '%')
                ->orWhereHas('user', function ($q) use ($search) {
                    $q->where('name', 'LIKE', '%' . $search . '%')
                    ->orWhere('alamat', 'LIKE', '%' . $search . '%');
                });
            });
        })
        ->when($status, function ($query) use ($status) {
            $query->where('status', $status);
        })
        ->orderBy('id', 'DESC');

        return $kritik_sarans;
    }
}
