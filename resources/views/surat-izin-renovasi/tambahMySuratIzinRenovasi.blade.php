@extends('layouts.app')
@section('back')
    <a href="{{ url('/my-surat-izin-renovasi') }}" class="back-btn"> <i class="icon-left"></i> </a>
@endsection
@section('container')
    <form class="tf-form" action="{{ url('/my-surat-izin-renovasi/store') }}" enctype="multipart/form-data" method="POST">
        <div id="app-wrap" class="mt-4">
            <div class="bill-content">
                <div class="tf-container ms-4 me-4">
                    <div class="card-secton transfer-section mt-2">
                        <div class="tf-container">
                            @csrf

                            <div class="group-input">
                                <label for="date">Tanggal</label>
                                <input type="text" class="@error('date') is-invalid @enderror" id="date" name="date" value="{{ old('date', date('Y-m-d')) }}" readonly>
                                @error('date')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="group-input">
                                <label for="name">Nama Lengkap</label>
                                <input type="text" class="@error('name') is-invalid @enderror borderi name" name="name" id="name"  value="{{ old('name', auth()->user()->name) }}" readonly>
                                @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="group-input">
                                <label for="alamat">Alamat</label>
                                <input type="text" class="@error('alamat') is-invalid @enderror borderi alamat" name="alamat" id="alamat"  value="{{ old('alamat', auth()->user()->alamat) }}" readonly>
                                @error('alamat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="group-input">
                                <label for="rt">RT</label>
                                <input type="text" class="@error('rt') is-invalid @enderror borderi rt" name="rt" id="rt"  value="{{ old('rt', auth()->user()->rt) }}" readonly>
                                @error('rt')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="group-input">
                                <label for="rw">RW</label>
                                <input type="text" class="@error('rw') is-invalid @enderror borderi rw" name="rw" id="rw"  value="{{ old('rw', auth()->user()->rw) }}" readonly>
                                @error('rw')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="group-input">
                                <label for="no_hp">Nomor HP</label>
                                <input type="text" class="@error('no_hp') is-invalid @enderror borderi no_hp" name="no_hp" id="no_hp"  value="{{ old('no_hp', auth()->user()->no_hp) }}" readonly>
                                @error('no_hp')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="group-input">
                                <label for="email">Email</label>
                                <input type="text" class="@error('email') is-invalid @enderror borderi email" name="email" id="email"  value="{{ old('email', auth()->user()->email) }}" readonly>
                                @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="card mb-4" style="border-radius: 10px; border: 1px solid #acacac;">
                                <div class="card-body">
                                    <label>Jenis Renovasi</label>
                                    <div class="form-check">
                                        <input class="form-check-input type @error('type') is-invalid @enderror" type="radio" id="radio1" name="type" value="Pembangunan Kamar Tambahan" {{ old('type') == 'Pembangunan Kamar Tambahan' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="radio1">
                                            Pembangunan Kamar Tambahan
                                        </label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input type @error('type') is-invalid @enderror" type="radio" id="radio2" name="type" value="Perubahan Fasad" {{ old('type') == 'Perubahan Fasad' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="radio2">
                                            Perubahan Fasad
                                        </label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input type @error('type') is-invalid @enderror" type="radio" id="radio3" name="type" value="Perbaikan Atap" {{ old('type') == 'Perbaikan Atap' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="radio3">
                                            Perbaikan Atap
                                        </label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input type @error('type') is-invalid @enderror" type="radio" id="radio4" name="type" value="Renovasi Kamar Mandi" {{ old('type') == 'Renovasi Kamar Mandi' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="radio4">
                                            Renovasi Kamar Mandi
                                        </label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input type @error('type') is-invalid @enderror" type="radio" id="radio5" name="type" value="Renovasi Dapur" {{ old('type') == 'Renovasi Dapur' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="radio5">
                                            Renovasi Dapur
                                        </label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input type @error('type') is-invalid @enderror" type="radio" id="radio6" name="type" value="Perbaikan atau Penggantian Lantai" {{ old('type') == 'Perbaikan atau Penggantian Lantai' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="radio6">
                                            Perbaikan atau Penggantian Lantai
                                        </label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input type @error('type') is-invalid @enderror" type="radio" id="radio7" name="type" value="Pengecatan Ulang Dinding Dalam & Luar" {{ old('type') == 'Pengecatan Ulang Dinding Dalam & Luar' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="radio7">
                                            Pengecatan Ulang Dinding Dalam & Luar
                                        </label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input type @error('type') is-invalid @enderror" type="radio" id="radio8" name="type" value="Perbaikan atau Penggantian Plafon" {{ old('type') == 'Perbaikan atau Penggantian Plafon' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="radio8">
                                            Perbaikan atau Penggantian Plafon
                                        </label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input type @error('type') is-invalid @enderror" type="radio" id="radio9" name="type" value="Pembenahan Instalasi Listrik dan Air" {{ old('type') == 'Pembenahan Instalasi Listrik dan Air' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="radio9">
                                            Pembenahan Instalasi Listrik dan Air
                                        </label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input type @error('type') is-invalid @enderror" type="radio" id="radio10" name="type" value="Pemasangan atau Penggantian Pagar dan Gerbang" {{ old('type') == 'Pemasangan atau Penggantian Pagar dan Gerbang' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="radio10">
                                            Pemasangan atau Penggantian Pagar dan Gerbang
                                        </label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input type @error('type') is-invalid @enderror" type="radio" id="radio11" name="type" value="Penambahan atau Perubahan Ruang Terbuka" {{ old('type') == 'Penambahan atau Perubahan Ruang Terbuka' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="radio11">
                                            Penambahan atau Perubahan Ruang Terbuka
                                        </label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input type @error('type') is-invalid @enderror" type="radio" id="radio12" name="type" value="Pemasangan Kanopi atau Carport" {{ old('type') == 'Pemasangan Kanopi atau Carport' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="radio12">
                                            Pemasangan Kanopi atau Carport
                                        </label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input type @error('type') is-invalid @enderror" type="radio" id="radio13" name="type" value="Peninggian atau Perluasan Bangunan" {{ old('type') == 'Peninggian atau Perluasan Bangunan' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="radio13">
                                            Peninggian atau Perluasan Bangunan
                                        </label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input type @error('type') is-invalid @enderror" type="radio" id="radio14" name="type" value="Peninggian atau Perluasan Bangunan" {{ old('type') == 'Peninggian atau Perluasan Bangunan' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="radio14">
                                            Peninggian atau Perluasan Bangunan
                                        </label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input type @error('type') is-invalid @enderror" type="radio" id="radio15" name="type" value="Perbaikan Struktur Bangunan" {{ old('type') == 'Perbaikan Struktur Bangunan' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="radio15">
                                            Perbaikan Struktur Bangunan
                                        </label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input type @error('type') is-invalid @enderror" type="radio" id="radio16" name="type" value="Renovasi Interior" {{ old('type') == 'Renovasi Interior' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="radio16">
                                            Renovasi Interior
                                        </label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input type @error('type') is-invalid @enderror" type="radio" id="radio17" name="type" value="Lainnya" {{ old('type') == 'Lainnya' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="radio17">
                                            Lainnya
                                        </label>
                                        <div class="textContainer">
                                            <input type="text" class="@error('type_text') is-invalid @enderror borderi type_text" name="type_text" id="type_text" value="{{ old('type_text') }}">
                                            @error('type_text')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        @error('type')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="group-input">
                                <label for="size" style="z-index: 1000">Luas Area</label>
                                <div class="input-group">
                                    <input type="text" class="number form-control @error('size') is-invalid @enderror borderi size" name="size" id="size"  value="{{ old('size') }}">
                                    <span class="input-group-text">m²</span>
                                    @error('size')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="group-input">
                                <label for="start_date">Tanggal Mulai</label>
                                <input type="text" class="date @error('start_date') is-invalid @enderror" id="start_date" name="start_date" value="{{ old('start_date') }}">
                                @error('start_date')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="group-input">
                                <label for="end_date">Tanggal Selesai</label>
                                <input type="text" class="date @error('end_date') is-invalid @enderror" id="end_date" name="end_date" value="{{ old('end_date') }}">
                                @error('end_date')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="group-input">
                                <label for="contractor">Kontraktor / Pelaksana</label>
                                <input type="text" class="@error('contractor') is-invalid @enderror" id="contractor" name="contractor" value="{{ old('contractor') }}">
                                @error('contractor')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="group-input">
                                <label for="company_name">Nama Perusahaan</label>
                                <input type="text" class="@error('company_name') is-invalid @enderror" id="company_name" name="company_name" value="{{ old('company_name') }}">
                                @error('company_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="group-input">
                                <label for="company_phone">Nomor Telepon Perusahaan</label>
                                <input type="text" class="number @error('company_phone') is-invalid @enderror" id="company_phone" name="company_phone" value="{{ old('company_phone') }}">
                                @error('company_phone')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="card mb-4" style="border-radius: 10px; border: 1px solid #acacac;">
                                <div class="card-body">
                                    <label>Dokumen Pendukung</label>
                                    <div class="form-check">
                                        <input class="form-check-input @error('fotokopi_ktp_pemohon') is-invalid @enderror" type="checkbox" id="fotokopi_ktp_pemohon" name="fotokopi_ktp_pemohon" value="{{ old('fotokopi_ktp_pemohon') }}">
                                        <label class="form-check-label" for="fotokopi_ktp_pemohon">
                                            Fotokopi KTP Pemohon
                                        </label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input @error('gambar_design_renovasi') is-invalid @enderror" type="checkbox" id="gambar_design_renovasi" name="gambar_design_renovasi" value="{{ old('gambar_design_renovasi') }}">
                                        <label class="form-check-label" for="gambar_design_renovasi">
                                            Gambar Design Renovasi
                                        </label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input @error('surat_persetujuan_tetangga_terdekat') is-invalid @enderror" type="checkbox" id="surat_persetujuan_tetangga_terdekat" name="surat_persetujuan_tetangga_terdekat" value="{{ old('surat_persetujuan_tetangga_terdekat') }}">
                                        <label class="form-check-label" for="surat_persetujuan_tetangga_terdekat">
                                            Surat Persetujuan Tetangga Terdekat
                                        </label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input @error('dokumen_lainnya') is-invalid @enderror" type="checkbox" id="dokumen_lainnya" name="dokumen_lainnya" value="{{ old('dokumen_lainnya') }}">
                                        <label class="form-check-label" for="dokumen_lainnya">
                                            Dokumen Lainnya
                                        </label>
                                        <div class="dokumenTextContainer">
                                            <input type="text" class="@error('dokumen_text') is-invalid @enderror borderi dokumen_text" name="dokumen_text" id="dokumen_text" value="{{ old('dokumen_text') }}">
                                            @error('dokumen_text')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        @error('type')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
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
            flatpickr(".date");
            $('.select2').select2();

            $('body').on('keyup', '.number', function (event) {
                var val = $(this).val();
                if(isNaN(val)){
                    val = val.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');
                }
                $(this).val(val);
            });

            let type = $(".type:checked").val();
            if (type == 'Lainnya') {
                $('.textContainer').show();
            } else {
                $('.textContainer').hide();
            }

            $('body').on('change', ".type", function (event) {
                let type = $(".type:checked").val();
                if (type == 'Lainnya') {
                    $('.textContainer').show();
                } else {
                    $('.textContainer').hide();
                    $('.type_text').val(null);
                }
            });

            $('input[type="checkbox"]').each(function() {
                var isChecked = $(this).val() == 1;
                $(this).prop('checked', isChecked);
            });

            $('body').on('change', 'input[type="checkbox"]', function (event) {
                if(this.checked) {
                    $(this).val(1);
                } else {
                    $(this).val(null);
                }
            });

            if ($('#dokumen_lainnya').is(':checked')) {
                $('.dokumenTextContainer').show();
            } else {
                $('.dokumenTextContainer').hide();
            }

            $('#dokumen_lainnya').change(function () {
                if ($('#dokumen_lainnya').is(':checked')) {
                    $('.dokumenTextContainer').show();
                } else {
                    $('.dokumenTextContainer').hide();
                    $('#dokumen_text').val(null);
                }
            });
        </script>
    @endpush
@endsection
