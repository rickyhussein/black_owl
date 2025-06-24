<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function transaction()
    {
        return $this->hasMany(Transaction::class);
    }

    public function keluarga()
    {
        return $this->hasMany(Keluarga::class, 'user_id');
    }

    public function getIpkl($user_id, $month, $year)
    {
        $total_ipkl = Transaction::where('type', 'IPKL')->where('status', 'paid')->where('user_id', $user_id)->where('month', $month)->where('year', $year)->sum('nominal');

        return $total_ipkl;
    }

    public function getGateCard($user_id)
    {
        $total_gate_card = Transaction::where('type', 'Gate Card')->where('status', 'paid')->where('user_id', $user_id)->sum('nominal');

        return $total_gate_card;
    }

    public function getQtyGateCard($user_id)
    {
        $total_gate_card = Transaction::where('type', 'Gate Card')->where('status', 'paid')->where('user_id', $user_id)->sum('qty');

        return $total_gate_card;
    }

    public function countIpklPaid($user_id, $month, $year)
    {
        $count_ipkl_paid = Transaction::where('type', 'IPKL')->where('status', 'paid')->where('user_id', $user_id)->where('month', $month)->where('year', $year)->count();

        return $count_ipkl_paid;
    }

    public function countIpklUnpaid($user_id, $month, $year)
    {
        $count_ipkl_unpaid = Transaction::where('type', 'IPKL')->where('status', 'unpaid')->where('user_id', $user_id)->where('month', $month)->where('year', $year)->count();

        return $count_ipkl_unpaid;
    }

    public function getDonasiFasum($user_id, $month, $year)
    {
        $total_donasi_fasum = Transaction::where('type', 'Donasi Fasum')->where('status', 'paid')->where('user_id', $user_id)->where('month', $month)->where('year', $year)->sum('nominal');

        return $total_donasi_fasum;
    }

    public function getDonasiUmum($user_id, $month, $year)
    {
        $total_donasi_umum = Transaction::where('type', 'Donasi Umum')->where('status', 'paid')->where('user_id', $user_id)->where('month', $month)->where('year', $year)->sum('nominal');

        return $total_donasi_umum;
    }

    public function getDonasiLainnya($user_id, $month, $year)
    {
        $total_donasi_lainnya = Transaction::where('type', 'Donasi Lainnya')->where('status', 'paid')->where('user_id', $user_id)->where('month', $month)->where('year', $year)->sum('nominal');

        return $total_donasi_lainnya;
    }

    public function whatsapp($phoneNumber)
    {
        if (substr($phoneNumber, 0, 1) == '0') {
            return '62' . substr($phoneNumber, 1);
        }
        return $phoneNumber;
    }

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
