<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kontak;
use App\Models\Pengurus;
use App\Models\Fasilitas;
use App\Models\TataTertib;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use RealRashid\SweetAlert\Facades\Alert;

class authController extends Controller
{
    public function index()
    {
        $fasilitas = Fasilitas::orderBy('id', 'ASC')->get();
        $kontak = Kontak::orderBy('id', 'ASC')->get();
        $tata_tertib = TataTertib::orderBy('id', 'ASC')->get();
        $pengurus = Pengurus::orderBy('id', 'ASC')->get();

        return view('auth.index', compact(
            'fasilitas',
            'kontak',
            'tata_tertib',
            'pengurus',
        ));
    }

    public function login()
    {
        return view('auth.login',[
            "title" => "Log In"
        ]);
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
            if (auth()->user()->hasRole('admin')) {
                return redirect()->intended('/dashboard');
            } else {
                return redirect()->intended('/dashboard-user');
            }
        }

        Alert::error('Failed', 'Username / Password Salah');
        return back();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function forgotPassword()
    {
        $title = 'Forgot Password';
        return view('auth.forgot-password', compact(
            'title'
        ));
    }

    public function forgotPasswordLink(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with(['success' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }

    public function showResetForm($token)
    {
        $title = 'Reset Password';
        return view('auth.passwords.reset', compact(
            'token',
            'title'
        ));
    }

    public function reset(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->password = Hash::make($password);
                $user->setRememberToken(Str::random(60));
                $user->save();
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('success', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }

    public function switch(Request $request, $id)
    {
        $request->session()->put('existing_user_id', Auth::user()->id);
        $request->session()->put('user_is_switched', true);
        Auth::loginUsingId($id);
        return redirect()->to('/');
    }
}
