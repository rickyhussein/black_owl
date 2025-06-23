@extends('layouts.app')
@section('back')
    @if (auth()->user())
        <a href="{{ url('/my-berita') }}" class="back-btn"> <i class="icon-left"></i> </a>
    @endif
@endsection
@section('container')
    <div id="app-wrap">
        <div class="bill-content">
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ url('/storage/'.$berita->berita_file_path) }}" class="d-block w-100" alt="...">
                    </div>
                </div>
            </div>

            <div class="tf-container mt-4">
                <div class="voucher-info">
                    <h2 class="fw_6">{{ $berita->judul ?? '-' }}</h2>
                </div>
            </div>

            <div class="app-section mt-1 bg_white_color giftcard-detail-section-2">
                <div class="tf-container">
                    <div class="voucher-desc">
                        <p class="mt-1">{!! $berita->isi ? nl2br(e($berita->isi)) : '-' !!}</p>
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
