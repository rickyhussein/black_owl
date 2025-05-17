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
                    </div>
                    <br>
                    <div class="form-row">
                        <div class="col">
                            <label for="rt">RT</label>
                            <select name="rt" id="rt" class="form-control @error('rt') is-invalid @enderror selectpicker" data-live-search="true">
                                <option value="">-- Pilih RT --</option>
                                <option value="001" {{ '001' == old('rt', $user->rt) ? 'selected="selected"' : '' }}>001</option>
                                <option value="002" {{ '002' == old('rt', $user->rt) ? 'selected="selected"' : '' }}>002</option>
                                <option value="003" {{ '003' == old('rt', $user->rt) ? 'selected="selected"' : '' }}>003</option>
                                <option value="004" {{ '004' == old('rt', $user->rt) ? 'selected="selected"' : '' }}>004</option>
                                <option value="005" {{ '005' == old('rt', $user->rt) ? 'selected="selected"' : '' }}>005</option>
                                <option value="006" {{ '006' == old('rt', $user->rt) ? 'selected="selected"' : '' }}>006</option>
                                <option value="007" {{ '007' == old('rt', $user->rt) ? 'selected="selected"' : '' }}>007</option>
                                <option value="008" {{ '008' == old('rt', $user->rt) ? 'selected="selected"' : '' }}>008</option>
                                <option value="009" {{ '009' == old('rt', $user->rt) ? 'selected="selected"' : '' }}>009</option>
                                <option value="010" {{ '010' == old('rt', $user->rt) ? 'selected="selected"' : '' }}>010</option>
                                <option value="011" {{ '011' == old('rt', $user->rt) ? 'selected="selected"' : '' }}>011</option>
                                <option value="012" {{ '012' == old('rt', $user->rt) ? 'selected="selected"' : '' }}>012</option>
                                <option value="013" {{ '013' == old('rt', $user->rt) ? 'selected="selected"' : '' }}>013</option>
                                <option value="014" {{ '014' == old('rt', $user->rt) ? 'selected="selected"' : '' }}>014</option>
                                <option value="015" {{ '015' == old('rt', $user->rt) ? 'selected="selected"' : '' }}>015</option>
                                <option value="016" {{ '016' == old('rt', $user->rt) ? 'selected="selected"' : '' }}>016</option>
                                <option value="017" {{ '017' == old('rt', $user->rt) ? 'selected="selected"' : '' }}>017</option>
                                <option value="018" {{ '018' == old('rt', $user->rt) ? 'selected="selected"' : '' }}>018</option>
                                <option value="019" {{ '019' == old('rt', $user->rt) ? 'selected="selected"' : '' }}>019</option>
                                <option value="020" {{ '020' == old('rt', $user->rt) ? 'selected="selected"' : '' }}>020</option>
                                <option value="021" {{ '021' == old('rt', $user->rt) ? 'selected="selected"' : '' }}>021</option>
                                <option value="022" {{ '022' == old('rt', $user->rt) ? 'selected="selected"' : '' }}>022</option>
                                <option value="023" {{ '023' == old('rt', $user->rt) ? 'selected="selected"' : '' }}>023</option>
                                <option value="024" {{ '024' == old('rt', $user->rt) ? 'selected="selected"' : '' }}>024</option>
                                <option value="025" {{ '025' == old('rt', $user->rt) ? 'selected="selected"' : '' }}>025</option>
                                <option value="026" {{ '026' == old('rt', $user->rt) ? 'selected="selected"' : '' }}>026</option>
                                <option value="027" {{ '027' == old('rt', $user->rt) ? 'selected="selected"' : '' }}>027</option>
                                <option value="028" {{ '028' == old('rt', $user->rt) ? 'selected="selected"' : '' }}>028</option>
                                <option value="029" {{ '029' == old('rt', $user->rt) ? 'selected="selected"' : '' }}>029</option>
                                <option value="030" {{ '030' == old('rt', $user->rt) ? 'selected="selected"' : '' }}>030</option>
                            </select>
                            @error('rt')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col">
                            <label for="rw">RW</label>
                            <select name="rw" id="rw" class="form-control @error('rw') is-invalid @enderror selectpicker" data-live-search="true">
                                <option value="">-- Pilih RW --</option>
                                <option value="001" {{ '001' == old('rw', $user->rw) ? 'selected="selected"' : '' }}>001</option>
                                <option value="002" {{ '002' == old('rw', $user->rw) ? 'selected="selected"' : '' }}>002</option>
                                <option value="003" {{ '003' == old('rw', $user->rw) ? 'selected="selected"' : '' }}>003</option>
                                <option value="004" {{ '004' == old('rw', $user->rw) ? 'selected="selected"' : '' }}>004</option>
                                <option value="005" {{ '005' == old('rw', $user->rw) ? 'selected="selected"' : '' }}>005</option>
                                <option value="006" {{ '006' == old('rw', $user->rw) ? 'selected="selected"' : '' }}>006</option>
                                <option value="007" {{ '007' == old('rw', $user->rw) ? 'selected="selected"' : '' }}>007</option>
                                <option value="008" {{ '008' == old('rw', $user->rw) ? 'selected="selected"' : '' }}>008</option>
                                <option value="009" {{ '009' == old('rw', $user->rw) ? 'selected="selected"' : '' }}>009</option>
                                <option value="010" {{ '010' == old('rw', $user->rw) ? 'selected="selected"' : '' }}>010</option>
                                <option value="011" {{ '011' == old('rw', $user->rw) ? 'selected="selected"' : '' }}>011</option>
                                <option value="012" {{ '012' == old('rw', $user->rw) ? 'selected="selected"' : '' }}>012</option>
                                <option value="013" {{ '013' == old('rw', $user->rw) ? 'selected="selected"' : '' }}>013</option>
                                <option value="014" {{ '014' == old('rw', $user->rw) ? 'selected="selected"' : '' }}>014</option>
                                <option value="015" {{ '015' == old('rw', $user->rw) ? 'selected="selected"' : '' }}>015</option>
                                <option value="016" {{ '016' == old('rw', $user->rw) ? 'selected="selected"' : '' }}>016</option>
                                <option value="017" {{ '017' == old('rw', $user->rw) ? 'selected="selected"' : '' }}>017</option>
                                <option value="018" {{ '018' == old('rw', $user->rw) ? 'selected="selected"' : '' }}>018</option>
                                <option value="019" {{ '019' == old('rw', $user->rw) ? 'selected="selected"' : '' }}>019</option>
                                <option value="020" {{ '020' == old('rw', $user->rw) ? 'selected="selected"' : '' }}>020</option>
                                <option value="021" {{ '021' == old('rw', $user->rw) ? 'selected="selected"' : '' }}>021</option>
                                <option value="022" {{ '022' == old('rw', $user->rw) ? 'selected="selected"' : '' }}>022</option>
                                <option value="023" {{ '023' == old('rw', $user->rw) ? 'selected="selected"' : '' }}>023</option>
                                <option value="024" {{ '024' == old('rw', $user->rw) ? 'selected="selected"' : '' }}>024</option>
                                <option value="025" {{ '025' == old('rw', $user->rw) ? 'selected="selected"' : '' }}>025</option>
                                <option value="026" {{ '026' == old('rw', $user->rw) ? 'selected="selected"' : '' }}>026</option>
                                <option value="027" {{ '027' == old('rw', $user->rw) ? 'selected="selected"' : '' }}>027</option>
                                <option value="028" {{ '028' == old('rw', $user->rw) ? 'selected="selected"' : '' }}>028</option>
                                <option value="029" {{ '029' == old('rw', $user->rw) ? 'selected="selected"' : '' }}>029</option>
                                <option value="030" {{ '030' == old('rw', $user->rw) ? 'selected="selected"' : '' }}>030</option>
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
                    @php
                        $old = session()->getOldInput();
                    @endphp
                    <div id="keluargaContainer">
                        @if(isset($old['nama_keluarga']))
                            @foreach ($old['nama_keluarga'] as $key => $detailName)
                                <div class="keluargaItem">
                                    <br>
                                    <hr>
                                    <h1 class="text-center title">Anggota Keluarga {{ $key + 1 }}</h1>
                                    <br>
                                    <div class="row">
                                        <div class="col-4 mb-4">
                                            <label for="nama_keluarga">Nama Keluarga</label>
                                            <input type="text" class="form-control borderi nama_keluarga" name="nama_keluarga[]" value="{{ old('nama_keluarga')[$key] }}">
                                        </div>
                                        <div class="col-4 mb-4">
                                            <label for="status_keluarga">Status Keluarga</label>
                                            <select class="form-control borderi select2 status_keluarga" name="status_keluarga[]">
                                                <option value="">-- Pilih --</option>
                                                @foreach(['Kepala Keluarga', 'Suami', 'Istri', 'Anak', 'Menantu', 'Cucu', 'Orang Tua', 'Mertua', 'Famili Lain', 'Pembantu', 'Lainnya'] as $status_keluarga)
                                                    <option value="{{ $status_keluarga }}" {{ $status_keluarga == old('status_keluarga')[$key] ? 'selected="selected"' : '' }}>{{ $status_keluarga }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-4 mb-4">
                                            <label for="born_place">Tempat Lahir</label>
                                            <input type="text" class="form-control borderi born_place" name="born_place[]" value="{{ old('born_place')[$key] }}">
                                        </div>
                                        <div class="col-4 mb-4">
                                            <label for="born_date">Tanggal Lahir</label>
                                            <input type="text" class="form-control date borderi born_date" name="born_date[]" value="{{ old('born_date')[$key] }}">
                                        </div>
                                        <div class="col-4 mb-4">
                                            <label for="gender" style="z-index: 1000">Jenis Kelamin</label>
                                            <select name="gender[]" class="form-control borderi gender select2">
                                                <option value="">-- Pilih Jenis Kelamin --</option>
                                                <option value="Laki-Laki" {{ 'Laki-Laki' == old('gender')[$key] ? 'selected="selected"' : '' }}>Laki-Laki</option>
                                                <option value="Perempuan" {{ 'Perempuan' == old('gender')[$key] ? 'selected="selected"' : '' }}>Perempuan</option>
                                            </select>
                                        </div>
                                        <div class="col-4 mb-4">
                                            <label for="nation">Bangsa</label>
                                            <input type="text" class="form-control borderi nation" name="nation[]" value="{{ old('nation')[$key] }}">
                                        </div>
                                        <div class="col-4 mb-4">
                                            <label for="religion" style="z-index: 1000">Agama</label>
                                            <select name="religion[]" class="form-control borderi religion select2">
                                                <option value="">-- Pilih Agama --</option>
                                                <option value="Islam" {{ 'Islam' == old('religion')[$key] ? 'selected="selected"' : '' }}>Islam</option>
                                                <option value="Kristen Protestan" {{ 'Kristen Protestan' == old('religion')[$key] ? 'selected="selected"' : '' }}>Kristen Protestan</option>
                                                <option value="Kristen Katolik" {{ 'Kristen Katolik' == old('religion')[$key] ? 'selected="selected"' : '' }}>Kristen Katolik</option>
                                                <option value="Hindu" {{ 'Hindu' == old('religion')[$key] ? 'selected="selected"' : '' }}>Hindu</option>
                                                <option value="Buddha" {{ 'Buddha' == old('religion')[$key] ? 'selected="selected"' : '' }}>Buddha</option>
                                                <option value="Khonghucu" {{ 'Khonghucu' == old('religion')[$key] ? 'selected="selected"' : '' }}>Khonghucu</option>
                                                <option value="Lainnya" {{ 'Lainnya' == old('religion')[$key] ? 'selected="selected"' : '' }}>Lainnya</option>
                                            </select>
                                        </div>
                                        <div class="col-4 mb-4">
                                            <label for="ktp_number">Nomor KTP</label>
                                            <input type="text" class="form-control borderi ktp_number" name="ktp_number[]" value="{{ old('ktp_number')[$key] }}">
                                        </div>
                                        <div class="col-4 mb-4">
                                            <label for="married_status" style="z-index: 1000">Status Perkawinan</label>
                                            <select name="married_status[]" class="form-control borderi married_status select2">
                                                <option value="">-- Pilih Pilih Status Perkawinan --</option>
                                                <option value="Belum Kawin" {{ 'Belum Kawin' == old('married_status')[$key] ? 'selected="selected"' : '' }}>Belum Kawin</option>
                                                <option value="Kawin" {{ 'Kawin' == old('married_status')[$key] ? 'selected="selected"' : '' }}>Kawin</option>
                                                <option value="Cerai Hidup" {{ 'Cerai Hidup' == old('married_status')[$key] ? 'selected="selected"' : '' }}>Cerai Hidup</option>
                                                <option value="Cerai Mati" {{ 'Cerai Mati' == old('married_status')[$key] ? 'selected="selected"' : '' }}>Cerai Mati</option>
                                            </select>
                                        </div>
                                        <div class="col-4 mb-4">
                                            <label for="job">Pekerjaan</label>
                                            <input type="text" class="form-control borderi job" name="job[]" value="{{ old('job')[$key] }}">
                                        </div>
                                        <div class="col-4 mb-4">
                                            <a class="btn btn-sm btn-danger delete" style="margin-top: 35px"><i class="fa fa-trash"></i></a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            @if (count($user->keluarga) > 0)
                                @foreach ($user->keluarga as $key => $keluarga)
                                    <div class="keluargaItem">
                                        <br>
                                        <hr>
                                        <h1 class="text-center title">Anggota Keluarga {{ $key + 1 }}</h1>
                                        <br>
                                        <div class="row">
                                            <div class="col-4 mb-4">
                                                <label for="nama_keluarga">Nama Keluarga</label>
                                                <input type="text" class="form-control borderi nama_keluarga" name="nama_keluarga[]" value="{{ $keluarga->nama_keluarga }}">
                                            </div>
                                            <div class="col-4 mb-4">
                                                <label for="status_keluarga">Status Keluarga</label>
                                                <select class="form-control borderi select2 status_keluarga" name="status_keluarga[]">
                                                    <option value="">-- Pilih --</option>
                                                    @foreach(['Kepala Keluarga', 'Suami', 'Istri', 'Anak', 'Menantu', 'Cucu', 'Orang Tua', 'Mertua', 'Famili Lain', 'Pembantu', 'Lainnya'] as $status_keluarga)
                                                        <option value="{{ $status_keluarga }}" {{ $status_keluarga == $keluarga->status_keluarga ? 'selected="selected"' : '' }}>{{ $status_keluarga }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-4 mb-4">
                                                <label for="born_place">Tempat Lahir</label>
                                                <input type="text" class="form-control borderi born_place" name="born_place[]"  value="{{ $keluarga->born_place }}">
                                            </div>
                                            <div class="col-4 mb-4">
                                                <label for="born_date">Tanggal Lahir</label>
                                                <input type="text" class="form-control date borderi born_date" name="born_date[]"  value="{{ $keluarga->born_date }}">
                                            </div>
                                            <div class="col-4 mb-4">
                                                <label for="gender" style="z-index: 1000">Jenis Kelamin</label>
                                                <select name="gender[]" class="form-control borderi gender select2">
                                                    <option value="">-- Pilih Jenis Kelamin --</option>
                                                    <option value="Laki-Laki" {{ 'Laki-Laki' == $keluarga->gender ? 'selected="selected"' : '' }}>Laki-Laki</option>
                                                    <option value="Perempuan" {{ 'Perempuan' == $keluarga->gender ? 'selected="selected"' : '' }}>Perempuan</option>
                                                </select>
                                            </div>
                                            <div class="col-4 mb-4">
                                                <label for="nation">Bangsa</label>
                                                <input type="text" class="form-control borderi nation" name="nation[]"  value="{{ $keluarga->nation }}">
                                            </div>
                                            <div class="col-4 mb-4">
                                                <label for="religion" style="z-index: 1000">Agama</label>
                                                <select name="religion[]" class="form-control borderi religion select2">
                                                    <option value="">-- Pilih Agama --</option>
                                                    <option value="Islam" {{ 'Islam' == $keluarga->religion ? 'selected="selected"' : '' }}>Islam</option>
                                                    <option value="Kristen Protestan" {{ 'Kristen Protestan' == $keluarga->religion ? 'selected="selected"' : '' }}>Kristen Protestan</option>
                                                    <option value="Kristen Katolik" {{ 'Kristen Katolik' == $keluarga->religion ? 'selected="selected"' : '' }}>Kristen Katolik</option>
                                                    <option value="Hindu" {{ 'Hindu' == $keluarga->religion ? 'selected="selected"' : '' }}>Hindu</option>
                                                    <option value="Buddha" {{ 'Buddha' == $keluarga->religion ? 'selected="selected"' : '' }}>Buddha</option>
                                                    <option value="Khonghucu" {{ 'Khonghucu' == $keluarga->religion ? 'selected="selected"' : '' }}>Khonghucu</option>
                                                    <option value="Lainnya" {{ 'Lainnya' == $keluarga->religion ? 'selected="selected"' : '' }}>Lainnya</option>
                                                </select>
                                            </div>
                                            <div class="col-4 mb-4">
                                                <label for="ktp_number">Nomor KTP</label>
                                                <input type="text" class="form-control borderi ktp_number" name="ktp_number[]"  value="{{ $keluarga->ktp_number }}">
                                            </div>
                                            <div class="col-4 mb-4">
                                                <label for="married_status" style="z-index: 1000">Status Perkawinan</label>
                                                <select name="married_status[]" class="form-control borderi married_status select2">
                                                    <option value="">-- Pilih Pilih Status Perkawinan --</option>
                                                    <option value="Belum Kawin" {{ 'Belum Kawin' == $keluarga->married_status ? 'selected="selected"' : '' }}>Belum Kawin</option>
                                                    <option value="Kawin" {{ 'Kawin' == $keluarga->married_status ? 'selected="selected"' : '' }}>Kawin</option>
                                                    <option value="Cerai Hidup" {{ 'Cerai Hidup' == $keluarga->married_status ? 'selected="selected"' : '' }}>Cerai Hidup</option>
                                                    <option value="Cerai Mati" {{ 'Cerai Mati' == $keluarga->married_status ? 'selected="selected"' : '' }}>Cerai Mati</option>
                                                </select>
                                            </div>
                                            <div class="col-4 mb-4">
                                                <label for="job">Pekerjaan</label>
                                                <input type="text" class="form-control borderi job" name="job[]"  value="{{ $keluarga->job }}">
                                            </div>
                                            <div class="col-4 mb-4">
                                                <a class="btn btn-sm btn-danger delete" style="margin-top: 35px"><i class="fa fa-trash"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="keluargaItem">
                                    <br>
                                    <hr>
                                    <h1 class="text-center title">Anggota Keluarga 1</h1>
                                    <br>
                                    <div class="row">
                                        <div class="col-4 mb-4">
                                            <label for="nama_keluarga">Nama Keluarga</label>
                                            <input type="text" class="form-control borderi nama_keluarga" name="nama_keluarga[]">
                                        </div>
                                        <div class="col-4 mb-4">
                                            <label for="status_keluarga">Status Keluarga</label>
                                            <select class="form-control borderi select2 status_keluarga" name="status_keluarga[]">
                                                <option value="">-- Pilih --</option>
                                                @foreach(['Kepala Keluarga', 'Suami', 'Istri', 'Anak', 'Menantu', 'Cucu', 'Orang Tua', 'Mertua', 'Famili Lain', 'Pembantu', 'Lainnya'] as $status_keluarga)
                                                    <option value="{{ $status_keluarga }}">{{ $status_keluarga }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-4 mb-4">
                                            <label for="born_place">Tempat Lahir</label>
                                            <input type="text" class="form-control borderi born_place" name="born_place[]">
                                        </div>
                                        <div class="col-4 mb-4">
                                            <label for="born_date">Tanggal Lahir</label>
                                            <input type="text" class="form-control date borderi born_date" name="born_date[]">
                                        </div>
                                        <div class="col-4 mb-4">
                                            <label for="gender" style="z-index: 1000">Jenis Kelamin</label>
                                            <select name="gender[]" class="form-control borderi gender select2">
                                                <option value="">-- Pilih Jenis Kelamin --</option>
                                                <option value="Laki-Laki">Laki-Laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select>
                                        </div>
                                        <div class="col-4 mb-4">
                                            <label for="nation">Bangsa</label>
                                            <input type="text" class="form-control borderi nation" name="nation[]">
                                        </div>
                                        <div class="col-4 mb-4">
                                            <label for="religion" style="z-index: 1000">Agama</label>
                                            <select name="religion[]" class="form-control borderi religion select2">
                                                <option value="">-- Pilih Agama --</option>
                                                <option value="Islam">Islam</option>
                                                <option value="Kristen Protestan">Kristen Protestan</option>
                                                <option value="Kristen Katolik">Kristen Katolik</option>
                                                <option value="Hindu">Hindu</option>
                                                <option value="Buddha">Buddha</option>
                                                <option value="Khonghucu">Khonghucu</option>
                                                <option value="Lainnya">Lainnya</option>
                                            </select>
                                        </div>
                                        <div class="col-4 mb-4">
                                            <label for="ktp_number">Nomor KTP</label>
                                            <input type="text" class="form-control borderi ktp_number" name="ktp_number[]">
                                        </div>
                                        <div class="col-4 mb-4">
                                            <label for="married_status" style="z-index: 1000">Status Perkawinan</label>
                                            <select name="married_status[]" class="form-control borderi married_status select2">
                                                <option value="">-- Pilih Status Perkawinan --</option>
                                                <option value="Belum Kawin">Belum Kawin</option>
                                                <option value="Kawin">Kawin</option>
                                                <option value="Cerai Hidup">Cerai Hidup</option>
                                                <option value="Cerai Mati">Cerai Mati</option>
                                            </select>
                                        </div>
                                        <div class="col-4 mb-4">
                                            <label for="job">Pekerjaan</label>
                                            <input type="text" class="form-control borderi job" name="job[]">
                                        </div>
                                        <div class="col-4 mb-4">
                                            <a class="btn btn-sm btn-danger delete" style="margin-top: 35px"><i class="fa fa-trash"></i></a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endif
                    </div>
                    <br>
                    <hr>
                    <br>
                    <button class="btn btn-success addKeluarga float-right">+ Tambah</button>
                    <br>
                    <br>
                    <br>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
            </div>
        </div>
    </div>

    @push('script')
        <script>
            flatpickr(".date");

            $('.select2').select2();

            $('body').on('keyup', '#no_hp', function (event) {
                var val = $(this).val();
                if(isNaN(val)){
                    val = val.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');
                }
                $(this).val(val);
            });

            $('body').on('keyup', '.ktp_number', function (event) {
                var val = $(this).val();
                if(isNaN(val)){
                    val = val.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');
                }
                $(this).val(val);
            });

            $('.addKeluarga').click(function(e) {
                $("select.select2-hidden-accessible").select2('destroy');
                e.preventDefault();
                let keluargaCount = $('#keluargaContainer .keluargaItem').length + 1;
                let newKeluarga = `
                    <div class="keluargaItem">
                        <br>
                        <hr>
                        <h1 class="text-center title">Anggota Keluarga ${keluargaCount}</h1>
                        <br>
                        <div class="row">
                            <div class="col-4 mb-4">
                                <label for="nama_keluarga">Nama Keluarga</label>
                                <input type="text" class="form-control borderi nama_keluarga" name="nama_keluarga[]">
                            </div>
                            <div class="col-4 mb-4">
                                <label for="status_keluarga">Status Keluarga</label>
                                <select class="form-control borderi select2 status_keluarga" name="status_keluarga[]">
                                    <option value="">-- Pilih --</option>
                                    @foreach(['Kepala Keluarga', 'Suami', 'Istri', 'Anak', 'Menantu', 'Cucu', 'Orang Tua', 'Mertua', 'Famili Lain', 'Pembantu', 'Lainnya'] as $status_keluarga)
                                        <option value="{{ $status_keluarga }}">{{ $status_keluarga }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-4 mb-4">
                                <label for="born_place">Tempat Lahir</label>
                                <input type="text" class="form-control borderi born_place" name="born_place[]">
                            </div>
                            <div class="col-4 mb-4">
                                <label for="born_date">Tanggal Lahir</label>
                                <input type="text" class="form-control date borderi born_date" name="born_date[]">
                            </div>
                            <div class="col-4 mb-4">
                                <label for="gender" style="z-index: 1000">Jenis Kelamin</label>
                                <select name="gender[]" class="form-control borderi gender select2">
                                    <option value="">-- Pilih Jenis Kelamin --</option>
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="col-4 mb-4">
                                <label for="nation">Bangsa</label>
                                <input type="text" class="form-control borderi nation" name="nation[]">
                            </div>
                            <div class="col-4 mb-4">
                                <label for="religion" style="z-index: 1000">Agama</label>
                                <select name="religion[]" class="form-control borderi religion select2">
                                    <option value="">-- Pilih Agama --</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Kristen Protestan">Kristen Protestan</option>
                                    <option value="Kristen Katolik">Kristen Katolik</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Buddha">Buddha</option>
                                    <option value="Khonghucu">Khonghucu</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>
                            <div class="col-4 mb-4">
                                <label for="ktp_number">Nomor KTP</label>
                                <input type="text" class="form-control borderi ktp_number" name="ktp_number[]">
                            </div>
                            <div class="col-4 mb-4">
                                <label for="married_status" style="z-index: 1000">Status Perkawinan</label>
                                <select name="married_status[]" class="form-control borderi married_status select2">
                                    <option value="">-- Pilih Status Perkawinan --</option>
                                    <option value="Belum Kawin">Belum Kawin</option>
                                    <option value="Kawin">Kawin</option>
                                    <option value="Cerai Hidup">Cerai Hidup</option>
                                    <option value="Cerai Mati">Cerai Mati</option>
                                </select>
                            </div>
                            <div class="col-4 mb-4">
                                <label for="job">Pekerjaan</label>
                                <input type="text" class="form-control borderi job" name="job[]">
                            </div>
                            <div class="col-4 mb-4">
                                <a class="btn btn-sm btn-danger delete" style="margin-top: 35px"><i class="fa fa-trash"></i></a>
                            </div>
                        </div>
                    </div>
                `;

                $('#keluargaContainer').append(newKeluarga);
                flatpickr(".date");
                $('.select2').select2();
            });

            $('#keluargaContainer').on('click', '.delete', function(e) {
                e.preventDefault();
                let keluargaCount = $('#keluargaContainer .keluargaItem').length + 1;

                if (keluargaCount == 2) {
                    alert('Cannot Delete First Row');
                } else {
                    if (confirm('Are you sure to delete this data')) {
                        const keluargaItem = $(this).closest('.keluargaItem');
                        keluargaItem.remove();
                        $('#keluargaContainer .keluargaItem').each(function(index) {
                            $(this).find('.title').text('Anggota Keluarga ' + (index + 1));
                        });
                    }
                }
            });
        </script>
    @endpush
@endsection
