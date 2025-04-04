@extends('layouts.app')
@section('back')
    @if (auth()->user())
        <a href="{{ url('/my-ipkl') }}" class="back-btn"> <i class="icon-left"></i> </a>
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
                                    <div class="badge" style="color: rgba(20, 78, 7, 0.889); background-color:rgb(186, 238, 162); border-radius:10px;">{{ $ipkl->status ?? '-' }}</div>
                                @else
                                    <div class="badge" style="color: rgba(78, 26, 26, 0.889); background-color:rgb(242, 170, 170); border-radius:10px;">{{ $ipkl->status ?? '-' }}</div>
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
                                {{ $ipkl->notes ?? '-' }}
                            </h5>
                        </div>
                    </li>

                    <br>
                    <br>
                    <br>
                    <br>
                    @if ($ipkl->status == 'unpaid')
                        <button  id="pay-button" class="tf-btn accent large">Bayar Sekarang</button>
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

    @push('style')
        <script type="text/javascript" src="{{ config('midtrans.snap_url') }}" data-client-key="{{ config('midtrans.client_key') }}"></script>
    @endpush

    @push('script')
        <script type="text/javascript">
            var payButton = document.getElementById('pay-button');
            payButton.addEventListener('click', function () {
            // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
                window.snap.pay('{{ $ipkl->snaptoken }}', {
                    onSuccess: function(result){
                    /* You may add your own implementation here */
                    alert("payment success!"); console.log(result);
                    location.reload();
                    },
                    onPending: function(result){
                    /* You may add your own implementation here */
                    alert("wating your payment!"); console.log(result);
                    location.reload();
                    },
                    onError: function(result){
                    /* You may add your own implementation here */
                    alert("payment failed!"); console.log(result);
                    location.reload();
                    },
                    onClose: function(){
                    /* You may add your own implementation here */
                    alert('you closed the popup without finishing the payment');
                    location.reload();
                    }
                })
            });
        </script>
    @endpush
@endsection
