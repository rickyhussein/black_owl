@extends('layouts.app')
@section('back')
    @if (auth()->user())
        <a href="{{ url('/my-donasi') }}" class="back-btn"> <i class="icon-left"></i> </a>
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
                                {{ $donasi->user->name ?? '-' }}
                            </h5>
                        </div>
                    </li>

                    <li class="list-card-invoice tf-topbar d-flex justify-content-between align-items-center">
                        <div class="content-right">
                            <p>
                                Alamat
                            </p>
                            <h5>
                                {{ $donasi->user->alamat ?? '-' }}
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
                                    if ($donasi->date) {
                                        Carbon\Carbon::setLocale('id');
                                        $date = Carbon\Carbon::createFromFormat('Y-m-d', $donasi->date);
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
                                Jenis Donasi
                            </p>
                            <h5>
                                {{ $donasi->type ?? '-' }}
                            </h5>
                        </div>
                    </li>

                    <li class="list-card-invoice tf-topbar d-flex justify-content-between align-items-center">
                        <div class="content-right">
                            <p>
                                Nominal
                            </p>
                            <h5>
                                Rp {{ number_format($donasi->nominal) }}
                            </h5>
                        </div>
                    </li>

                    <li class="list-card-invoice tf-topbar d-flex justify-content-between align-items-center">
                        <div class="content-right">
                            <p>
                                Status
                            </p>
                            <h5>
                                @if ($donasi->status == 'paid')
                                    <div class="badge" style="color: rgba(20, 78, 7, 0.889); background-color:rgb(186, 238, 162); border-radius:10px;">{{ $donasi->status ?? '-' }}</div>
                                @else
                                    <div class="badge" style="color: rgba(78, 26, 26, 0.889); background-color:rgb(242, 170, 170); border-radius:10px;">{{ $donasi->status ?? '-' }}</div>
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
                                {!! $donasi->notes ? nl2br(e($donasi->notes)) : '-' !!}
                            </h5>
                        </div>
                    </li>

                    @if ($donasi->payment_source == 'Bank Transfer (Perlu Konfirmasi Pembayaran Manual)')
                        <li class="list-card-invoice tf-topbar d-flex justify-content-between align-items-center">
                            <div class="content-right">
                                <p>
                                    Status Approval
                                </p>
                                <h5>
                                    @if ($donasi->status_approval == 'approved')
                                        <div class="badge" style="color: rgba(20, 78, 7, 0.889); background-color:rgb(186, 238, 162); border-radius:10px; text-transform: uppercase;">{{ $donasi->status_approval ?? '-' }}</div>
                                    @elseif ($donasi->status_approval == 'rejected')
                                        <div class="badge" style="color: rgba(78, 26, 26, 0.889); background-color:rgb(242, 170, 170); border-radius:10px; text-transform: uppercase;">{{ $donasi->status_approval ?? '-' }}</div>
                                    @else
                                        <div class="badge" style="color: rgba(255, 123, 0, 0.889); background-color:rgb(255, 238, 177); border-radius:10px; text-transform: uppercase;">{{ $donasi->status_approval ?? '-' }}</div>
                                    @endif
                                </h5>
                            </div>
                        </li>

                        <li class="list-card-invoice tf-topbar d-flex justify-content-between align-items-center">
                            <div class="content-right">
                                <p>
                                    User Approval
                                </p>
                                <h5>
                                    {{ $donasi->approvedBy->name ?? '-' }}
                                </h5>
                            </div>
                        </li>

                        <li class="list-card-invoice tf-topbar d-flex justify-content-between align-items-center">
                            <div class="content-right">
                                <p>
                                    Catatan Pengurus
                                </p>
                                <h5>
                                    {!! $donasi->approver_notes ? nl2br(e($donasi->approver_notes)) : '-' !!}
                                </h5>
                            </div>
                        </li>
                    @endif


                </ul>
            </div>
        </div>
    </div>

    @if ($donasi->status == 'unpaid' && $donasi->payment_source == 'midtrans')
        <div class="bottom-navigation-bar st2 bottom-btn-fixed" style="bottom:80px">
            <div class="tf-container">
                <button  id="pay-button" class="tf-btn accent large">Bayar Sekarang</button>
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

    @push('style')
        <script type="text/javascript" src="{{ config('midtrans.snap_url') }}" data-client-key="{{ config('midtrans.client_key') }}"></script>
    @endpush

    @push('script')
        <script type="text/javascript">
            var payButton = document.getElementById('pay-button');
            payButton.addEventListener('click', function () {
                window.snap.pay('{{ $donasi->snaptoken }}', {
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
@endsection
