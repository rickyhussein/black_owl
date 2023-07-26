@extends('layouts.dashboard')
@section('isi')
    <div class="container-fluid">
        <center>
            <div class="card col-lg-5">
                <div class="p-3">
                    <form method="post" action="{{ url('/my-profile/update-password/'.auth()->user()->id) }}">
                        @method('put')
                        @csrf
                            <div class="form-group">
                                <label for="name" class="float-left">Nama</label>
                                <input type="text" class="form-control" value="{{ auth()->user()->name }}" disabled id="name">
                            </div>
                            <div class="form-group">
                                <label for="password" class="float-left">Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                                @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        <br>
                        <button type="submit" class="btn btn-primary float-right">Submit</button>
                      </form>
                </div>
            </div>
        </center>
    </div>
@endsection
