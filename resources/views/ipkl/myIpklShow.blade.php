@extends('layouts.app')
@section('back')
    @if (auth()->user())
        <a href="{{ url('/my-ipkl') }}" class="back-btn"> <i class="icon-left"></i> </a>
    @endif
@endsection
@section('container')

    @if ($ipkl)
        <div id="app-wrap" class="mt-4">
            <div class="bill-content">
                <div class="tf-container ms-4 me-4">
                    @if ($ipkl_unpaid && $ipkl_unpaid->id != $ipkl->id && $ipkl->date > $ipkl_unpaid->date)
                        @php
                            $ipkl_unpaid_month = Carbon\Carbon::createFromFormat('m', $ipkl_unpaid->month)->translatedFormat('F');
                        @endphp
                        <div class="alert alert-warning" role="alert">
                            Harap untuk melakukan pembayaran <span class="me-1" style="font-weight: bold;">IPKL {{ $ipkl_unpaid_month }} {{ $ipkl_unpaid->year }}</span> terlebih dahulu. </a>
                        </div>
                    @endif

                    <ul class="mt-4">
                        <li class="list-card-invoice tf-topbar d-flex justify-content-between align-items-center">
                            <div class="content-right">
                                <p>
                                    Nama
                                </p>
                                <h5>
                                    {{ $ipkl->user->name ?? '-' }}
                                </h5>
                            </div>
                        </li>

                        <li class="list-card-invoice tf-topbar d-flex justify-content-between align-items-center">
                            <div class="content-right">
                                <p>
                                    Alamat
                                </p>
                                <h5>
                                    {{ $ipkl->user->alamat ?? '-' }}
                                </h5>
                            </div>
                        </li>

                        <li class="list-card-invoice tf-topbar d-flex justify-content-between align-items-center">
                            <div class="content-right">
                                <p>
                                    Status Rumah
                                </p>
                                <h5>
                                    {{ $ipkl->user->status ?? '-' }}
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
                                        if ($ipkl->date) {
                                            Carbon\Carbon::setLocale('id');
                                            $date = Carbon\Carbon::createFromFormat('Y-m-d', $ipkl->date);
                                            $new_date = $date->translatedFormat('d F Y');
                                            $expired_date = $date->addDays($ipkl->expired)->translatedFormat('d F Y');
                                        } else {
                                            $new_date = '-';
                                            $expired_date = '-';
                                        }
                                    @endphp
                                    {{ $new_date  }}
                                </h5>
                            </div>
                        </li>

                        <li class="list-card-invoice tf-topbar d-flex justify-content-between align-items-center">
                            <div class="content-right">
                                <p>
                                    Jatuh Tempo
                                </p>
                                <h5 style="color: red">
                                    {{ $expired_date }}
                                </h5>
                            </div>
                        </li>

                        <li class="list-card-invoice tf-topbar d-flex justify-content-between align-items-center">
                            <div class="content-right">
                                <p>
                                    Jenis Transaksi
                                </p>
                                <h5>
                                    @php
                                        $month = Carbon\Carbon::createFromFormat('m', $ipkl->month)->translatedFormat('F');
                                    @endphp
                                    {{ $ipkl->type ?? '-' }} ({{ $month }} {{ $ipkl->year }})
                                </h5>
                            </div>
                        </li>

                        <li class="list-card-invoice tf-topbar d-flex justify-content-between align-items-center">
                            <div class="content-right">
                                <p>
                                    Nominal
                                </p>
                                <h5>
                                    Rp {{ number_format($ipkl->nominal) }}
                                </h5>
                            </div>
                        </li>

                        <li class="list-card-invoice tf-topbar d-flex justify-content-between align-items-center">
                            <div class="content-right">
                                <p>
                                    Status
                                </p>
                                <h5>
                                    @if ($ipkl->status == 'paid')
                                        <div class="badge" style="color: rgba(20, 78, 7, 0.889); background-color:rgb(186, 238, 162); border-radius:10px; text-transform: uppercase;">{{ $ipkl->status ?? '-' }}</div>
                                    @else
                                        <div class="badge" style="color: rgba(78, 26, 26, 0.889); background-color:rgb(242, 170, 170); border-radius:10px; text-transform: uppercase;">{{ $ipkl->status ?? '-' }}</div>
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
                                    {!! $ipkl->notes ? nl2br(e($ipkl->notes)) : '-' !!}
                                </h5>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        @if ($ipkl_unpaid)
            @if ($ipkl_unpaid->id == $ipkl->id)
                <div class="bottom-navigation-bar st2 bottom-btn-fixed" style="bottom:65px">
                    <div class="tf-container">
                        <button  id="pay-button" class="tf-btn accent large">Bayar Sekarang</button>
                    </div>
                </div>
            @else
                @if ($ipkl->date > $ipkl_unpaid->date)
                    @php
                        $ipkl_unpaid_month = Carbon\Carbon::createFromFormat('m', $ipkl_unpaid->month)->translatedFormat('F');
                    @endphp
                    <div class="bottom-navigation-bar st2 bottom-btn-fixed" style="bottom:65px">
                        <div class="tf-container">
                            <a href="{{ url('/my-ipkl/show/'.$ipkl_unpaid->id) }}" class="tf-btn accent large">Link IPKL {{ $ipkl_unpaid_month }} {{ $ipkl_unpaid->year }}</a>
                        </div>
                    </div>
                @endif
            @endif
        @endif

        @else
        <div id="app-wrap" class="d-flex justify-content-center align-items-center vh-100">
            <div class="bill-content text-center">
                <div class="tf-container">
                    <p class="m-0">Data Not Found</p>
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

    @if ($ipkl)
        @push('style')
            <script type="text/javascript" src="{{ config('midtrans.snap_url') }}" data-client-key="{{ config('midtrans.client_key') }}"></script>
        @endpush

        @push('script')
            <script type="text/javascript">
                var payButton = document.getElementById('pay-button');
                payButton.addEventListener('click', function () {
                    window.snap.pay('{{ $ipkl->snaptoken }}', {
                        onSuccess: function(result){
                            Swal.fire('Payment Success!', '', 'success');
                            setTimeout(() => location.reload(), 3000);
                        },
                        onPending: function(result){
                            Swal.fire({
                                title: "Pending",
                                text: "Waiting For Your Payment",
                                icon: "info"
                            });
                            setTimeout(() => location.reload(), 3000);
                        },
                        onError: function(result){
                            Swal.fire({
                                title: "Failed",
                                text: "Payment Failed",
                                icon: "error"
                            });
                            setTimeout(() => location.reload(), 3000);
                        },
                        onClose: function(){
                            Swal.fire({
                                title: "Closed",
                                text: "You closed The Popup Without Finishing The Payment",
                                icon: "warning"
                            });
                            setTimeout(() => location.reload(), 3000);
                        }
                    })
                });
            </script>
        @endpush
    @endif
@endsection
