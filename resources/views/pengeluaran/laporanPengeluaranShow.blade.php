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
                                Keterangan
                            </p>
                            <h5>
                                {!! $pengeluaran->notes ? nl2br(e($pengeluaran->notes)) : '-' !!}
                            </h5>
                        </div>
                    </li>

                    <li class="list-card-invoice tf-topbar d-flex justify-content-between align-items-center">
                        <div class="content-right">
                            <p>
                                File
                            </p>
                            <h5>
                                @if ($pengeluaran->file_transaction_path)
                                    <div class="badge clickable" data-url="{{ url('/storage/'.$pengeluaran->file_transaction_path) }}" style="color: rgb(21, 47, 118); background-color:rgba(192, 218, 254, 0.889); border-radius:10px; cursor: pointer;" target="_blank"><i class="fa fa-download me-1"></i> {{ $pengeluaran->file_transaction_name }}</div>
                                @else
                                    -
                                @endif
                            </h5>
                        </div>
                    </li>
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
