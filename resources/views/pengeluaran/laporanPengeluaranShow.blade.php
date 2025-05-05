@extends('layouts.app')
@section('back')
    @if (auth()->user())
        <a href="{{ url('/laporan-pengeluaran') }}" class="back-btn"> <i class="icon-left"></i> </a>
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
                                Jenis Transaksi
                            </p>
                            <h5>
                                {{ $pengeluaran->type ?? '-' }}
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
                                    if ($pengeluaran->date) {
                                        Carbon\Carbon::setLocale('id');
                                        $date = Carbon\Carbon::createFromFormat('Y-m-d', $pengeluaran->date);
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
                                Nominal
                            </p>
                            <h5>
                                Rp {{ number_format($pengeluaran->nominal) }}
                            </h5>
                        </div>
                    </li>

                    <li class="list-card-invoice tf-topbar d-flex justify-content-between align-items-center">
                        <div class="content-right">
                            <p>
                                Status
                            </p>
                            <h5>
                                @if ($pengeluaran->status == 'paid')
                                    <div class="badge" style="color: rgba(20, 78, 7, 0.889); background-color:rgb(186, 238, 162); border-radius:10px; text-transform: uppercase;">{{ $pengeluaran->status ?? '-' }}</div>
                                @else
                                    <div class="badge" style="color: rgba(78, 26, 26, 0.889); background-color:rgb(242, 170, 170); border-radius:10px; text-transform: uppercase;">{{ $pengeluaran->status ?? '-' }}</div>
                                @endif
                            </h5>
                        </div>
                    </li>


                    <li class="list-card-invoice tf-topbar d-flex justify-content-between align-items-center">
                        <div class="content-right">
                            <p>
                                Keterangan
                            </p>
                            <h5>
                                {!! $pengeluaran->notes ? nl2br(e($pengeluaran->notes)) : '-' !!}
                            </h5>
                        </div>
                    </li>

                    @if (count($pengeluaran->pengeluaranfile))
                        @foreach ($pengeluaran->pengeluaranfile as $key => $file)
                            <li class="list-card-invoice tf-topbar d-flex justify-content-between align-items-center">
                                <div class="content-right">
                                    <p>
                                        File {{ $key + 1 }}
                                    </p>
                                    <h5>
                                        @if ($file->pengeluaran_file_path)
                                            <div class="badge clickable" data-url="{{ url('/storage/'.$file->pengeluaran_file_path) }}" style="color: rgb(21, 47, 118); background-color:rgba(192, 218, 254, 0.889); border-radius:10px; cursor: pointer;" target="_blank"><i class="fa fa-download me-1"></i> {{ $file->pengeluaran_file_name }}</div>
                                        @else
                                            -
                                        @endif
                                    </h5>
                                </div>
                            </li>
                        @endforeach
                    @else
                        <li class="list-card-invoice tf-topbar d-flex justify-content-between align-items-center">
                            <div class="content-right">
                                <p>
                                    File
                                </p>
                                <h5>
                                    -
                                </h5>
                            </div>
                        </li>
                    @endif
                </ul>
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
