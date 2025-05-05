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

class DonasiExport implements FromQuery, WithColumnFormatting, WithMapping, WithHeadings,ShouldAutoSize,WithStyles
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
            'Jenis Transaksi',
            'Jenis Pembayaran',
            'Nominal',
            'Keterangan',
            'Status',
            'Status Approval',
            'User Approval',
            'Catatan Pengurus',
        ];
    }

    public function map($model): array
    {
        return [
            $model->user->alamat ?? '-',
            $model->user->name ?? '-',
            $model->date ?? '-',
            $model->type ?? '-',
            $model->payment_source ?? '-',
            $model->nominal ?? '0',
            $model->notes ?? '-',
            $model->status ?? '-',
            $model->status_approval ?? '-',
            $model->approvedBy->name ?? '-',
            $model->approver_notes ?? '-',
        ];


    }

    public function columnFormats(): array
    {
        return [
            'F' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
        ];
    }

    public function query()
    {
        $user = request()->input('user');
        $type = request()->input('type');
        $start_date = request()->input('start_date');
        $end_date = request()->input('end_date');
        $payment_source = request()->input('payment_source');
        $status = request()->input('status');
        $status_approval = request()->input('status_approval');

        $transaction_donasi = Transaction::when($user, function ($query) use ($user) {
            $query->whereHas('user', function ($query) use ($user) {
                $query->where(function ($q) use ($user) {
                    $q->where('name', 'LIKE', '%'.$user.'%')
                    ->orWhere('alamat', 'LIKE', '%'.$user.'%');
                });
            });
        })
        ->when($start_date && $end_date, function ($query) use ($start_date, $end_date) {
            $query->whereBetween('date', [$start_date, $end_date]);
        })
        ->when(!$type, function ($query) {
            $query->where(function ($q) {
                $q->where('type', 'Donasi Fasum')
                ->orWhere('type', 'Donasi Umum')
                ->orWhere('type', 'Donasi Lainnya');
            });
        })
        ->when($type, function ($query) use ($type) {
            $query->where('type', $type);
        })
        ->when($payment_source, function ($query) use ($payment_source) {
            $query->where('payment_source', $payment_source);
        })
        ->when($status, function ($query) use ($status) {
            $query->where('status', $status);
        })
        ->when($status_approval, function ($query) use ($status_approval) {
            $query->where('status_approval', $status_approval);
        })
        ->orderBy('id', 'DESC');

        return $transaction_donasi;
    }
}
