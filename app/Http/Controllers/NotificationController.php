<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        $filter = request()->input('filter','');
        $title = 'Notifications';

        $inboxs = auth()->user()->notifications()
                        ->when($filter == 'read', fn($query)=>$query->whereNotNull('read_at'))
                        ->when($filter == 'unread', fn($query)=>$query->whereNull('read_at'))
                        ->paginate(10)
                        ->withQueryString();

        return view('notifications.index', compact(
            'inboxs',
            'title'
        ));
    }

    public function readMessage($id)
    {
        $notifikasi = auth()->user()->notifications()->where('id', $id)->whereNull('read_at')->first();
        $notifikasi->markAsRead();
        return redirect($notifikasi->data["action"]);
    }

    public function notification()
    {
        $filter = request()->input('filter','');
        $title = 'Notifications';

        $inboxs = auth()->user()->notifications()
                        ->when($filter == 'read', fn($query)=>$query->whereNotNull('read_at'))
                        ->when($filter == 'unread', fn($query)=>$query->whereNull('read_at'))
                        ->paginate(10)
                        ->withQueryString();

        return view('notifications.notification', compact(
            'inboxs',
            'title'
        ));
    }
}
