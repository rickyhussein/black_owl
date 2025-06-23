@extends('layouts.app')
@section('back')
    @if (auth()->user())
        <a href="{{ url('/my-umkm') }}" class="back-btn"> <i class="icon-left"></i> </a>
    @endif
@endsection
@section('container')
    <div id="app-wrap">
        <div class="bill-content">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
                <div class="carousel-indicators">
                    @php
                        $i = 0;
                    @endphp
                    @foreach ($umkm->items as $key => $item)
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $key }}" class="{{ $loop->first ? 'active' : '' }}" aria-current="{{ $loop->first ? 'true' : '' }}" aria-label="Slide {{ $key + 1 }}"></button>
                        @php
                            $i += 1;
                        @endphp
                    @endforeach

                    @if ($umkm->video_file_path)
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $i }}" aria-label="Slide {{ $i + 1 }}"></button>
                    @endif
                </div>
                <div class="carousel-inner">
                    @foreach ($umkm->items as $item)
                        <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                            <img src="{{ url('/storage/'.$item->umkm_file_path) }}" class="carousel-media" alt="...">
                        </div>
                    @endforeach
                    @if ($umkm->video_file_path)
                        <div class="carousel-item">
                            <video class="carousel-media" controls muted autoplay>
                                <source src="{{ url('/storage/' . $umkm->video_file_path) }}" type="video/mp4">
                            </video>
                        </div>
                    @endif
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>

            <div class="app-section bg_white_color giftcard-detail-section-1">
                <div class="tf-container">
                    <div class="voucher-info">
                        <h2 class="fw_6">{{ $umkm->name ?? '-' }}</h2>
                        <a href="#" class="critical_color fw_6">Rp {{ number_format($umkm->price) }}</a>
                    </div>
                    <div class="d-flex justify-content-between align-items-center top mt-2">
                        <h4 class="fw_6">Telah dilihat</h4>
                        <h4 class="fw_6">{{ $umkm->click }} x</h4>
                    </div>
                    <hr style="color: rgb(180, 180, 180)">
                    <div class="voucher-desc">
                        <h4 class="fw_6">Deskripsi</h4>
                        <p class="mt-1">{!! $umkm->description ? nl2br(e($umkm->description)) : '-' !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bottom-navigation-bar st2 bottom-btn-fixed" style="bottom:65px">
        <div class="tf-container">
            <div class="row">
                <div class="col">
                    <a class="tf-btn success large" href="{{ url('/my-umkm/edit/'.$umkm->id) }}">Edit</a>
                </div>
                <div class="col">
                    <a id="btn-logout" href="#" class="tf-btn danger large">Delete</a>
                </div>
            </div>
        </div>
    </div>

    <div class="tf-panel logout">
        <div class="panel_overlay"></div>
        <div class="panel-box panel-center panel-logout">
                <div class="heading">
                    <h2 class="text-center">Anda yakin ingin menghapus data ini?</h2>
                </div>
                <div class="bottom">
                    <a class="clear-panel" href="#">Cancel</a>
                    <a class="clear-panel critical_color" href="{{ url('/my-umkm/delete/'.$umkm->id) }}">Delete</a>
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
