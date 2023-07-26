<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index', [
            'title' => 'Dashboard',
            'jumlah_user' => User::count()
        ]);
    }
}
