@extends('layouts.dashboard')
@section('isi')
    <div class="container-fluid">
        <center>
            <div class="card col-lg-5">
                <div class="p-3">
                    <form method="post" action="{{ url('/roles/'.$roles->id) }}">
                        @method('put')
                        @csrf
                            <div class="form-group">
                                <label for="name" class="float-left">Nama</label>
                                <input type="name" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $roles->name) }}">
                                @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="guard_name" class="float-left">Guard</label>
                                <input type="guard_name" class="form-control @error('guard_name') is-invalid @enderror" id="guard_name" name="guard_name" value="web" readonly>
                                @error('guard_name')
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
