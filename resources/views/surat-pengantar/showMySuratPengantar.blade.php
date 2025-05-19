@extends('layouts.app')
@section('back')
    @if (auth()->user())
        <a href="{{ url('/my-surat-pengantar') }}" class="back-btn"> <i class="icon-left"></i> </a>
    @endif
@endsection
@section('container')
    <div id="app-wrap" class="mt-4">
        <div class="bill-content">
            <div class="tf-container ms-4 me-4">
                <ul>
                    <li class="list-card-invoice tf-topbar d-flex justify-content-between align-items-center">
                        <div class="content-right">
                            <p>
                                Nomor Surat Pengantar
                            </p>
                            <h5>
                                {{ $surat_pengantar->surat_pengantar_number ?? '-' }}
                            </h5>
                        </div>
                    </li>

                    <li class="list-card-invoice tf-topbar d-flex justify-content-between align-items-center">
                        <div class="content-right">
                            <p>
                                Jenis Surat Pengantar
                            </p>
                            <h5>
                                {{ $surat_pengantar->letter_type ?? '-' }} {{ $surat_pengantar->letter_type_text ? ': ' . $surat_pengantar->letter_type_text : '' }}
                            </h5>
                        </div>
                    </li>

                    <li class="list-card-invoice tf-topbar d-flex justify-content-between align-items-center">
                        <div class="content-right">
                            <p>
                                Tanggal
                            </p>
                            <h5>
                                @php
                                    if ($surat_pengantar->date) {
                                        Carbon\Carbon::setLocale('id');
                                        $date = Carbon\Carbon::createFromFormat('Y-m-d', $surat_pengantar->date);
                                        $new_date = $date->translatedFormat('l, d F Y');
                                    } else {
                                        $new_date = '-';
                                    }
                                @endphp
                                {{ $new_date  }}
                            </h5>
                        </div>
                    </li>

                    <li class="list-card-invoice tf-topbar d-flex justify-content-between align-items-center">
                        <div class="content-right">
                            <p>
                                Tempat Lahir
                            </p>
                            <h5>
                                {{ $surat_pengantar->born_place ?? '-' }}
                            </h5>
                        </div>
                    </li>

                    <li class="list-card-invoice tf-topbar d-flex justify-content-between align-items-center">
                        <div class="content-right">
                            <p>
                                Tanggal Lahir
                            </p>
                            <h5>
                                @php
                                    if ($surat_pengantar->born_date) {
                                        Carbon\Carbon::setLocale('id');
                                        $born_date = Carbon\Carbon::createFromFormat('Y-m-d', $surat_pengantar->born_date);
                                        $new_born_date = $born_date->translatedFormat('l, d F Y');
                                    } else {
                                        $new_born_date = '-';
                                    }
                                @endphp
                                {{ $new_born_date }}
                            </h5>
                        </div>
                    </li>

                    <li class="list-card-invoice tf-topbar d-flex justify-content-between align-items-center">
                        <div class="content-right">
                            <p>
                                Bangsa
                            </p>
                            <h5>
                                {{ $surat_pengantar->nation ?? '-' }}
                            </h5>
                        </div>
                    </li>

                    <li class="list-card-invoice tf-topbar d-flex justify-content-between align-items-center">
                        <div class="content-right">
                            <p>
                                Agama
                            </p>
                            <h5>
                                {{ $surat_pengantar->religion ?? '-' }}
                            </h5>
                        </div>
                    </li>

                    <li class="list-card-invoice tf-topbar d-flex justify-content-between align-items-center">
                        <div class="content-right">
                            <p>
                                Nomor KTP
                            </p>
                            <h5>
                                {{ $surat_pengantar->ktp_number ?? '-' }}
                            </h5>
                        </div>
                    </li>

                    <li class="list-card-invoice tf-topbar d-flex justify-content-between align-items-center">
                        <div class="content-right">
                            <p>
                                Status Perkawinan
                            </p>
                            <h5>
                                {{ $surat_pengantar->married_status ?? '-' }}
                            </h5>
                        </div>
                    </li>

                    <li class="list-card-invoice tf-topbar d-flex justify-content-between align-items-center">
                        <div class="content-right">
                            <p>
                                Pekerjaan
                            </p>
                            <h5>
                                {{ $surat_pengantar->job ?? '-' }}
                            </h5>
                        </div>
                    </li>

                    <li class="list-card-invoice tf-topbar d-flex justify-content-between align-items-center">
                        <div class="content-right">
                            <p>
                                Alamat
                            </p>
                            <h5>
                                {{ $surat_pengantar->alamat ?? '-' }}
                            </h5>
                        </div>
                    </li>

                </ul>
            </div>
        </div>
    </div>

    <div class="bottom-navigation-bar st2 bottom-btn-fixed" style="bottom:65px">
        <div class="tf-container">
            <div class="row">
                <div class="col-6 mb-4">
                    <a class="tf-btn success large" href="{{ url('/my-surat-pengantar/edit/'.$surat_pengantar->id) }}">Edit</a>
                </div>
                <div class="col-6 mb-4">
                    <a id="btn-logout" href="#" class="tf-btn danger large">Delete</a>
                </div>
                <div class="col-12">
                    <a class="tf-btn accent large" href="{{ url('/my-surat-pengantar/print/'.$surat_pengantar->id) }}">Print</a>
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
                    <a class="clear-panel critical_color" href="{{ url('/my-surat-pengantar/delete/'.$surat_pengantar->id) }}">Delete</a>
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
