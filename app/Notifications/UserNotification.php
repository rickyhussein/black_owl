<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;

class UserNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected $data;

    /**
     * Buat notifikasi baru.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Tentukan channel yang digunakan.
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Data yang akan disimpan ke database.
     */
    public function toArray($notifiable)
    {
        return $this->data;
    }
}

