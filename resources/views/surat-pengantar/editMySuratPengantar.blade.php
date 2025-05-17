@extends('layouts.app')
@section('back')
    <a href="{{ url('/my-surat-pengantar/show/'.$surat_pengantar->id) }}" class="back-btn"> <i class="icon-left"></i> </a>
@endsection
@section('container')
    <form class="tf-form" action="{{ url('/my-surat-pengantar/update/'.$surat_pengantar->id) }}" enctype="multipart/form-data" method="POST">
        <div id="app-wrap" class="mt-4">
            <div class="bill-content">
                <div class="tf-container ms-4 me-4">
                    <div class="card-secton transfer-section mt-2">
                        <div class="tf-container">
                            @method('PUT')
                            @csrf

                            <div class="group-input">
                                <label for="surat_pengantar_number">Nomor Surat Pengantar</label>
                                <input type="text" class="@error('surat_pengantar_number') is-invalid @enderror" id="surat_pengantar_number" name="surat_pengantar_number" value="{{ old('surat_pengantar_number', $surat_pengantar->surat_pengantar_number) }}" readonly>
                                @error('surat_pengantar_number')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="group-input">
                                <label for="date">Tanggal</label>
                                <input type="text" class="@error('date') is-invalid @enderror" id="date" name="date" value="{{ old('date', $surat_pengantar->date) }}" readonly>
                                @error('date')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="group-input">
                                <label for="keluarga_id" style="z-index: 1000">Nama</label>
                                <select style="width: 100%" name="keluarga_id" id="keluarga_id" class="@error('keluarga_id') is-invalid @enderror select2" data-live-search="true">
                                    <option value="">-- Pilih Nama --</option>
                                    @foreach ($keluargas as $keluarga)
                                        <option value="{{ $keluarga->id }}" {{ $keluarga->id == old('keluarga_id', $surat_pengantar->keluarga_id) ? 'selected="selected"' : '' }}>{{ $keluarga->nama_keluarga }} {{ $keluarga->status_keluarga ? '(' . $keluarga->status_keluarga . ')' : '' }}</option>
                                    @endforeach
                                </select>
                                @error('keluarga_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="group-input">
                                <label for="born_place">Tempat Lahir</label>
                                <input type="text" class="@error('born_place') is-invalid @enderror borderi born_place" name="born_place" id="born_place"  value="{{ old('born_place', $surat_pengantar->born_place) }}">
                                @error('born_place')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="group-input">
                                <label for="born_date">Tanggal Lahir</label>
                                <input type="text" class="@error('born_date') is-invalid @enderror date borderi born_date" name="born_date" id="born_date"  value="{{ old('born_date', $surat_pengantar->born_date) }}">
                                @error('born_date')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="group-input">
                                <label for="gender" style="z-index: 1000">Jenis Kelamin</label>
                                <select style="width: 100%" name="gender" id="gender" class="@error('gender') is-invalid @enderror select2" data-live-search="true">
                                    <option value="">-- Pilih Jenis Kelamin --</option>
                                    <option value="Laki-Laki" {{ 'Laki-Laki' == old('gender', $surat_pengantar->gender) ? 'selected="selected"' : '' }}>Laki-Laki</option>
                                    <option value="Perempuan" {{ 'Perempuan' == old('gender', $surat_pengantar->gender) ? 'selected="selected"' : '' }}>Perempuan</option>
                                </select>
                                @error('gender')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="group-input">
                                <label for="nation">Bangsa</label>
                                <input type="text" class="@error('nation') is-invalid @enderror borderi nation" name="nation" id="nation" value="{{ old('nation', $surat_pengantar->nation) }}">
                                @error('nation')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="group-input">
                                <label for="religion" style="z-index: 1000">Agama</label>
                                <select style="width: 100%" name="religion" id="religion" class="@error('religion') is-invalid @enderror borderi religion select2">
                                    <option value="">-- Pilih Agama --</option>
                                    <option value="Islam" {{ 'Islam' == old('religion', $surat_pengantar->religion) ? 'selected="selected"' : '' }}>Islam</option>
                                    <option value="Kristen Protestan" {{ 'Kristen Protestan' == old('religion', $surat_pengantar->religion) ? 'selected="selected"' : '' }}>Kristen Protestan</option>
                                    <option value="Kristen Katolik" {{ 'Kristen Katolik' == old('religion', $surat_pengantar->religion) ? 'selected="selected"' : '' }}>Kristen Katolik</option>
                                    <option value="Hindu" {{ 'Hindu' == old('religion', $surat_pengantar->religion) ? 'selected="selected"' : '' }}>Hindu</option>
                                    <option value="Buddha" {{ 'Buddha' == old('religion', $surat_pengantar->religion) ? 'selected="selected"' : '' }}>Buddha</option>
                                    <option value="Khonghucu" {{ 'Khonghucu' == old('religion', $surat_pengantar->religion) ? 'selected="selected"' : '' }}>Khonghucu</option>
                                    <option value="Lainnya" {{ 'Lainnya' == old('religion', $surat_pengantar->religion) ? 'selected="selected"' : '' }}>Lainnya</option>
                                </select>
                                @error('religion')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="group-input">
                                <label for="ktp_number">Nomor KTP</label>
                                <input type="text" class="@error('ktp_number') is-invalid @enderror borderi ktp_number" name="ktp_number" id="ktp_number" value="{{ old('ktp_number', $surat_pengantar->ktp_number) }}">
                                @error('ktp_number')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="group-input">
                                <label for="married_status" style="z-index: 1000">Status Perkawinan</label>
                                <select style="width: 100%" name="married_status" id="married_status" class="@error('married_status') is-invalid @enderror borderi married_status select2">
                                    <option value="">-- Pilih Pilih Status Perkawinan --</option>
                                    <option value="Belum Kawin" {{ 'Belum Kawin' == old('married_status', $surat_pengantar->married_status) ? 'selected="selected"' : '' }}>Belum Kawin</option>
                                    <option value="Kawin" {{ 'Kawin' == old('married_status', $surat_pengantar->married_status) ? 'selected="selected"' : '' }}>Kawin</option>
                                    <option value="Cerai Hidup" {{ 'Cerai Hidup' == old('married_status', $surat_pengantar->married_status) ? 'selected="selected"' : '' }}>Cerai Hidup</option>
                                    <option value="Cerai Mati" {{ 'Cerai Mati' == old('married_status', $surat_pengantar->married_status) ? 'selected="selected"' : '' }}>Cerai Mati</option>
                                </select>
                                @error('married_status')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="group-input">
                                <label for="job">Pekerjaan</label>
                                <input type="text" class="@error('job') is-invalid @enderror borderi job" name="job" id="job" value="{{ old('job', $surat_pengantar->job) }}">
                                @error('job')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="group-input">
                                <label for="alamat">Alamat</label>
                                <input type="text" class="@error('alamat') is-invalid @enderror" id="alamat" name="alamat" value="{{ old('alamat', $surat_pengantar->alamat) }}">
                                @error('alamat')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="card" style="border-radius: 10px; border: 1px solid #acacac;">
                                <div class="card-body">
                                    <label>Jenis Surat Pengantar</label>
                                    <div class="form-check">
                                        <input class="form-check-input letter_type @error('letter_type') is-invalid @enderror" type="radio" id="radio1" name="letter_type" value="Permohonan Kartu Keluarga (KK)" {{ old('letter_type', $surat_pengantar->letter_type) == 'Permohonan Kartu Keluarga (KK)' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="radio1">
                                            Permohonan Kartu Keluarga (KK)
                                        </label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input letter_type @error('letter_type') is-invalid @enderror" type="radio" id="radio2" name="letter_type" value="Permohonan Rekam / Cetak E-KTP" {{ old('letter_type', $surat_pengantar->letter_type) == 'Permohonan Rekam / Cetak E-KTP' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="radio2">
                                            Permohonan Rekam / Cetak E-KTP
                                        </label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input letter_type @error('letter_type') is-invalid @enderror" type="radio" id="radio3" name="letter_type" value="Permohonan Surat Keterangan Domisili" {{ old('letter_type', $surat_pengantar->letter_type) == 'Permohonan Surat Keterangan Domisili' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="radio3">
                                            Permohonan Surat Keterangan Domisili
                                        </label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input letter_type @error('letter_type') is-invalid @enderror" type="radio" id="radio4" name="letter_type" value="Permohonan Surat Keterangan Usaha" {{ old('letter_type', $surat_pengantar->letter_type) == 'Permohonan Surat Keterangan Usaha' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="radio4">
                                            Permohonan Surat Keterangan Usaha
                                        </label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input letter_type @error('letter_type') is-invalid @enderror" type="radio" id="radio5" name="letter_type" value="Permohonan Surat Keterangan Tidak Mampu (SKTM)" {{ old('letter_type', $surat_pengantar->letter_type) == 'Permohonan Surat Keterangan Tidak Mampu (SKTM)' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="radio5">
                                            Permohonan Surat Keterangan Tidak Mampu (SKTM)
                                        </label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input letter_type @error('letter_type') is-invalid @enderror" type="radio" id="radio6" name="letter_type" value="Permohonan Surat Pindah / Datang" {{ old('letter_type', $surat_pengantar->letter_type) == 'Permohonan Surat Pindah / Datang' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="radio6">
                                            Permohonan Surat Pindah / Datang
                                        </label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input letter_type @error('letter_type') is-invalid @enderror" type="radio" id="radio7" name="letter_type" value="Permohonan Surat Pengantar SKCK" {{ old('letter_type', $surat_pengantar->letter_type) == 'Permohonan Surat Pengantar SKCK' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="radio7">
                                            Permohonan Surat Pengantar SKCK
                                        </label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input letter_type @error('letter_type') is-invalid @enderror" type="radio" id="radio8" name="letter_type" value="Permohonan Mengurus Surat Nikah" {{ old('letter_type', $surat_pengantar->letter_type) == 'Permohonan Mengurus Surat Nikah' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="radio8">
                                            Permohonan Mengurus Surat Nikah
                                        </label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input letter_type @error('letter_type') is-invalid @enderror" type="radio" id="radio9" name="letter_type" value="Permohonan Surat Keterangan Lahir" {{ old('letter_type', $surat_pengantar->letter_type) == 'Permohonan Surat Keterangan Lahir' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="radio9">
                                            Permohonan Surat Keterangan Lahir
                                        </label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input letter_type @error('letter_type') is-invalid @enderror" type="radio" id="radio10" name="letter_type" value="Permohonan Surat Keterangan Kematian" {{ old('letter_type', $surat_pengantar->letter_type) == 'Permohonan Surat Keterangan Kematian' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="radio10">
                                            Permohonan Surat Keterangan Kematian
                                        </label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input letter_type @error('letter_type') is-invalid @enderror" type="radio" id="radio11" name="letter_type" value="Permohonan Surat Izin Keramaian" {{ old('letter_type', $surat_pengantar->letter_type) == 'Permohonan Surat Izin Keramaian' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="radio11">
                                            Permohonan Surat Izin Keramaian
                                        </label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input letter_type @error('letter_type') is-invalid @enderror" type="radio" id="radio12" name="letter_type" value="Lainnya" {{ old('letter_type', $surat_pengantar->letter_type) == 'Lainnya' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="radio12">
                                            Lainnya
                                        </label>
                                        <div class="textContainer">
                                            <input type="text" class="@error('letter_type_text') is-invalid @enderror borderi letter_type_text" name="letter_type_text" id="letter_type_text" value="{{ old('letter_type_text', $surat_pengantar->letter_type_text) }}">
                                            @error('letter_type_text')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        @error('letter_type')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <br>

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

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            let letter_type = $(".letter_type:checked").val();
            if (letter_type == 'Lainnya') {
                $('.textContainer').show();
            } else {
                $('.textContainer').hide();
            }

            $('body').on('change', ".letter_type", function (event) {
                let letter_type = $(".letter_type:checked").val();
                if (letter_type == 'Lainnya') {
                    $('.textContainer').show();
                } else {
                    $('.textContainer').hide();
                    $('.letter_type_text').val(null);
                }
            });

            $('body').on('keyup', '.ktp_number', function (event) {
                var val = $(this).val();
                if(isNaN(val)){
                    val = val.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');
                }
                $(this).val(val);
            });

            $('body').on('change', '#keluarga_id', function(event) {
                var keluarga_id = $(this).val();

                $.ajax({
                    type:'GET',
                    url:"{{ url('/my-surat-pengantar/getKeluarga') }}",
                    data:{keluarga_id:keluarga_id},
                    success:function(data){
                        $('#born_place').val(data.born_place);
                        $('#born_date').val(data.born_date);
                        $('#gender').val(data.gender).change();
                        $('#nation').val(data.nation);
                        $('#religion').val(data.religion).change();
                        $('#ktp_number').val(data.ktp_number);
                        $('#married_status').val(data.married_status).change();
                        $('#job').val(data.job);
                    }
                });
            });
        </script>
    @endpush
@endsection
