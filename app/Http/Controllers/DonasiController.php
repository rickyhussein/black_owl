<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DonasiController extends Controller
{
    public function myDonasi()
    {
        $title = 'Donasi';
        $start_date = request()->input('start_date');
        $end_date = request()->input('end_date');

        $transaction_donasi = Transaction::where('user_id', auth()->user()->id)
        ->where(function ($query) {
            $query->where('type', 'Donasi Fasum')
            ->orWhere('type', 'Donasi Umum')
            ->orWhere('type', 'Donasi Lainnya');
        })
        ->when($start_date && $end_date, function ($query) use ($start_date, $end_date) {
            $query->whereBetween('date', [$start_date, $end_date]);
        })
        ->orderBy('id', 'DESC')
        ->paginate(10)
        ->withQueryString();

        return view('donasi.myDonasi', compact(
            'title',
            'transaction_donasi'
        ));
    }

    public function tambahMyDonasi()
    {
        $title = 'Donasi';

        return view('donasi.tambahMyDonasi', compact(
            'title',
        ));
    }

    public function storeMyDonasi(Request $request)
    {
        $result = null;
        DB::transaction(function ()  use ($request, $result) {
            $validated = $request->validate([
                'date' => 'required',
                'type' => 'required',
                'payment_source' => 'required',
                'nominal' => 'required',
                'notes' => 'nullable',
                'file_transaction_path' => 'nullable',
            ]);

            $validated['nominal'] = $request->nominal ? str_replace(',', '', $request->nominal) : 0;
            $validated['month'] = date('m', strtotime($request->date));
            $validated['year'] = date('Y', strtotime($request->date));
            $validated['user_id'] = auth()->user()->id;
            $validated['created_by'] = auth()->user()->id;
            $validated['expired'] = 15;
            $validated['status'] = 'unpaid';
            $validated['in_out'] = 'in';

            if ($request->payment_source == 'Bank Transfer (Perlu Konfirmasi Pembayaran Manual)') {
                $validated['status_approval'] = 'draft';
            }

            if ($request->file('file_transaction_path')) {
                $validated['file_transaction_path'] = $request->file('file_transaction_path')->store('file_transaction_path');
                $validated['file_transaction_name'] = $request->file('file_transaction_path')->getClientOriginalName();
            }

            $donasi = Transaction::create($validated);
            $this->result = $donasi->id;

            $date = Carbon::parse($donasi->date);
            $now = Carbon::now();
            $diff_day = $now->diffInDays($date->addDay(), false);
            $diff_day = max(0, $diff_day);
            $total_expired = $diff_day + $donasi->expired;
            $user = User::find($donasi->user_id);

            if ($donasi->payment_source == 'midtrans') {
                \Midtrans\Config::$serverKey = config('midtrans.server_key');
                \Midtrans\Config::$isProduction = config('midtrans.is_production');
                \Midtrans\Config::$isSanitized = true;
                \Midtrans\Config::$is3ds = true;

                $params = array(
                    'transaction_details' => array(
                        'order_id' => $donasi->id,
                        'gross_amount' => $donasi->nominal,
                    ),
                    'expiry' => array(
                        'start_time' => date("Y-m-d H:i:s O"),
                        'unit' => 'days',
                        'duration' => $total_expired,
                    ),
                    'customer_details' => array(
                        'first_name' => $user->name ?? '',
                        'email' => $user->email ?? '',
                        'phone' => $user->no_hp,
                    ),
                );

                $snapToken = \Midtrans\Snap::getSnapToken($params);
                $donasi->update([
                    'snaptoken' => $snapToken
                ]);
            }

            if ($donasi->payment_source == 'midtrans') {
                $message = auth()->user()->name . ' telah melakukan ' . $donasi->type . ' (' . $donasi->status . ' - ' . $donasi->payment_source . ').';
            } else {
                $message = $donasi->type . ' dari ' . auth()->user()->name . ' membutuhkan approval dari anda.';
            }

            $users = User::whereHas('roles', function ($query) {
                $query->where('name', 'admin');
            })->get();

            foreach ($users as $user) {
                $user->messages = [
                    'user_id'   =>  auth()->user()->id,
                    'from'   =>  auth()->user()->name,
                    'message'   =>  $message,
                    'action'   =>  '/donasi/show/'.$donasi->id
                ];
                $user->notify(new \App\Notifications\UserNotification);
            }
        });

        return redirect('/my-donasi/show/'.$this->result)->with('success', 'Data Berhasil Ditambahkan');
    }

    public function showMyDonasi($id)
    {
        $title = 'Donasi';
        $donasi = Transaction::find($id);

        return view('donasi.showMyDonasi', compact(
            'title',
            'donasi',
        ));
    }
}
