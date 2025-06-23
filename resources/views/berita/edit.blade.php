@extends('layouts.dashboard')
@section('button')
    <li class="nav-item mr-2">
        <a href="{{ url('/berita') }}" class="btn nav-link" style="color: red; border:1px solid red; background-color:white; ">Back</a>
    </li>
@endsection
@section('isi')
    <div class="container-fluid">
        <div class="card col-lg-12">
            <div class="mt-4 p-4">
                <form method="post" action="{{ url('/berita/update/'.$berita->id) }}" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="form-row">
                        <div class="col">
                            <label for="judul">judul</label>
                            <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" value="{{ old('judul', $berita->judul) }}" autofocus>
                            @error('judul')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <br>
                    <div class="form-row">
                        <div class="col">
                            <label for="isi">Isi Berita</label>
                            <textarea name="isi" id="isi" class="form-control @error('isi') is-invalid @enderror" cols="30" rows="5"> {{ old('isi', $berita->isi) }}</textarea>
                            @error('isi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <br>
                    <div class="form-row">
                        <div class="col">
                            <label for="berita_file_path" class="form-label">Gambar / Poster</label>
                            <input class="form-control @error('berita_file_path') is-invalid @enderror" type="file" id="berita_file_path" name="berita_file_path">
                            @error('berita_file_path')
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
@endsection
