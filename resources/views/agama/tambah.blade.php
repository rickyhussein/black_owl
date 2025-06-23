@extends('layouts.dashboard')
@section('button')
    <li class="nav-item mr-2">
        <a href="{{ url('/agama') }}" class="btn nav-link" style="color: red; border:1px solid red; background-color:white; ">Back</a>
    </li>
@endsection
@section('isi')
    <div class="container-fluid">
        <div class="card col-lg-12">
            <div class="mt-4 p-4">
                <form method="post" action="{{ url('/agama/store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="col">
                            <label for="type">Tipe</label>
                            <select name="type" id="type" class="form-control @error('type') is-invalid @enderror selectpicker" data-live-search="true">
                                <option value="">-- Pilih Tipe --</option>
                                <option value="Jadwal Tetap" {{ 'Jadwal Tetap' == old('type') ? 'selected="selected"' : '' }}>Jadwal Tetap</option>
                                <option value="Event" {{ 'Event' == old('type') ? 'selected="selected"' : '' }}>Event</option>
                            </select>
                            @error('type')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <br>

                    <div id="dayForm">
                        <div class="form-row">
                            <div class="col">
                                <label for="day">Hari</label>
                                <select name="day" id="day" class="form-control @error('day') is-invalid @enderror selectpicker" data-live-search="true">
                                    <option value="">-- Pilih Hari --</option>
                                    <option value="Senin" {{ 'Senin' == old('day') ? 'selected="selected"' : '' }}>Senin</option>
                                    <option value="Selasa" {{ 'Selasa' == old('day') ? 'selected="selected"' : '' }}>Selasa</option>
                                    <option value="Rabu" {{ 'Rabu' == old('day') ? 'selected="selected"' : '' }}>Rabu</option>
                                    <option value="Kamis" {{ 'Kamis' == old('day') ? 'selected="selected"' : '' }}>Kamis</option>
                                    <option value="Jumat" {{ 'Jumat' == old('day') ? 'selected="selected"' : '' }}>Jumat</option>
                                    <option value="Sabtu" {{ 'Sabtu' == old('day') ? 'selected="selected"' : '' }}>Sabtu</option>
                                    <option value="Minggu" {{ 'Minggu' == old('day') ? 'selected="selected"' : '' }}>Minggu</option>
                                </select>
                                @error('day')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <br>
                    </div>

                    <div id="dateForm">
                        <div class="form-row">
                            <div class="col">
                                <label for="date">Tanggal</label>
                                <input type="datetime" class="form-control @error('date') is-invalid @enderror" id="date" name="date" value="{{ old('date') }}">
                                @error('date')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <br>
                    </div>

                    <div class="form-row">
                        <div class="col">
                            <label for="title">Judul</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}">
                            @error('title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <br>

                    <div class="form-row">
                        <div class="col">
                            <label for="note">Keterangan</label>
                            <textarea name="note" id="note" class="form-control @error('note') is-invalid @enderror" cols="30" rows="5"> {{ old('note') }}</textarea>
                            @error('note')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <br>

                    <div class="form-row">
                        <div class="col">
                            <label for="contact_person">Contact Person</label>
                            <input type="text" class="form-control @error('contact_person') is-invalid @enderror" id="contact_person" name="contact_person" value="{{ old('contact_person') }}">
                            @error('contact_person')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <br>

                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
            </div>
        </div>
    </div>

    @push('script')
        <script>
            $('#type').change(function() {
                var type = $(this).val();
                if (type === 'Jadwal Tetap') {
                    $('#dayForm').show();
                    $('#dateForm').hide();
                    $('#date').val(null);
                } else if (type === 'Event') {
                    $('#dayForm').hide();
                    $('#day').val(null).change();
                    $('#dateForm').show();
                } else {
                    $('#dayForm').hide();
                    $('#dateForm').hide();
                    $('#date').val(null);
                    $('#day').val(null).change();
                }
            });

            $('#type').trigger('change');
        </script>
    @endpush
@endsection
