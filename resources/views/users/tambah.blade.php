@extends('layouts.dashboard')
@section('isi')
    <div class="container-fluid">
        <div class="card col-lg-12">
            <div class="mt-4 p-4">
                <form method="post" action="{{ url('/users/tambah-user-proses') }}">
                    @csrf
                    <div class="form-row">
                        <div class="col">
                            <label for="name">Nama Lengkap</label>
                            <input type="text" class="form-control {{ isset($fails['name']) ? 'is-invalid' : '' }}" id="name" name="name" autofocus>
                            @if (isset($fails['name']))
                            <div class="invalid-feedback">
                                {{ implode(' ', $fails['name']) }}
                            </div>
                            @endif
                        </div>
                    </div>
                    <br>
                    <div class="form-row">
                        <div class="col">
                            <label for="email">Email</label>
                            <input type="email" class="form-control {{ isset($fails['email']) ? 'is-invalid' : '' }}" id="email" name="email">
                            @if (isset($fails['email']))
                            <div class="invalid-feedback">
                                {{ implode(' ', $fails['email']) }}
                            </div>
                            @endif
                        </div>
                        <div class="col">
                            <label for="telepon">Nomor Telfon</label>
                            <input type="number" class="form-control {{ isset($fails['telepon']) ? 'is-invalid' : '' }}" id="telepon" name="telepon">
                            @if (isset($fails['telepon']))
                            <div class="invalid-feedback">
                                {{ implode(' ', $fails['telepon']) }}
                            </div>
                            @endif
                        </div>
                    </div>
                    <br>
                    <div class="form-row">
                        <div class="col">
                            <label for="password">Password</label>
                            <input type="password" au class="form-control {{ isset($fails['password']) ? 'is-invalid' : '' }}" id="password" name="password">
                            @if (isset($fails['password']))
                            <div class="invalid-feedback">
                                {{ implode(' ', $fails['password']) }}
                            </div>
                            @endif
                        </div>
                    </div>
                    <br>
                    <div class="form-row">
                        <div class="col">
                            <label for="roles">Roles</label>
                            <select class="custom-select" name="roles[]" id="roles" multiple>
                                @foreach ($roles as $role)
                                    @if($role->name == 'user')
                                        <option value="{{ $role->name }}" selected>{{ $role->name }}</option>
                                    @else
                                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    @if (isset($fails['roles']))
                        <span style="color: red">Roles Required</span>
                    @endif
                    <br>

                    <input type="hidden" name="kode_acak">
                    <br>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                  <br>
            </div>
        </div>
    </div>
@endsection
