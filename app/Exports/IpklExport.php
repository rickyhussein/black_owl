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

class IpklExport implements FromQuery, WithColumnFormatting, WithMapping, WithHeadings,ShouldAutoSize,WithStyles
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
            'Tanggal',
            'Expired Days',
            'Jatuh Tempo',
            'Jenis Transaksi',
            'Nominal',
            'Keterangan',
            'Status',
            'Paid Date',
            'Payment Source',
            'Midtrans Trandaction ID',
        ];
    }

    public function map($model): array
    {
        Carbon::setLocale('id');
        $month = Carbon::createFromFormat('m', $model->month)->translatedFormat('F');
        $date = Carbon::createFromFormat('Y-m-d', $model->date);
        $expired_date = $date->addDays($model->expired)->translatedFormat('Y-m-d');

        return [
            $model->user->name ?? '-',
            $model->user->alamat ?? '-',
            $model->date ?? '-',
            $model->expired . ' Hari' ?? '-',
            $expired_date ?? '-',
            $model->type . ' (' . $month . $model->year . ')',
            $model->nominal ?? 0,
            $model->notes ?? '-',
            $model->status ?? '-',
            $model->paid_date ?? '-',
            $model->payment_source ?? '-',
            $model->midtrans_transaction_id ?? '-',
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
        $start_date = request()->input('start_date');
        $end_date = request()->input('end_date');
        $status = request()->input('status');

        $transaction_ipkl = Transaction::select('transactions.*')
        ->join('users', 'transactions.user_id', '=', 'users.id')
        ->where('type', 'IPKL')
        ->when($user, function ($query) use ($user) {
            $query->whereHas('user', function ($q) use ($user) {
                $q->where('name', 'LIKE', '%'.$user.'%')
                ->orWhere('alamat', 'LIKE', '%'.$user.'%');
            });
        })
        ->when($start_date && $end_date, function ($query) use ($start_date, $end_date) {
            $query->whereBetween('date', [$start_date, $end_date]);
        })
        ->when($status, function ($query) use ($status) {
            $query->where('transactions.status', $status);
        })
        ->orderBy('date', 'DESC')
        ->orderBy('users.alamat', 'ASC');

        return $transaction_ipkl;
    }
}
