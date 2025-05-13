<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Exports\GateCardExport;
use Illuminate\Support\Facades\DB;
use App\Notifications\UserNotification;

class GateCardController extends Controller
{
    public function index()
    {
        $title = 'Gate Card';
        $user = request()->input('user');
        $start_date = request()->input('start_date');
        $end_date = request()->input('end_date');
        $payment_source = request()->input('payment_source');
        $status = request()->input('status');
        $status_approval = request()->input('status_approval');

        $transaction_gate_card = Transaction::where('type', 'Gate Card')
        ->when($user, function ($query) use ($user) {
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
        ->when($payment_source, function ($query) use ($payment_source) {
            $query->where('payment_source', $payment_source);
        })
        ->when($status, function ($query) use ($status) {
            $query->where('status', $status);
        })
        ->when($status_approval, function ($query) use ($status_approval) {
            $query->where('status_approval', $status_approval);
        })
        ->orderBy('id', 'DESC')
        ->paginate(10)
        ->withQueryString();

        return view('gate-card.index', compact(
            'title',
            'transaction_gate_card'
        ));
    }

    public function export()
    {
        return (new GateCardExport($_GET))->download('Gate Card.xlsx');
    }

    public function show($id)
    {
        $title = 'Gate Card';
        $gate_card = Transaction::find($id);

        return view('gate-card.show', compact(
            'title',
            'gate_card',
        ));
    }

    public function approval(Request $request, $id)
    {
        $gate_card = Transaction::find($id);
        $status = null;
        DB::transaction(function ()  use ($request, $gate_card, $status) {
            $validated = $request->validate([
                'status_approval' => 'required',
                'approver_notes' => 'nullable',
            ]);

            $validated['approved_by'] = auth()->user()->id;

            if ($request->status_approval == 'approved') {
                $validated['status'] = 'paid';
                $validated['paid_date'] = date('Y-m-d H:i:s');
                $this->status = 'Diapprove';
                $message = 'Pembayaran Gate Card anda telah di approve oleh ' . auth()->user()->name;
            } else {
                $validated['status'] = 'unpaid';
                $this->status = 'Direject';
                $message = 'Pembayaran Gate Card anda telah di reject oleh ' . auth()->user()->name;
            }

            $gate_card->update($validated);

            $user = User::find($gate_card->user_id);

            $data = [
                'user_id'   =>  auth()->user()->id,
                'from'   =>  auth()->user()->name,
                'message'   =>  $message ,
                'action'   =>  '/my-gate-card/show/'.$gate_card->id
            ];

            $user->notify(new UserNotification($data));

        });

        return redirect('/gate-card/show/'.$id)->with('success', 'Data Berhasil ' . $this->status);
    }

    public function myGateCard()
    {
        $title = 'Gate Card';
        $start_date = request()->input('start_date');
        $end_date = request()->input('end_date');

        $transaction_gate_card = Transaction::where('user_id', auth()->user()->id)
        ->where('type', 'Gate Card')
        ->when($start_date && $end_date, function ($query) use ($start_date, $end_date) {
            $query->whereBetween('date', [$start_date, $end_date]);
        })
        ->orderBy('id', 'DESC')
        ->paginate(10)
        ->withQueryString();

        return view('gate-card.myGateCard', compact(
            'title',
            'transaction_gate_card'
        ));
    }

    public function tambahMyGateCard()
    {
        $title = 'Gate Card';

        return view('gate-card.tambahMyGateCard', compact(
            'title',
        ));
    }

    public function storeMyGateCard(Request $request)
    {
        $result = null;
        DB::transaction(function ()  use ($request, $result) {
            $validated = $request->validate([
                'date' => 'required',
                'type' => 'required',
                'status_gate_card' => 'required',
                'payment_source' => 'required',
                'nominal' => 'required',
                'qty' => 'required|numeric|max:4',
                'notes' => 'nullable',
                'file_transaction_path' => 'file|max:10240',
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

            $gate_card = Transaction::create($validated);
            $this->result = $gate_card->id;

            $date = Carbon::parse($gate_card->date);
            $now = Carbon::now();
            $diff_day = $now->diffInDays($date->addDay(), false);
            $diff_day = max(0, $diff_day);
            $total_expired = $diff_day + $gate_card->expired;
            $user = User::find($gate_card->user_id);

            if ($gate_card->payment_source == 'midtrans') {
                \Midtrans\Config::$serverKey = config('midtrans.server_key');
                \Midtrans\Config::$isProduction = config('midtrans.is_production');
                \Midtrans\Config::$isSanitized = true;
                \Midtrans\Config::$is3ds = true;

                $params = array(
                    'transaction_details' => array(
                        'order_id' => $gate_card->id,
                        'gross_amount' => $gate_card->nominal,
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
                $gate_card->update([
                    'snaptoken' => $snapToken
                ]);
            }

            if ($gate_card->payment_source == 'midtrans') {
                $message = 'Permintaan pembuatan Gate Card oleh ' . auth()->user()->name . ' . (' . $gate_card->status . ' - ' . $gate_card->payment_source . ').';
            } else {
                $message = 'Permintaan pembuatan Gate Card oleh ' . auth()->user()->name . ' membutuhkan approval dari anda.';
            }

            $users = User::whereHas('roles', function ($query) {
                $query->where('name', 'admin');
            })->get();

            foreach ($users as $user) {
                $data = [
                    'user_id'   =>  auth()->user()->id,
                    'from'   =>  auth()->user()->name,
                    'message'   =>  $message,
                    'action'   =>  '/gate-card/show/'.$gate_card->id
                ];

                $user->notify(new UserNotification($data));
            }
        });

        return redirect('/my-gate-card/show/'.$this->result)->with('success', 'Data Berhasil Ditambahkan');
    }

    public function editMyGateCard($id)
    {
        $title = 'Gate Card';
        $gate_card = Transaction::find($id);

        return view('gate-card.editMyGateCard', compact(
            'title',
            'gate_card',
        ));
    }

    public function updateMyGateCard(Request $request, $id)
    {
        $gate_card_old = Transaction::find($id);
        $result = null;
        DB::transaction(function ()  use ($request, $result, $gate_card_old) {
            $validated = $request->validate([
                'date' => 'required',
                'type' => 'required',
                'status_gate_card' => 'required',
                'payment_source' => 'required',
                'nominal' => 'required',
                'qty' => 'required|numeric|max:4',
                'notes' => 'nullable',
                'file_transaction_path' => 'file|max:10240',
            ]);

            $validated['nominal'] = $request->nominal ? str_replace(',', '', $request->nominal) : 0;
            $validated['month'] = date('m', strtotime($request->date));
            $validated['year'] = date('Y', strtotime($request->date));
            $validated['user_id'] = auth()->user()->id;
            $validated['created_by'] = auth()->user()->id;
            $validated['updated_by'] = auth()->user()->id;
            $validated['expired'] = 15;
            $validated['status'] = 'unpaid';
            $validated['in_out'] = 'in';

            if ($gate_card_old->file_transaction_path) {
                $validated['file_transaction_path'] = $gate_card_old->file_transaction_path;
                $validated['file_transaction_name'] = $gate_card_old->file_transaction_name;
            }

            if ($request->payment_source == 'Bank Transfer (Perlu Konfirmasi Pembayaran Manual)') {
                $validated['status_approval'] = 'draft';
            }

            if ($request->file('file_transaction_path')) {
                $validated['file_transaction_path'] = $request->file('file_transaction_path')->store('file_transaction_path');
                $validated['file_transaction_name'] = $request->file('file_transaction_path')->getClientOriginalName();
            }

            $gate_card = Transaction::create($validated);
            $this->result = $gate_card->id;
            $gate_card_old->delete();

            $date = Carbon::parse($gate_card->date);
            $now = Carbon::now();
            $diff_day = $now->diffInDays($date->addDay(), false);
            $diff_day = max(0, $diff_day);
            $total_expired = $diff_day + $gate_card->expired;
            $user = User::find($gate_card->user_id);

            if ($gate_card->payment_source == 'midtrans') {
                \Midtrans\Config::$serverKey = config('midtrans.server_key');
                \Midtrans\Config::$isProduction = config('midtrans.is_production');
                \Midtrans\Config::$isSanitized = true;
                \Midtrans\Config::$is3ds = true;

                $params = array(
                    'transaction_details' => array(
                        'order_id' => $gate_card->id,
                        'gross_amount' => $gate_card->nominal,
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
                $gate_card->update([
                    'snaptoken' => $snapToken
                ]);
            }

            if ($gate_card->payment_source == 'midtrans') {
                $message = 'Permintaan pembuatan Gate Card oleh ' . auth()->user()->name . ' . (' . $gate_card->status . ' - ' . $gate_card->payment_source . ').';
            } else {
                $message = 'Permintaan pembuatan Gate Card oleh ' . auth()->user()->name . ' membutuhkan approval dari anda.';
            }

            $users = User::whereHas('roles', function ($query) {
                $query->where('name', 'admin');
            })->get();

            foreach ($users as $user) {
                $data = [
                    'user_id'   =>  auth()->user()->id,
                    'from'   =>  auth()->user()->name,
                    'message'   =>  $message,
                    'action'   =>  '/gate-card/show/'.$gate_card->id
                ];
                $user->notify(new UserNotification($data));
            }
        });

        return redirect('/my-gate-card/show/'.$this->result)->with('success', 'Data Berhasil Diupdate');
    }

    public function showMyGateCard($id)
    {
        $title = 'Gate Card';
        $gate_card = Transaction::find($id);

        return view('gate-card.showMyGateCard', compact(
            'title',
            'gate_card',
        ));
    }

    public function uploadMyGateCard(Request $request, $id)
    {
        $gate_card = Transaction::find($id);
        DB::transaction(function ()  use ($request, $gate_card) {
            $validated = $request->validate([
                'file_transaction_path' => 'required|file|max:10240',
            ]);

            if ($request->file('file_transaction_path')) {
                $validated['file_transaction_path'] = $request->file('file_transaction_path')->store('file_transaction_path');
                $validated['file_transaction_name'] = $request->file('file_transaction_path')->getClientOriginalName();
            }

            $gate_card->update($validated);
        });

        return redirect('/my-gate-card/show/'.$id)->with('success', 'File Berhasil Diupload');
    }

    public function deleteMyGateCard($id)
    {
        $gate_card = Transaction::find($id);
        DB::transaction(function ()  use ($gate_card) {
            $gate_card->delete();
        });

        return redirect('/my-gate-card')->with('success', 'Data Berhasil Didelete');
    }
}
