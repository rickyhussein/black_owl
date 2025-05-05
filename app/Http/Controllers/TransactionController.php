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

        $transaction_in_paid = Transaction::where('in_out', 'in')->where('status', 'paid')->where('month', $month)->where('year', $year)->sum('nominal');
        $transaction_in_unpaid = Transaction::where('in_out', 'in')->where('status', 'unpaid')->where('type', 'IPKL')->where('month', $month)->where('year', $year)->sum('nominal');
        $transaction_out = Transaction::where('in_out', 'out')->where('status', 'paid')->where('month', $month)->where('year', $year)->sum('nominal');

        $transaction_in_paid_all = Transaction::where('in_out', 'in')->where('status', 'paid')->sum('nominal');
        $transaction_out_all = Transaction::where('in_out', 'out')->where('status', 'paid')->sum('nominal');

        $sisa = $transaction_in_paid_all - $transaction_out_all;

        $months = [
            '01' => 'Januari', '02' => 'Februari', '03' => 'Maret', '04' => 'April',
            '05' => 'Mei', '06' => 'Juni', '07' => 'Juli', '08' => 'Agustus',
            '09' => 'September', '10' => 'Oktober', '11' => 'November', '12' => 'Desember'
        ];

        $transaction_in_paid_array = [];
        $transaction_in_unpaid_array = [];
        $transaction_out_array = [];

        foreach ($months as $num => $name) {
            $transaction_in_paid_array[] = Transaction::where('in_out', 'in')->where('status', 'paid')->where('month', $num)->where('year', $year)->sum('nominal');
            $transaction_in_unpaid_array[] = Transaction::where('in_out', 'in')->where('status', 'unpaid')->where('type', 'IPKL')->where('month', $num)->where('year', $year)->sum('nominal');
            $transaction_out_array[] = Transaction::where('in_out', 'out')->where('month', $num)->where('year', $year)->sum('nominal');
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
