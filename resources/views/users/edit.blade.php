@extends('layouts.dashboard')
@section('button')
    <li class="nav-item mr-2">
        <a href="{{ url('/users') }}" class="btn nav-link" style="color: red; border:1px solid red; background-color:white; ">Back</a>
    </li>
@endsection
@section('isi')
    <div class="container-fluid">
        <div class="card col-lg-12">
            <div class="mt-4 p-4">
                <form method="post" action="{{ url('/users/update/'.$user->id) }}" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="form-row">
                        <div class="col">
                            <label for="name">Nama</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $user->name) }}" autofocus>
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col">
                            <label for="foto" class="form-label">Foto</label>
                            <input class="form-control @error('foto') is-invalid @enderror" type="file" id="foto" name="foto">
                            @error('foto')
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
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $user->email) }}">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <br>
                    <div class="form-row">
                        <div class="col">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" value="{{ old('alamat', $user->alamat) }}">
                            @error('alamat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col">
                            <label for="rt">RT</label>
                            <select name="rt" id="rt" class="form-control @error('rt') is-invalid @enderror selectpicker" data-live-search="true">
                                <option value="">-- Pilih RT --</option>
                                <option value="001" {{ '001' == old('rt', $user->rt) ? 'selected="selected"' : '' }}>001</option>
                                <option value="002" {{ '002' == old('rt', $user->rt) ? 'selected="selected"' : '' }}>002</option>
                                <option value="003" {{ '003' == old('rt', $user->rt) ? 'selected="selected"' : '' }}>003</option>
                            </select>
                            @error('rt')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <br>
                    <div class="form-row">
                        <div class="col">
                            <label for="no_hp">Nomor HP</label>
                            <input type="text" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" name="no_hp" value="{{ old('no_hp', $user->no_hp) }}">
                            @error('no_hp')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col">
                            <label for="keterangan">Keterangan</label>
                            <input type="text" class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" name="keterangan" value="{{ old('keterangan', $user->keterangan) }}">
                            @error('keterangan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <br>
                    <div class="form-row">
                        <div class="col">
                            <label for="role">Role</label>
                            <select class="form-control selectpicker" name="role[]" id="role" multiple data-live-search="true">
                                @foreach ($roles as $role)
                                    <option value="{{ $role->name }}" {{ (is_array(old('role', $user_roles)) && in_array($role->name, old('role', $user_roles))) ? 'selected' : '' }}>
                                        {{ $role->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control @error('status') is-invalid @enderror selectpicker" data-live-search="true">
                                <option value="">-- Pilih Status --</option>
                                <option value="Dihuni" {{ 'Dihuni' == old('status', $user->status) ? 'selected="selected"' : '' }}>Dihuni</option>
                                <option value="Belum dihuni" {{ 'Belum dihuni' == old('status', $user->status) ? 'selected="selected"' : '' }}>Belum dihuni</option>
                            </select>
                            @error('status')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <br>

                    <div class="table-responsive mb-3">
                        @php
                            $old = session()->getOldInput();
                        @endphp
                        <table class="table table-striped" id="tablemultiple" style="font-size:12px">
                            <thead>
                                <tr>
                                    <th style="min-width: 300px; background-color:rgb(243, 243, 243);" class="text-center">Nama Anggota Keluarga</th>
                                    <th style="min-width: 200px; background-color:rgb(243, 243, 243);" class="text-center">Status Anggota Keluarga</th>
                                    <th class="text-center" style="background-color:rgb(243, 243, 243);">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($old['nama_keluarga']))
                                    @foreach ($old['nama_keluarga'] as $key => $detailName)
                                        <tr id="multiple{{ $key }}">
                                            <td style="vertical-align: middle;">
                                                <input type="text" class="form-control borderi nama_keluarga" id="nama_keluarga" name="nama_keluarga[]" value="{{ old('nama_keluarga')[$key] }}">
                                            </td>

                                            <td style="vertical-align: middle;">
                                                <select class="form-control borderi select2 status_keluarga" id="status_keluarga" name="status_keluarga[]">
                                                    <option value="">-- Pilih --</option>
                                                    @foreach(['Kepala Keluarga', 'Suami', 'Istri', 'Anak', 'Menantu', 'Cucu', 'Orang Tua', 'Mertua', 'Famili Lain', 'Pembantu', 'Lainnya'] as $status_keluarga)
                                                        <option value="{{ $status_keluarga }}" {{ $status_keluarga == old('status_keluarga')[$key] ? 'selected="selected"' : '' }}>{{ $status_keluarga }}</option>
                                                    @endforeach
                                                </select>
                                            </td>

                                            <td class="text-center" style="vertical-align: middle;">
                                                <a class="btn btn-sm btn-danger delete"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    @if (count($user->keluarga) > 0)
                                        @foreach ($user->keluarga as $key => $keluarga)
                                            <tr id="multiple{{ $key }}">
                                                <td style="vertical-align: middle;">
                                                    <input type="text" class="form-control borderi nama_keluarga" id="nama_keluarga" name="nama_keluarga[]" value="{{ $keluarga->nama_keluarga }}">
                                                </td>

                                                <td style="vertical-align: middle;">
                                                    <select class="form-control borderi select2 status" id="status_keluarga" name="status_keluarga[]">
                                                        <option value="">-- Pilih --</option>
                                                        @foreach(['Kepala Keluarga', 'Suami', 'Istri', 'Anak', 'Menantu', 'Cucu', 'Orang Tua', 'Mertua', 'Famili Lain', 'Pembantu', 'Lainnya'] as $status_keluarga)
                                                            <option value="{{ $status_keluarga }}" {{ $status_keluarga == $keluarga->status_keluarga ? 'selected="selected"' : '' }}>{{ $status_keluarga }}</option>
                                                        @endforeach
                                                    </select>
                                                </td>

                                                <td class="text-center" style="vertical-align: middle;">
                                                    <a class="btn btn-sm btn-danger delete"><i class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr id="multiple0">
                                            <td style="vertical-align: middle;">
                                                <input type="text" class="form-control borderi nama_keluarga" id="nama_keluarga" name="nama_keluarga[]">
                                            </td>

                                            <td style="vertical-align: middle;">
                                                <select class="form-control borderi select2 status" id="status_keluarga" name="status_keluarga[]">
                                                    <option value="">-- Pilih --</option>
                                                    @foreach(['Kepala Keluarga', 'Suami', 'Istri', 'Anak', 'Menantu', 'Cucu', 'Orang Tua', 'Mertua', 'Famili Lain', 'Pembantu', 'Lainnya'] as $status_keluarga)
                                                        <option value="{{ $status_keluarga }}">{{ $status_keluarga }}</option>
                                                    @endforeach
                                                </select>
                                            </td>

                                            <td class="text-center" style="vertical-align: middle;">
                                                <a class="btn btn-sm btn-danger delete"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    @endif
                                @endif
                            </tbody>
                        </table>
                        <a id="add_row" class="btn btn-sm btn-success float-right mt-3">+ Tambah</a>
                    </div>
                    <br>

                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
            </div>
        </div>
    </div>

    @push('script')
        <script>
            var row_number = 1;
            var temp_row_number = row_number-1;
            $("#add_row").click(function(e) {
                e.preventDefault();
                var new_row_number = row_number - 1;
                var table = document.getElementById("tablemultiple");
                var tbodyRowCount = table.tBodies[0].rows.length;
                new_row = $('#tablemultiple tbody tr:last').clone();
                new_row.find("input").val("").end();
                new_row.find("select").val("").end();
                $('#tablemultiple').append(new_row);
                $('#tablemultiple tbody tr:last').attr('id','multiple'+(tbodyRowCount));
                row_number++;
                temp_row_number = row_number - 1;
            });

            $('body').on('click', '.delete', function (event) {
                var table = document.getElementById("tablemultiple");
                var tbodyRowCount = table.tBodies[0].rows.length;
                if (tbodyRowCount <= 1) {
                    alert('Cannot delete if only 1 row!');
                } else {
                    if (confirm('Are you sure you want to delete?')) {
                        $(this).closest('tr').remove();
                    }
                }
            });
        </script>
    @endpush
@endsection
