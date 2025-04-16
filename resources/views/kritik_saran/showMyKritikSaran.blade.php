@extends('layouts.app')
@section('back')
    @if (auth()->user())
        <a href="{{ url('/my-kritik-saran') }}" class="back-btn"> <i class="icon-left"></i> </a>
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
                                Nama
                            </p>
                            <h5>
                                {{ $kritik_saran->user->name ?? '-' }}
                            </h5>
                        </div>
                    </li>

                    <li class="list-card-invoice tf-topbar d-flex justify-content-between align-items-center">
                        <div class="content-right">
                            <p>
                                Alamat
                            </p>
                            <h5>
                                {{ $kritik_saran->user->alamat ?? '-' }}
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
                                    if ($kritik_saran->date) {
                                        Carbon\Carbon::setLocale('id');
                                        $date = Carbon\Carbon::createFromFormat('Y-m-d', $kritik_saran->date);
                                        $new_date = $date->translatedFormat('d F Y');
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
                                Judul
                            </p>
                            <h5>
                                {{ $kritik_saran->judul ?? '-' }}
                            </h5>
                        </div>
                    </li>

                    <li class="list-card-invoice tf-topbar d-flex justify-content-between align-items-center">
                        <div class="content-right">
                            <p>
                                Kritik & Saran
                            </p>
                            <h5>
                                {!! $kritik_saran->kritik_saran ? nl2br(e($kritik_saran->kritik_saran)) : '-' !!}
                            </h5>
                        </div>
                    </li>

                    <li class="list-card-invoice tf-topbar d-flex justify-content-between align-items-center">
                        <div class="content-right">
                            <p>
                                File
                            </p>
                            <h5>
                                @if ($kritik_saran->kritik_saran_file_path)
                                    <div class="badge clickable" data-url="{{ url('/storage/'.$kritik_saran->kritik_saran_file_path) }}" style="color: rgb(21, 47, 118); background-color:rgba(192, 218, 254, 0.889); border-radius:10px; cursor: pointer;" target="_blank"><i class="fa fa-download me-1"></i> {{ $kritik_saran->kritik_saran_file_name }}</div>
                                @else
                                    -
                                @endif
                            </h5>
                        </div>
                    </li>

                    <li class="list-card-invoice tf-topbar d-flex justify-content-between align-items-center">
                        <div class="content-right">
                            <p>
                                Status
                            </p>
                            <h5>
                                @if ($kritik_saran->status == 'approved')
                                    <div class="badge" style="color: rgba(20, 78, 7, 0.889); background-color:rgb(186, 238, 162); border-radius:10px; text-transform: uppercase;">{{ $kritik_saran->status ?? '-' }}</div>
                                @elseif ($kritik_saran->status == 'rejected')
                                    <div class="badge" style="color: rgba(78, 26, 26, 0.889); background-color:rgb(242, 170, 170); border-radius:10px; text-transform: uppercase;">{{ $kritik_saran->status ?? '-' }}</div>
                                @else
                                    <div class="badge" style="color: rgba(255, 123, 0, 0.889); background-color:rgb(255, 238, 177); border-radius:10px; text-transform: uppercase;">{{ $kritik_saran->status ?? '-' }}</div>
                                @endif
                            </h5>
                        </div>
                    </li>


                    <li class="list-card-invoice tf-topbar d-flex justify-content-between align-items-center">
                        <div class="content-right">
                            <p>
                                Catatan Pengurus
                            </p>
                            <h5>
                                {!! $kritik_saran->catatan_pengurus ? nl2br(e($kritik_saran->catatan_pengurus)) : '-' !!}
                            </h5>
                        </div>
                    </li>


                </ul>
            </div>
        </div>
    </div>

    @if ($kritik_saran->status == 'draft' && $kritik_saran->user_id == auth()->user()->id)
        <div class="bottom-navigation-bar st2 bottom-btn-fixed" style="bottom:70px">
            <div class="tf-container">
                <div class="row">
                    <div class="col">
                        <a class="tf-btn accent large" href="{{ url('/my-kritik-saran/edit/'.$kritik_saran->id) }}">Edit</a>
                    </div>
                    <div class="col">
                        <a href="{{ url('/my-kritik-saran/delete/'.$kritik_saran->id) }}" onclick="return confirm('Anda yakin ingin menghapus data ini?')" class="tf-btn accent large" style="background-color: red">Delete</a>
                    </div>
                </div>
            </div>
        </div>
    @endif


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
            $(function () {
                $(".clickable").on("click", function() {
                    window.location.href = $(this).data("url");
                });
            });
        </script>
    @endpush
@endsection
