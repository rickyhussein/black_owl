<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class authController extends Controller
{
    public function index()
    {
        return view('auth.login',[
            "title" => "Log In"
        ]);
    }
    
    public function register()
    {
        return view('auth.register', [
            "title" => "Register Account"
        ]);
    }

    public function registerProses(Request $request)
    {
        $request["kode_acak"] = date('Ymd').uniqid();
        $validatedData = $request->validate([
            "name" => "required|max:255",
            "kode_acak" => "required",
            "email" => "required|email:dns|unique:users",
            "telepon" => "required",
            "password" => "required|confirmed|min:6",
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        $user = User::create($validatedData);
        $user->assignRole('user');
        $request->session()->flash('success', 'Registrasi Berhasil! Silahkan Login.');
        return redirect('/');
    }

    public function loginProses(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        
        $remember_me = $request->has('remember') ? true : false;

        if (Auth::attempt($credentials, $remember_me)) {
            $request->session()->regenerate();
            User::where('email', $request['email'])->update(['last_seen_at' => now()]);

            return redirect()->intended('/dashboard');
        }

        return back()->with('loginError', 'Login Gagal!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
