@extends('layouts.app')
@section('back')
    <a href="{{ url('/dashboard-user') }}" class="back-btn"> <i class="icon-left"></i> </a>
@endsection
@section('container')
    <div id="app-wrap">
        <div class="bill-content">
            <div class="tf-container">
                <form action="{{ url('/my-surat-izin-renovasi') }}" class="mt-4">
                    <div class="row">
                        <div class="col-5">
                            <input type="datetime" name="start_date" placeholder="Start Date" id="start_date" value="{{ request('start_date') }}">
                        </div>
                        <div class="col-5">
                            <input type="datetime" name="end_date" placeholder="End Date" id="end_date" value="{{ request('end_date') }}">
                        </div>
                        <div class="col-2">
                            <button type="submit" class="btn"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </form>

                <div class="content-tab pt-tab-space mb-5">
                    <div id="tab-gift-item-1 app-wrap" class="app-wrap">
                        <div class="bill-content">
                            <div class="tf-container">
                                <ul class="mb-5">
                                    @if (count($surat_izin_renovasis) > 0)
                                        @foreach ($surat_izin_renovasis as $surat_izin_renovasi)
                                            <li class="list-card-invoice tf-topbar d-flex justify-content-between align-items-center">
                                                <div class="content-right">
                                                    <h4>
                                                        <a href="{{ url('/my-surat-izin-renovasi/show/'.$surat_izin_renovasi->id) }}">
                                                            {{ $surat_izin_renovasi->type ?? '-' }} {{ $surat_izin_renovasi->type_text ? ': ' . $surat_izin_renovasi->type_text : '' }}
                                                        </a>
                                                        <a style="font-size: 10px" href="{{ url('/my-surat-izin-renovasi/show/'.$surat_izin_renovasi->id) }}">
                                                            {{ $surat_izin_renovasi->user->alamat ?? '-' }}
                                                            <span class="badge" style="color: rgb(21, 47, 118); background-color:rgba(192, 218, 254, 0.889); border-radius:10px;"><i class="fa fa-eye"></i></span>
                                                        </a>
                                                        <a style="font-size: 10px" href="{{ url('/my-surat-izin-renovasi/show/'.$surat_izin_renovasi->id) }}">
                                                            @php
                                                                if ($surat_izin_renovasi->start_date) {
                                                                    Carbon\Carbon::setLocale('id');
                                                                    $start_date = Carbon\Carbon::createFromFormat('Y-m-d', $surat_izin_renovasi->start_date);
                                                                    $new_start_date = $start_date->translatedFormat('d F Y');
                                                                } else {
                                                                    $new_start_date = '-';
                                                                }

                                                                if ($surat_izin_renovasi->end_date) {
                                                                    Carbon\Carbon::setLocale('id');
                                                                    $end_date = Carbon\Carbon::createFromFormat('Y-m-d', $surat_izin_renovasi->end_date);
                                                                    $new_end_date = $end_date->translatedFormat('d F Y');
                                                                } else {
                                                                    $new_end_date = '-';
                                                                }
                                                            @endphp
                                                            <span>{{ $new_start_date }} s/d {{ $new_end_date }}</span>
                                                        </a>
                                                    </h4>

                                                </div>
                                            </li>
                                        @endforeach
                                        {{ $surat_izin_renovasis->links() }}
                                    @else
                                        <center>
                                        <hr> No Data Available <hr>
                                        </center>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="bottom-navigation-bar st2 bottom-btn-fixed" style="bottom:65px">
        <div class="tf-container">
            <a href="{{ url('/my-surat-izin-renovasi/tambah') }}" class="tf-btn accent large"> + Tambah</a>
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

    @push('script')
        <script>
            $('#start_date').change(function(){
                var start_date = $(this).val();
                $('#end_date').val(start_date);
            });
        </script>
    @endpush
@endsection
