@extends('layouts.app')
@section('back')
    <a href="{{ url('/my-kritik-saran') }}" class="back-btn"> <i class="icon-left"></i> </a>
@endsection
@section('container')
    <form class="tf-form" action="{{ url('/my-kritik-saran/store') }}" enctype="multipart/form-data" method="POST">
        <div id="app-wrap" class="mt-4">
            <div class="bill-content">
                <div class="tf-container ms-4 me-4">
                    <div class="card-secton transfer-section mt-2">
                        <div class="tf-container">
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
                                <textarea name="kritik_saran" id="kritik_saran" class="@error('kritik_saran') is-invalid @enderror" cols="30" rows="10">{{ old('kritik_saran') }}</textarea>
                                @error('kritik_saran')
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
@endsection
