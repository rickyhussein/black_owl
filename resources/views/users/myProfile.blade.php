@extends('layouts.app')
@section('back')
    <a href="{{ url('/dashboard-user') }}" class="back-btn"> <i class="icon-left"></i> </a>
@endsection
@section('container')
    <form class="tf-form" action="{{ url('/my-profile/update/'.$user->id) }}" enctype="multipart/form-data" method="POST">
        @method('PUT')
        @csrf
        <div id="app-wrap" class="mt-4">
            <div class="bill-content">
                <div class="tf-container ms-4 me-4">
                    <div class="card-secton transfer-section mt-2">
                        <div class="tf-container">
                            <div class="tf-balance-box" style="background-color: rgb(207, 207, 207);">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="inner-left d-flex justify-content-between align-items-center">
                                        @if($user->foto == null)
                                            <img src="{{ url('assets/img/foto_default.jpg') }}" alt="image">
                                        @else
                                            <img src="{{ url('/storage/'.$user->foto) }}" alt="image">
                                        @endif
                                        <p class="fw_7 on_surface_color">{{ $user->name }}</p>
                                    </div>
                                    <p class="fw_7 on_surface_color">{{ $user->alamat }}</p>
                                </div>
                            </div>
                            <div class="tf-spacing-20"></div>
                            <div class="group-input">
                                <label for="name">Nama</label>
                                <input type="text" class="@error('name') is-invalid @enderror" name="name" value="{{ old('name', $user->name) }}" />
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="group-input">
                                <label for="email">Email</label>
                                <input type="email" class="@error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $user->email) }}">
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="group-input">
                                <label for="alamat">Alamat</label>
                                <input type="text" class="@error('alamat') is-invalid @enderror" id="alamat" name="alamat" value="{{ old('alamat', $user->alamat) }}">
                                @error('alamat')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="group-input">
                                <label for="rt" style="z-index: 100">RT</label>
                                <select name="rt" id="rt" class="@error('rt') is-invalid @enderror select2" data-live-search="true">
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

                            <div class="group-input">
                                <label for="no_hp">Nomor HP</label>
                                <input type="number" class="@error('no_hp') is-invalid @enderror" id="no_hp" name="no_hp" value="{{ old('no_hp', $user->no_hp) }}">
                                @error('no_hp')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="group-input">
                                <label for="keterangan">Keterangan</label>
                                <input type="text" class="@error('keterangan') is-invalid @enderror" id="keterangan" name="keterangan" value="{{ old('keterangan', $user->keterangan) }}">
                                @error('keterangan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="group-input">
                                <input class="form-control @error('foto') is-invalid @enderror" type="file" id="foto" name="foto">
                                @error('foto')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="group-input">
                                <label for="role">Role</label>
                                <input type="text" class="@error('role') is-invalid @enderror" name="role" value="{{ old('role', $user_roles) }}" disabled />
                            </div>

                            <div class="group-input">
                                <label for="status">status</label>
                                <input type="text" class="@error('status') is-invalid @enderror" name="status" value="{{ old('status', $user->status) }}" disabled />
                            </div>

                            <div class="table-responsive mb-3">
                                @php
                                    $old = session()->getOldInput();
                                @endphp
                                <table class="table" id="tablemultiple" style="font-size:8px">
                                    <thead>
                                        <tr>
                                            <th style="width: 45%; background-color:rgb(243, 243, 243);" class="text-center">Nama Anggota Keluarga</th>
                                            <th style="width: 45%; background-color:rgb(243, 243, 243);" class="text-center">Status Anggota Keluarga</th>
                                            <th class="text-center" style="background-color:rgb(243, 243, 243);">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(isset($old['nama_keluarga']))
                                            @foreach ($old['nama_keluarga'] as $key => $detailName)
                                                <tr id="multiple{{ $key }}">
                                                    <td style="vertical-align: middle;">
                                                        <input type="text" class="borderi nama_keluarga" id="nama_keluarga" name="nama_keluarga[]" value="{{ old('nama_keluarga')[$key] }}">
                                                    </td>

                                                    <td style="vertical-align: middle;">
                                                        <select class="borderi status_keluarga" id="status_keluarga" name="status_keluarga[]">
                                                            <option value="">-- Pilih --</option>
                                                            @foreach(['Kepala Keluarga', 'Suami', 'Istri', 'Anak', 'Menantu', 'Cucu', 'Orang Tua', 'Mertua', 'Famili Lain', 'Pembantu', 'Lainnya'] as $status_keluarga)
                                                                <option value="{{ $status_keluarga }}" {{ $status_keluarga == old('status_keluarga')[$key] ? 'selected="selected"' : '' }}>{{ $status_keluarga }}</option>
                                                            @endforeach
                                                        </select>
                                                    </td>

                                                    <td class="text-center" style="vertical-align: middle;">
                                                        <a class="btn btn-sm btn-danger delete" style="border-radius:50px"><i class="fa fa-trash"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            @if (count($user->keluarga) > 0)
                                                @foreach ($user->keluarga as $key => $keluarga)
                                                    <tr id="multiple{{ $key }}">
                                                        <td style="vertical-align: middle;">
                                                            <input type="text" class="borderi nama_keluarga" id="nama_keluarga" name="nama_keluarga[]" value="{{ $keluarga->nama_keluarga }}">
                                                        </td>

                                                        <td style="vertical-align: middle;">
                                                            <select class="borderi status_keluarga" id="status_keluarga" name="status_keluarga[]">
                                                                <option value="">-- Pilih --</option>
                                                                @foreach(['Kepala Keluarga', 'Suami', 'Istri', 'Anak', 'Menantu', 'Cucu', 'Orang Tua', 'Mertua', 'Famili Lain', 'Pembantu', 'Lainnya'] as $status_keluarga)
                                                                    <option value="{{ $status_keluarga }}" {{ $status_keluarga == $keluarga->status_keluarga ? 'selected="selected"' : '' }}>{{ $status_keluarga }}</option>
                                                                @endforeach
                                                            </select>
                                                        </td>

                                                        <td class="text-center" style="vertical-align: middle;">
                                                            <a class="btn btn-sm btn-danger delete" style="border-radius:50px"><i class="fa fa-trash"></i></a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr id="multiple0">
                                                    <td style="vertical-align: middle;">
                                                        <input type="text" class="borderi nama_keluarga" id="nama_keluarga" name="nama_keluarga[]">
                                                    </td>

                                                    <td style="vertical-align: middle;">
                                                        <select class="borderi status_keluarga" id="status_keluarga" name="status_keluarga[]">
                                                            <option value="">-- Pilih --</option>
                                                            @foreach(['Kepala Keluarga', 'Suami', 'Istri', 'Anak', 'Menantu', 'Cucu', 'Orang Tua', 'Mertua', 'Famili Lain', 'Pembantu', 'Lainnya'] as $status_keluarga)
                                                                <option value="{{ $status_keluarga }}">{{ $status_keluarga }}</option>
                                                            @endforeach
                                                        </select>
                                                    </td>

                                                    <td class="text-center" style="vertical-align: middle;">
                                                        <a class="btn btn-sm btn-danger delete" style="border-radius:50px"><i class="fa fa-trash"></i></a>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endif
                                    </tbody>
                                </table>
                                <a id="add_row" class="btn btn-sm btn-success float-end">+ Tambah</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="bottom-navigation-bar st2 bottom-btn-fixed" style="bottom:65px">
            <div class="tf-container">
                <button type="submit" class="tf-btn accent large">Save</button>
            </div>
        </div>
    </form>

    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

    @push('script')
        <script>
            $('.select2').select2();
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
