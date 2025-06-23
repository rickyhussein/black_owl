@extends('layouts.app')
@section('back')
    <a href="{{ url('/dashboard-user') }}" class="back-btn"> <i class="icon-left"></i> </a>
@endsection
@section('container')
    <div id="app-wrap" class="style1">
        <div class="tf-container">
            <form action="{{ url('/my-umkm') }}" class="mt-4">
                <div class="row">
                    <div class="col-10">
                        <input type="text" name="search" placeholder="Search.." id="search" value="{{ request('search') }}">
                    </div>
                    <div class="col-2">
                        <button type="submit" class="btn"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </form>

            @if (count($umkms) <= 0)
                <div class="d-flex justify-content-center align-items-center vh-100">
                    <div class="bill-content text-center">
                        <div class="tf-container">
                            <p class="m-0">Data not available</p>
                        </div>
                    </div>
                </div>
            @else


                <ul class="mt-4 mb-5">
                    @foreach ($umkms as $umkm)
                        <li class="list-card-invoice tf-topbar d-flex justify-content-between align-items-center">
                            <div class="user-info">
                                <a href="{{ url('/my-umkm/show/'.$umkm->id) }}"><img src="{{ url('/storage/'.$umkm->items->first()->umkm_file_path) }}"></a>
                            </div>

                            <div class="content-right">
                                <h4>
                                    <a href="{{ url('my-umkm/show/'.$umkm->id) }}">
                                        {{ $umkm->name ?? '-' }}
                                    </a>
                                    <a style="font-size: 10px" href="{{ url('my-umkm/show/'.$umkm->id) }}">
                                        <span>Harga : Rp {{ number_format($umkm->price) }}</span>
                                        <span class="badge" style="color: rgb(21, 47, 118); background-color:rgba(192, 218, 254, 0.889); border-radius:10px;"><i class="fa fa-eye"></i></span>
                                    </a>
                                    <a style="font-size: 10px" href="{{ url('my-umkm/show/'.$umkm->id) }}">
                                        <span>{{ $umkm->description ?? '-' }}</span>
                                    </a>
                                </h4>
                            </div>
                        </li>
                    @endforeach
                    <div class="d-flex justify-content-end me-4 mt-4">
                        {{ $umkms->links() }}
                    </div>
                </ul>

            @endif
        </div>
    </div>

    <div class="bottom-navigation-bar st2 bottom-btn-fixed" style="bottom:50px">
        <div class="tf-container">
            <a href="{{ url('/my-umkm/tambah') }}" class="tf-btn accent large"> + Tambah</a>
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
