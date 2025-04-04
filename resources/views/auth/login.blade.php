@extends('layouts.login')
@section('container')
    <style>
        .row {
            display: flex;
            align-items: stretch;
        }

        .separator {
            width: 1px;
            background-color: #ccc;
            margin: 0 10px;
        }
    </style>
    <form class="tf-form" action="{{ url('/login-proses') }}" method="POST">
        @csrf
        <h1>{{ $title }}</h1>
        <div class="group-input">
            <label>Email</label>
            <input type="email" placeholder="email" class="@error('email') is-invalid @enderror" value="{{ old('email') }}" name="email">
            @error('email')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
            @enderror
        </div>
        <div class="group-input auth-pass-input last">
            <label>Password</label>
            <input type="password" class="password-input @error('password') is-invalid @enderror" placeholder="Password" name="password">
            <a class="icon-eye password-addon" id="password-addon"></a>
            @error('password')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
            @enderror
        </div>

        <div class="group-input mt-4">
            <div class="icheck-primary">
                <input type="checkbox" name="remember" id="remember">
                <label for="remember" class="mt-2">
                    Remember Me
                </label>
            </div>
        </div>

        <button type="submit" class="tf-btn accent large">Log In</button>
        <div class="mt-2 text-right"> <a href="{{ url('/forgot-password') }}">Forgot Password <i class="fa fa-key"></i></a></div>
    </form>
@endsection
