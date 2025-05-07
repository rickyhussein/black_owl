<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function laporanKeuangan()
    {
        $title = 'Laporan Keuangan';

        if (request()->input('year')) {
            $year = request()->input('year');
        } else {
            $year = date('Y');
        }

        if (request()->input('month')) {
            $month = request()->input('month');
        } else {
            $month = date('m');
        }

        $start_date = request()->input('start_date');
        $end_date = request()->input('end_date');

        $transaction_in_paid = Transaction::where('in_out', 'in')
        ->where('status', 'paid')
        ->when(!$start_date && !$start_date && $month, function ($query) use ($month) {
            $query->where('month', $month);
        })
        ->when(!$start_date && !$start_date && $year, function ($query) use ($year) {
            $query->where('year', $year);
        })
        ->when($start_date && $end_date, function ($query) use ($start_date, $end_date) {
            $query->whereBetween('date', [$start_date, $end_date]);
        })
        ->sum('nominal');

        $transaction_in_unpaid = Transaction::where('in_out', 'in')
        ->where('status', 'unpaid')
        ->where('type', 'IPKL')
        ->when(!$start_date && !$start_date && $month, function ($query) use ($month) {
            $query->where('month', $month);
        })
        ->when(!$start_date && !$start_date && $year, function ($query) use ($year) {
            $query->where('year', $year);
        })
        ->when($start_date && $end_date, function ($query) use ($start_date, $end_date) {
            $query->whereBetween('date', [$start_date, $end_date]);
        })
        ->sum('nominal');

        $transaction_out = Transaction::where('in_out', 'out')
        ->when(!$start_date && !$end_date && $month, function ($query) use ($month) {
            $query->where('month', $month);
        })
        ->when(!$start_date && !$end_date && $year, function ($query) use ($year) {
            $query->where('year', $year);
        })
        ->when($start_date && $end_date, function ($query) use ($start_date, $end_date) {
            $query->whereBetween('date', [$start_date, $end_date]);
        })
        ->sum('nominal');

        $transaction_in_paid_all = Transaction::where('in_out', 'in')->where('status', 'paid')->sum('nominal');
        $transaction_out_all = Transaction::where('in_out', 'out')->sum('nominal');


        if ($start_date && $end_date || request()->input('month') || request()->input('year')) {
            $sisa = $transaction_in_paid - $transaction_out;
        } else {
            $sisa = $transaction_in_paid_all - $transaction_out_all;
        }

        $months = [
            '01' => 'Januari', '02' => 'Februari', '03' => 'Maret', '04' => 'April',
            '05' => 'Mei', '06' => 'Juni', '07' => 'Juli', '08' => 'Agustus',
            '09' => 'September', '10' => 'Oktober', '11' => 'November', '12' => 'Desember'
        ];

        $transaction_in_paid_array = [];
        $transaction_in_unpaid_array = [];
        $transaction_out_array = [];

        foreach ($months as $num => $name) {
            $transaction_in_paid_array[] = Transaction::where('in_out', 'in')
            ->where('status', 'paid')
            ->where('month', $num)
            ->when(!$start_date && !$end_date && $year, function ($query) use ($year) {
                $query->where('year', $year);
            })
            ->when($start_date && $end_date, function ($query) use ($start_date, $end_date) {
                $query->whereYear('date', $start_date);
            })
            ->sum('nominal');

            $transaction_in_unpaid_array[] = Transaction::where('in_out', 'in')
            ->where('status', 'unpaid')
            ->where('type', 'IPKL')
            ->where('month', $num)
            ->when(!$start_date && !$end_date && $year, function ($query) use ($year) {
                $query->where('year', $year);
            })
            ->when($start_date && $end_date, function ($query) use ($start_date, $end_date) {
                $query->whereYear('date', $start_date);
            })
            ->sum('nominal');

            $transaction_out_array[] = Transaction::where('in_out', 'out')
            ->where('month', $num)
            ->when(!$start_date && !$end_date && $year, function ($query) use ($year) {
                $query->where('year', $year);
            })
            ->when($start_date && $end_date, function ($query) use ($start_date, $end_date) {
                $query->whereYear('date', $start_date);
            })
            ->sum('nominal');
        }

        return view('transaction.laporanKeuangan', compact(
            'title',
            'transaction_in_paid',
            'transaction_in_unpaid',
            'transaction_out',
            'transaction_in_paid_array',
            'transaction_in_unpaid_array',
            'transaction_out_array',
            'months',
            'year',
            'sisa'
        ));
    }
}
