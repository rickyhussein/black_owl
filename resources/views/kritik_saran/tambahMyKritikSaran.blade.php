@extends('layouts.app')
@section('back')
    <a href="{{ url('/my-kritik-saran') }}" class="back-btn"> <i class="icon-left"></i> </a>
@endsection
@section('container')
    <div id="app-wrap" class="mt-4">
        <div class="bill-content">
            <div class="tf-container ms-4 me-4">
                <div class="card-secton transfer-section mt-2">
                    <div class="tf-container">
                        <form class="tf-form" action="{{ url('/my-kritik-saran/store') }}" enctype="multipart/form-data" method="POST">
                            @csrf

                            <div class="group-input">
                                <label for="judul">Judul</label>
                                <input type="text" class="@error('judul') is-invalid @enderror" id="judul" name="judul" value="{{ old('judul') }}">
                                @error('judul')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="group-input">
                                <label for="kritik_saran">Kritik & Saran</label>
                                <textarea name="kritik_saran" id="kritik_saran" class="@error('keterangan') is-invalid @enderror" cols="30" rows="10">{{ old('kritik_saran') }}</textarea>
                                @error('keterangan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="group-input">
                                <input class="form-control @error('kritik_saran_file_path') is-invalid @enderror" type="file" id="kritik_saran_file_path" name="kritik_saran_file_path">
                                @error('kritik_saran_file_path')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <button type="submit" class="tf-btn accent large">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
@endsection
