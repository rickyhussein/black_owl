<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Http;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable; // Tambahkan ini

class SendNotification implements ShouldQueue
{
    use Dispatchable, Queueable, SerializesModels; // Gunakan Dispatchable

    protected $user;
    protected $ipkl;
    protected $month_name;
    protected $expired_date;
    protected $nominal;
    protected $whatsappApiUrl;
    protected $whatsappApiKey;
    protected $whatsappSender;

    public function __construct($user, $ipkl, $month_name, $expired_date, $nominal)
    {
        $this->user = $user;
        $this->ipkl = $ipkl;
        $this->month_name = $month_name;
        $this->expired_date = $expired_date;
        $this->nominal = $nominal;
        $this->whatsappApiUrl = config('midtrans.whatsapp_api_url');
        $this->whatsappApiKey = config('midtrans.whatsapp_api_key');
        $this->whatsappSender = config('midtrans.whatsapp_sender');
    }

    public function handle()
    {
        $message = "Ini adalah pesan otomatis dari sistem layanan Cluster Madrid\n\n" .
                   "Salam sejahtera Bapak/Ibu, Kami informasikan data dibawah ini belum melakukan pembayaran\n" .
                   "Nama : " . $this->user->name . "\n" .
                   "Alamat : " . $this->user->alamat . "\n" .
                   "Jenis Pembayaran : IPKL (" . $this->month_name . ' ' . $this->ipkl->year . ") \n" .
                   "Jatuh Tempo : " . $this->expired_date . "\n" .
                   "Status : " . $this->ipkl->status . "\n" .
                   "Nominal : Rp " . $this->nominal . "\n\n" .
                   "Pembayaran Melalui Link Dibawah Ini \n";

        Http::post($this->whatsappApiUrl, [
            'api_key' => $this->whatsappApiKey,
            'sender' => $this->whatsappSender,
            'number' => $this->user->no_hp,
            'message' => $message,
            'footer' => url('/my-ipkl/show/'.$this->ipkl->id),
        ]);
    }
}

