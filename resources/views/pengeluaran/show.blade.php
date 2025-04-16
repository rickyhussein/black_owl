@extends('layouts.dashboard')
@section('button')
    <li class="nav-item mr-2">
        <a href="{{ url('/pengeluaran/edit/'.$pengeluaran->id) }}" class="btn btn-primary nav-link" style="color: white"><i class="fa fa-edit mr-1"></i> Edit</a>
    </li>
    <li class="nav-item mr-2">
        <a href="{{ url('/pengeluaran') }}" class="btn nav-link" style="color: red; border:1px solid red; background-color:white; ">Back</a>
    </li>
@endsection
@section('isi')
    <div class="container-fluid">
        <div class="card">
            <ul class="list-group list-group-flush " style="border-radius:15px;">
                <li class="list-group-item">
                    <div class="row align-items-center">
                        <div class="col-sm-2 font-weight-bold">Jenis Transaksi</div>
                        <div class="col-sm-4 mt-sm-0 mt-1">
                            <div class="row align-items-center">
                                <div class="col-1 d-none d-sm-inline">
                                    :
                                </div>
                                <div class="col">
                                    {{ $pengeluaran->type ?? '-' }}
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2 font-weight-bold">Tanggal</div>
                        <div class="col-sm-4 mt-sm-0 mt-1">
                            <div class="row align-items-center">
                                <div class="col-1 d-none d-sm-inline">
                                    :
                                </div>
                                <div class="col">
                                    {{ $pengeluaran->date ?? '-' }}
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="row align-items-center">
                        <div class="col-sm-2 font-weight-bold">Nominal</div>
                        <div class="col-sm-4 mt-sm-0 mt-1">
                            <div class="row align-items-center">
                                <div class="col-1 d-none d-sm-inline">
                                    :
                                </div>
                                <div class="col">
                                    Rp {{ number_format($pengeluaran->nominal) }}
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2 font-weight-bold">Keterangan</div>
                        <div class="col-sm-4 mt-sm-0 mt-1">
                            <div class="row align-items-center">
                                <div class="col-1 d-none d-sm-inline">
                                    :
                                </div>
                                <div class="col">
                                    {!! $pengeluaran->notes ? nl2br(e($pengeluaran->notes)) : '-' !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="row align-items-center">
                        <div class="col-sm-2 font-weight-bold">File</div>
                        <div class="col-sm-4 mt-sm-0 mt-1">
                            <div class="row align-items-center">
                                <div class="col-1 d-none d-sm-inline">
                                    :
                                </div>
                                <div class="col">
                                    @if ($pengeluaran->file_transaction_path)
                                        <a class="badge" style="color: rgb(21, 47, 118); background-color:rgba(192, 218, 254, 0.889); border-radius:10px;" target="_blank" href="{{ url('/storage/'.$pengeluaran->file_transaction_path) }}"><i class="fa fa-download mr-1"></i> {{ $pengeluaran->file_transaction_name }}</a>
                                    @else
                                        -
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="row align-items-center">
                        <div class="col-sm-2 font-weight-bold">Created By</div>
                        <div class="col-sm-4 mt-sm-0 mt-1">
                            <div class="row align-items-center">
                                <div class="col-1 d-none d-sm-inline">
                                    :
                                </div>
                                <div class="col">
                                    {{ $pengeluaran->createdBy->name ?? '-' }}
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2 font-weight-bold">Updated By</div>
                        <div class="col-sm-4 mt-sm-0 mt-1">
                            <div class="row align-items-center">
                                <div class="col-1 d-none d-sm-inline">
                                    :
                                </div>
                                <div class="col">
                                    {{ $pengeluaran->updatedBy->name ?? '-' }}
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
@endsection
