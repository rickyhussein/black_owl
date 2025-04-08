<?php

namespace App\Exports;

use Carbon\Carbon;
use App\Models\Transaction;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Style\Border;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class PengeluaranExport implements FromQuery, WithColumnFormatting, WithMapping, WithHeadings,ShouldAutoSize,WithStyles
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
            'Tanggal',
            'Jenis Transaksi',
            'Nominal',
            'Keterangan',
        ];
    }

    public function map($model): array
    {

        return [
            $model->date ?? '-',
            $model->type ?? '-',
            $model->nominal ?? 0,
            $model->notes ?? '-',
        ];


    }

    public function columnFormats(): array
    {
        return [
            'C' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
        ];
    }

    public function query()
    {
        $start_date = request()->input('start_date');
        $end_date = request()->input('end_date');
        $type = request()->input('type');

        $transaction_pengeluaran = Transaction::where('in_out', 'out')
        ->when($start_date && $end_date, function ($query) use ($start_date, $end_date) {
            $query->whereBetween('date', [$start_date, $end_date]);
        })
        ->when($type, function ($query) use ($type) {
            $query->where('type', $type);
        })
        ->orderBy('id', 'DESC');

        return $transaction_pengeluaran;
    }
}
