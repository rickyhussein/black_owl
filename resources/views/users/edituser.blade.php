@extends('layouts.dashboard')
@section('isi')
    <div class="container-fluid">
        <div class="card col-lg-12">
            <div class="mt-4 p-4">
                <form method="post" action="{{ url('/users/update/'.$user["id"]) }}">
                    @method('PUT')
                    @csrf
                    <div class="form-row">
                        <div class="col">
                            <label for="name">Nama Lengkap</label>
                            <input type="text" class="form-control {{ isset($fails['name']) ? 'is-invalid' : '' }}" id="name" name="name" autofocus value="{{ $user['name'] }}">
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
                            <input type="email" class="form-control {{ isset($fails['email']) ? 'is-invalid' : '' }}" id="email" name="email" value="{{ $user['email'] }}">
                            @if (isset($fails['email']))
                            <div class="invalid-feedback">
                                {{ implode(' ', $fails['email']) }}
                            </div>
                            @endif
                        </div>
                        <div class="col">
                            <label for="telepon">Nomor Telfon</label>
                            <input type="number" class="form-control {{ isset($fails['telepon']) ? 'is-invalid' : '' }}" id="telepon" name="telepon" value="{{ $user['telepon'] }}">
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
                            <label for="kode_acak">Kode Acak</label>
                            <input type="text" class="form-control {{ isset($fails['kode_acak']) ? 'is-invalid' : '' }}" id="kode_acak" name="kode_acak" value="{{ $user['kode_acak'] }}">
                            @if (isset($fails['kode_acak']))
                            <div class="invalid-feedback">
                                {{ implode(' ', $fails['kode_acak']) }}
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
                                    @if(old('roles', in_array($role->name, $userRoles)) == $role->name)
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
                    <br>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                  <br>
            </div>
        </div>
    </div>
@endsection
