@extends('layouts.app')
@section('back')
    <a href="{{ url('/dashboard-user') }}" class="back-btn"> <i class="icon-left"></i> </a>
@endsection
@section('container')
    <div id="app-wrap" class="style1">
        <div class="tf-container">
            <form action="{{ url('/my-berita') }}" class="mt-4">
                <div class="row">
                    <div class="col-10">
                        <input type="text" name="search" placeholder="Search.." id="search" value="{{ request('search') }}">
                    </div>
                    <div class="col-2">
                        <button type="submit" class="btn"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </form>

            @if (count($beritas) <= 0)
                <div class="d-flex justify-content-center align-items-center vh-100">
                    <div class="bill-content text-center">
                        <div class="tf-container">
                            <p class="m-0">Data not available</p>
                        </div>
                    </div>
                </div>
            @else
                <div class="tf-tab">
                    <div class="content-tab pt-tab-space mb-5">
                        <div class="tab-gift-item">
                            @foreach ($beritas as $berita)
                                <div class="food-box">
                                    <div class="img-box">
                                        <a href="{{ url('/my-berita/show/'.$berita->id) }}"><img src="{{ url('/storage/'.$berita->berita_file_path) }}" class="img-fluid w-100" style="height: 200px; object-fit: cover;"></a>
                                    </div>
                                    <div class="content">
                                        <h4><a href="{{ url('/my-berita/show/'.$berita->id) }}">{{ $berita->judul }}</a></h4>
                                        <div class="rating mt-2">
                                            {{ Str::limit($berita->isi, 100, '.......') }}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="d-flex justify-content-end me-4 mt-4">
                            {{ $beritas->links() }}
                        </div>
                    </div>
                </div>
            @endif
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
