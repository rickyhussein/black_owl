@extends('layouts.app')
@section('back')
    @if (auth()->user())
        <a href="{{ url('/my-gate-card') }}" class="back-btn"> <i class="icon-left"></i> </a>
    @endif
@endsection
@section('container')
    @if ($gate_card)
        <div id="app-wrap" class="mt-4">
            <div class="bill-content">
                <div class="tf-container ms-4 me-4">
                    @if ($gate_card->payment_source == 'Bank Transfer (Perlu Konfirmasi Pembayaran Manual)' && $gate_card->status == 'unpaid')
                        <div class="alert alert-warning" role="alert">
                            Silahkan transfer ke rekening ini : <span class="me-1" style="font-weight: bold;">Bank Syariah Indonesia (BSI)</span> Nama Penerima : <span class="me-1" style="font-weight: bold;">Cluster Madrid Nutiara Gading City</span> No. Rekening : <a id="copy"><span style="font-weight: bold;">6868123336</span> <i class="fas fa-copy ms-1"></i></a>
                        </div>
                    @endif

                    <ul class="mt-4">
                        <li class="list-card-invoice tf-topbar d-flex justify-content-between align-items-center">
                            <div class="content-right">
                                <p>
                                    Nama
                                </p>
                                <h5>
                                    {{ $gate_card->user->name ?? '-' }}
                                </h5>
                            </div>
                        </li>

                        <li class="list-card-invoice tf-topbar d-flex justify-content-between align-items-center">
                            <div class="content-right">
                                <p>
                                    Alamat
                                </p>
                                <h5>
                                    {{ $gate_card->user->alamat ?? '-' }}
                                </h5>
                            </div>
                        </li>

                        <li class="list-card-invoice tf-topbar d-flex justify-content-between align-items-center">
                            <div class="content-right">
                                <p>
                                    Status Rumah
                                </p>
                                <h5>
                                    {{ $gate_card->user->status ?? '-' }}
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
                                        if ($gate_card->date) {
                                            Carbon\Carbon::setLocale('id');
                                            $date = Carbon\Carbon::createFromFormat('Y-m-d', $gate_card->date);
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
                                    Jenis Transaksi
                                </p>
                                <h5>
                                    {{ $gate_card->type ?? '-' }}
                                </h5>
                            </div>
                        </li>
                        <li class="list-card-invoice tf-topbar d-flex justify-content-between align-items-center">
                            <div class="content-right">
                                <p>
                                    Status Gate Card
                                </p>
                                <h5>
                                    {{ $gate_card->status_gate_card ?? '-' }}
                                </h5>
                            </div>
                        </li>

                        <li class="list-card-invoice tf-topbar d-flex justify-content-between align-items-center">
                            <div class="content-right">
                                <p>
                                    Jenis Pembayaran
                                </p>
                                <h5>
                                    {{ $gate_card->payment_source ?? '-' }}
                                </h5>
                            </div>
                        </li>


                        <li class="list-card-invoice tf-topbar d-flex justify-content-between align-items-center">
                            <div class="content-right">
                                <p>
                                    Nominal Pembayaran
                                </p>
                                <h5>
                                    Rp {{ number_format($gate_card->nominal) }}
                                </h5>
                            </div>
                        </li>

                        <li class="list-card-invoice tf-topbar d-flex justify-content-between align-items-center">
                            <div class="content-right">
                                <p>
                                    Jumlah Gate Card Yang Dipesan
                                </p>
                                <h5>
                                    {{ $gate_card->qty ?? '-' }}
                                </h5>
                            </div>
                        </li>

                        <li class="list-card-invoice tf-topbar d-flex justify-content-between align-items-center">
                            <div class="content-right">
                                <p>
                                    Status
                                </p>
                                <h5>
                                    @if ($gate_card->status == 'paid')
                                        <div class="badge" style="color: rgba(20, 78, 7, 0.889); background-color:rgb(186, 238, 162); border-radius:10px; text-transform: uppercase;">{{ $gate_card->status ?? '-' }}</div>
                                    @else
                                        <div class="badge" style="color: rgba(78, 26, 26, 0.889); background-color:rgb(242, 170, 170); border-radius:10px; text-transform: uppercase;">{{ $gate_card->status ?? '-' }}</div>
                                    @endif
                                </h5>
                            </div>
                        </li>

                        <li class="list-card-invoice tf-topbar d-flex justify-content-between align-items-center">
                            <div class="content-right">
                                <p>
                                    Nomor Polisi Kendaraan
                                </p>
                                <h5>
                                    {!! $gate_card->notes ? nl2br(e($gate_card->notes)) : '-' !!}
                                </h5>
                            </div>
                        </li>

                        @if ($gate_card->payment_source == 'Bank Transfer (Perlu Konfirmasi Pembayaran Manual)')
                            <li class="list-card-invoice tf-topbar d-flex justify-content-between align-items-center">
                                <div class="content-right">
                                    <p>
                                        Bukti Pembayaran
                                    </p>
                                    <h5>
                                        @if ($gate_card->file_transaction_path)
                                            <div class="badge clickable" data-url="{{ url('/storage/'.$gate_card->file_transaction_path) }}" style="color: rgb(21, 47, 118); background-color:rgba(192, 218, 254, 0.889); border-radius:10px; cursor: pointer;" target="_blank"><i class="fa fa-download me-1"></i> {{ $gate_card->file_transaction_name }}</div>
                                        @else
                                            -
                                        @endif
                                    </h5>
                                </div>
                            </li>
                            <li class="list-card-invoice tf-topbar d-flex justify-content-between align-items-center">
                                <div class="content-right">
                                    <p>
                                        Status Approval
                                    </p>
                                    <h5>
                                        @if ($gate_card->status_approval == 'approved')
                                            <div class="badge" style="color: rgba(20, 78, 7, 0.889); background-color:rgb(186, 238, 162); border-radius:10px; text-transform: uppercase;">{{ $gate_card->status_approval ?? '-' }}</div>
                                        @elseif ($gate_card->status_approval == 'rejected')
                                            <div class="badge" style="color: rgba(78, 26, 26, 0.889); background-color:rgb(242, 170, 170); border-radius:10px; text-transform: uppercase;">{{ $gate_card->status_approval ?? '-' }}</div>
                                        @else
                                            <div class="badge" style="color: rgba(255, 123, 0, 0.889); background-color:rgb(255, 238, 177); border-radius:10px; text-transform: uppercase;">{{ $gate_card->status_approval ?? '-' }}</div>
                                        @endif
                                    </h5>
                                </div>
                            </li>

                            @if ($gate_card->approved_by)
                                <li class="list-card-invoice tf-topbar d-flex justify-content-between align-items-center">
                                    <div class="content-right">
                                        <p>
                                            User Approval
                                        </p>
                                        <h5>
                                            {{ $gate_card->approvedBy->name ?? '-' }}
                                        </h5>
                                    </div>
                                </li>

                                <li class="list-card-invoice tf-topbar d-flex justify-content-between align-items-center">
                                    <div class="content-right">
                                        <p>
                                            Catatan Pengurus
                                        </p>
                                        <h5>
                                            {!! $gate_card->approver_notes ? nl2br(e($gate_card->approver_notes)) : '-' !!}
                                        </h5>
                                    </div>
                                </li>
                            @endif
                        @endif
                    </ul>
                </div>
            </div>
        </div>

        @if ($gate_card->status == 'unpaid')
            <div class="bottom-navigation-bar st2 bottom-btn-fixed" style="bottom:135px">
                <div class="tf-container">

                </div>
            </div>
        @endif

        @if ($gate_card->status == 'unpaid' && $gate_card->payment_source == 'midtrans')
            <div class="bottom-navigation-bar st2 bottom-btn-fixed" style="bottom:65px">
                <div class="tf-container">
                    <div class="row">
                        <div class="col-6 mb-4">
                            <a class="tf-btn success large" href="{{ url('/my-gate-card/edit/'.$gate_card->id) }}">Edit</a>
                        </div>
                        <div class="col-6 mb-4">
                            <a id="btn-logout" href="#" class="tf-btn danger large">Delete</a>
                        </div>
                        <div class="col-12">
                            <button  id="pay-button" class="tf-btn accent large">Bayar Sekarang</button>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if ($gate_card->status == 'unpaid' && $gate_card->payment_source == 'Bank Transfer (Perlu Konfirmasi Pembayaran Manual)')
            <div class="bottom-navigation-bar st2 bottom-btn-fixed" style="bottom:65px">
                <div class="tf-container">
                    <div class="row">
                        <div class="col-6 mb-4">
                            <a class="tf-btn success large" href="{{ url('/my-gate-card/edit/'.$gate_card->id) }}">Edit</a>
                        </div>
                        <div class="col-6 mb-4">
                            <a id="btn-logout" href="#" class="tf-btn danger large">Delete</a>
                        </div>
                        <div class="col-12">
                            <a href="#" id="btn-popup-down" class="tf-btn accent large">Upload Bukti Pembayaran</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tf-panel down">
                <div class="panel_overlay"></div>
                <div class="panel-box panel-down">
                    <div class="header">
                        <div class="tf-container">
                            <div class="tf-statusbar d-flex justify-content-center align-items-center">
                                <a href="#" class="clear-panel"> <i class="icon-close1"></i> </a>
                                <h3>Upload Bukti Pembayaran</h3>
                            </div>
                        </div>
                    </div>

                    <div class="mt-5">
                        <div class="tf-container">
                            <form class="tf-form-verify" action="{{ url('/my-gate-card/upload/'.$gate_card->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="group-input">
                                    <input type="file" class="form-control @error('file_transaction_path') is-invalid @enderror" name="file_transaction_path" value="{{ old('file_transaction_path') }}" />
                                    @error('file_transaction_path')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    @if ($gate_card->file_transaction_path)
                                        <div class="badge clickable mt-1" data-url="{{ url('/storage/'.$gate_card->file_transaction_path) }}" style="color: rgb(21, 47, 118); background-color:rgba(192, 218, 254, 0.889); border-radius:10px; cursor: pointer;" target="_blank"><i class="fa fa-download me-1"></i> {{ $gate_card->file_transaction_name }}</div>
                                    @endif
                                </div>
                                <div class="mt-7 mb-6">
                                    <button type="submit" class="tf-btn accent">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <div class="tf-panel logout">
            <div class="panel_overlay"></div>
            <div class="panel-box panel-center panel-logout">
                    <div class="heading">
                        <h2 class="text-center">Anda yakin ingin menghapus data ini?</h2>
                    </div>
                    <div class="bottom">
                        <a class="clear-panel" href="#">Cancel</a>
                        <a class="clear-panel critical_color" href="{{ url('/my-gate-card/delete/'.$gate_card->id) }}">Delete</a>
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
                $(".clickable").on("click", function() {
                    window.location.href = $(this).data("url");
                });

                $('#copy').on('click', function(e) {
                    e.preventDefault();
                    var urlToCopy = "6868123336";
                    var tempInput = $('<input>');
                    $('body').append(tempInput);
                    tempInput.val(urlToCopy).select();
                    document.execCommand('copy');
                    tempInput.remove();
                    Swal.fire({
                        title: "Nomor Rekening Berhasil Dicopy",
                        icon: "success",
                        timer: 1500
                    });
                });

                var payButton = document.getElementById('pay-button');
                payButton.addEventListener('click', function () {
                    window.snap.pay('{{ $gate_card->snaptoken }}', {
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
    @else
        <div id="app-wrap" class="d-flex justify-content-center align-items-center vh-100">
            <div class="bill-content text-center">
                <div class="tf-container">
                    <p class="m-0">Data Not Found</p>
                </div>
            </div>
        </div>
    @endif
@endsection
