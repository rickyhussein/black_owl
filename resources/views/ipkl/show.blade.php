@extends('layouts.dashboard')
@section('button')
    @if ($ipkl->status == 'unpaid')
        <li class="nav-item mr-2">
            <a href="{{ url('/ipkl/edit/'.$ipkl->id) }}" class="btn btn-primary nav-link" style="color: white"><i class="fa fa-edit mr-1"></i> Edit</a>
        </li>
    @endif
    <li class="nav-item mr-2">
        <a href="{{ url('/ipkl') }}" class="btn nav-link" style="color: red; border:1px solid red; background-color:white; ">Back</a>
    </li>
@endsection
@section('isi')
    <div class="container-fluid">
        <div class="card">
            <ul class="list-group list-group-flush " style="border-radius:15px;">
                <li class="list-group-item">
                    <div class="row align-items-center">
                        <div class="col-sm-2 font-weight-bold">Nama</div>
                        <div class="col-sm-4 mt-sm-0 mt-1">
                            <span class="d-none d-sm-inline">:</span> {{ $ipkl->user->name ?? '-' }}
                        </div>
                        <div class="col-sm-2 font-weight-bold">Alamat</div>
                        <div class="col-sm-4 mt-sm-0 mt-1">
                            <span class="d-none d-sm-inline">:</span> {{ $ipkl->user->alamat ?? '-' }}
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="row align-items-center">
                        <div class="col-sm-2 font-weight-bold">Tanggal</div>
                        <div class="col-sm-4 mt-sm-0 mt-1">
                            <span class="d-none d-sm-inline">:</span> {{ $ipkl->date ?? '-' }}
                        </div>
                        <div class="col-sm-2 font-weight-bold">Jatuh Tempo</div>
                        <div class="col-sm-4 mt-sm-0 mt-1">
                            <span class="d-none d-sm-inline">:</span>
                            @php
                                $date = Carbon\Carbon::createFromFormat('Y-m-d', $ipkl->date);
                                $expired_date = $date->addDays($ipkl->expired)->translatedFormat('Y-m-d');
                            @endphp
                            <span style="color: red;">{{ $expired_date }} ({{ $ipkl->expired ?? '-' }} Hari)</span>
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="row align-items-center">
                        <div class="col-sm-2 font-weight-bold">Jenis Transaksi</div>
                        <div class="col-sm-4 mt-sm-0 mt-1">
                            <span class="d-none d-sm-inline">:</span>
                            @php
                                $month = Carbon\Carbon::createFromFormat('m', $ipkl->month)->translatedFormat('F');
                            @endphp
                            {{ $ipkl->type ?? '-' }} ({{ $month }} {{ $ipkl->year }})
                        </div>
                        <div class="col-sm-2 font-weight-bold">Nominal</div>
                        <div class="col-sm-4 mt-sm-0 mt-1">
                            <span class="d-none d-sm-inline">:</span> Rp {{ number_format($ipkl->nominal) }}
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="row align-items-center">
                        <div class="col-sm-2 font-weight-bold">Keterangan</div>
                        <div class="col-sm-4 mt-sm-0 mt-1">
                            <span class="d-none d-sm-inline">:</span> {{ $ipkl->notes ?? '-' }}
                        </div>
                        <div class="col-sm-2 font-weight-bold">status</div>
                        <div class="col-sm-4 mt-sm-0 mt-1">
                            <span class="d-none d-sm-inline">:</span>
                            @if ($ipkl->status == 'paid')
                                <div class="badge" style="color: rgba(20, 78, 7, 0.889); background-color:rgb(186, 238, 162); border-radius:10px;">{{ $ipkl->status ?? '-' }}</div>
                            @else
                                <div class="badge" style="color: rgba(78, 26, 26, 0.889); background-color:rgb(242, 170, 170); border-radius:10px;">{{ $ipkl->status ?? '-' }}</div>
                            @endif
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="row align-items-center">
                        <div class="col-sm-2 font-weight-bold">Paid Date</div>
                        <div class="col-sm-4 mt-sm-0 mt-1">
                            <span class="d-none d-sm-inline">:</span> {{ $ipkl->paid_date ?? '-' }}
                        </div>
                        <div class="col-sm-2 font-weight-bold">Payment Source</div>
                        <div class="col-sm-4 mt-sm-0 mt-1">
                            <span class="d-none d-sm-inline">:</span> {{ $ipkl->payment_source ?? '-' }}
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="row align-items-center">
                        <div class="col-sm-2 font-weight-bold">Created By</div>
                        <div class="col-sm-4 mt-sm-0 mt-1">
                            <span class="d-none d-sm-inline">:</span> {{ $ipkl->createdBy->name ?? '-' }}
                        </div>
                        <div class="col-sm-2 font-weight-bold">Updated By</div>
                        <div class="col-sm-4 mt-sm-0 mt-1">
                            <span class="d-none d-sm-inline">:</span> {{ $ipkl->updatedBy->name ?? '-' }}
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
@endsection
