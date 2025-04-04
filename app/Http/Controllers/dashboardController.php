<?php

namespace App\Http\Controllers;
use App\Models\User;

use App\Models\Transaction;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function index()
    {
        $title = 'Dashboard';
        $total_users = User::count();

        if (request()->input('year')) {
            $year = request()->input('year');
        } else {
            $year = date('Y');
        }

        $transaction_in_paid = Transaction::where('in_out', 'in')->where('status', 'paid')->where('year', $year)->sum('nominal');
        $transaction_in_unpaid = Transaction::where('in_out', 'in')->where('status', 'unpaid')->where('year', $year)->sum('nominal');
        $transaction_out = Transaction::where('in_out', 'out')->where('year', $year)->sum('nominal');

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
            $transaction_in_unpaid_array[] = Transaction::where('in_out', 'in')->where('status', 'unpaid')->where('month', $num)->where('year', $year)->sum('nominal');
            $transaction_out_array[] = Transaction::where('in_out', 'out')->where('month', $num)->where('year', $year)->sum('nominal');
        }

        return view('dashboard.index', compact(
            'title',
            'total_users',
            'transaction_in_paid',
            'transaction_in_unpaid',
            'transaction_out',
            'transaction_in_paid_array',
            'transaction_in_unpaid_array',
            'transaction_out_array',
            'months',
            'year'
        ));
    }


    public function dashboardUser()
    {
        $title = 'Dashboard';
        $tagihan_ipkl = Transaction::where('user_id', auth()->user()->id)->where('type', 'IPKL')->where('status', 'unpaid')->sum('nominal');
        return view('dashboard.dashboardUser', compact(
            'title',
            'tagihan_ipkl',
        ));
    }
}
