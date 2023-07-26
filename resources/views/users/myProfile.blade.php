@extends('layouts.dashboard')
@section('isi')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <!-- Profile Image -->
                <div class="card" style="border-radius: 20px">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            @if(auth()->user()->foto == null)
                                <img class="profile-user-img img-fluid img-circle" src="{{ url('assets/img/foto_default.jpg') }}" alt="User profile picture">
                            @else
                                <img class="profile-user-img img-fluid img-circle" src="{{ url('storage/'.auth()->user()->foto) }}" alt="User profile picture">
                            @endif
                        </div>

                        <h3 class="profile-username text-center">{{ auth()->user()->name }}</h3>

                        <p class="text-muted text-center">{{ auth()->user()->jabatan }}</p>

                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                            <b>Email</b> <a class="float-right">{{ auth()->user()->email }}</a>
                            </li>
                            </li>
                            <li class="list-group-item">
                            <b>Telepon</b> <a class="float-right">{{ auth()->user()->telepon }}</a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <div class="col-md-9">
                <div class="card">
                      <div class="card-body">
                            <form method="post" action="{{ url('/my-profile/update/'.auth()->user()->id) }}">
                              @method('put')
                              @csrf
                              <div class="form-row">
                                  <div class="col">
                                      <label for="name">Nama Lengkap</label>
                                      <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" autofocus value="{{ old('name', auth()->user()->name) }}">
                                      @error('name')
                                      <div class="invalid-feedback">
                                          {{ $message }}
                                      </div>
                                      @enderror
                                  </div>
                              </div>
                              <br>
                              <div class="form-row">
                                  <div class="col">
                                      <label for="email">Email</label>
                                      <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', auth()->user()->email) }}">
                                      @error('email')
                                      <div class="invalid-feedback">
                                          {{ $message }}
                                      </div>
                                      @enderror
                                  </div>
                                  <div class="col">
                                      <label for="telepon">Nomor Telfon</label>
                                      <input type="text" class="form-control @error('telepon') is-invalid @enderror" id="telepon" name="telepon" value="{{ old('telepon', auth()->user()->telepon) }}">
                                      @error('telepon')
                                      <div class="invalid-feedback">
                                          {{ $message }}
                                      </div>
                                      @enderror
                                  </div>
                              </div>
                              <br>
                              <div class="form-row">
                                <div class="col">
                                    <label for="roles">Roles</label>
                                    <select class="custom-select" name="roles[]" id="roles" disabled multiple>
                                        @foreach (auth()->user()->roles as $role)
                                            <option value="{{ $role->name }}" selected>{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                              </div>
                              <br>
                              <button type="submit" class="btn btn-primary float-right">Submit</button>
                            </form>
                      </div>
                </div>
            </div>
        </div>
    </div>
@endsection
