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
                            <div class="row align-items-center">
                                <div class="col-1 d-none d-sm-inline">
                                    :
                                </div>
                                <div class="col">
                                    {{ $ipkl->user->name ?? '-' }}
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2 font-weight-bold">Alamat</div>
                        <div class="col-sm-4 mt-sm-0 mt-1">
                            <div class="row align-items-center">
                                <div class="col-1 d-none d-sm-inline">
                                    :
                                </div>
                                <div class="col">
                                    {{ $ipkl->user->alamat ?? '-' }}
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="row align-items-center">
                        <div class="col-sm-2 font-weight-bold">Email</div>
                        <div class="col-sm-4 mt-sm-0 mt-1">
                            <div class="row align-items-center">
                                <div class="col-1 d-none d-sm-inline">
                                    :
                                </div>
                                <div class="col">
                                    {{ $ipkl->user->email ?? '-' }}
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2 font-weight-bold">No. HP</div>
                        <div class="col-sm-4 mt-sm-0 mt-1">
                            <div class="row align-items-center">
                                <div class="col-1 d-none d-sm-inline">
                                    :
                                </div>
                                <div class="col">
                                    {{ $ipkl->user->no_hp ?? '-' }}
                                    <a target="_blank" href="{{ url('/my-ipkl/show/'.$ipkl->id) }}" class="badge ml-2" style="color: rgb(4, 16, 149); border:1px solid rgb(4, 16, 149); background-color:white; ">Link Tagihan</a>
                                    <a target="_blank" href="https://wa.me/{{ $ipkl->user->whatsapp($ipkl->user->no_hp) }}?text={{ url('/my-ipkl/show/'.$ipkl->id) }}" class="badge ml-2" style="color: rgb(4, 149, 50); border:1px solid rgb(4, 149, 50); background-color:white; "><i class="fab fa-whatsapp"></i> Whatsapp</a>
                                    <a target="_blank" href="tel:{{ $ipkl->user->no_hp }}" class="badge ml-2" style="color: gray; border:1px solid gray; background-color:white; "><i class="fas fa-phone-volume"></i> Call</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="row align-items-center">
                        <div class="col-sm-2 font-weight-bold">Tanggal</div>
                        <div class="col-sm-4 mt-sm-0 mt-1">
                            <div class="row align-items-center">
                                <div class="col-1 d-none d-sm-inline">
                                    :
                                </div>
                                <div class="col">
                                    {{ $ipkl->date ?? '-' }}
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2 font-weight-bold">Jatuh Tempo</div>
                        <div class="col-sm-4 mt-sm-0 mt-1">
                            <div class="row align-items-center">
                                <div class="col-1 d-none d-sm-inline">
                                    :
                                </div>
                                <div class="col">
                                    @php
                                        $date = Carbon\Carbon::createFromFormat('Y-m-d', $ipkl->date);
                                        $expired_date = $date->addDays($ipkl->expired)->translatedFormat('Y-m-d');
                                    @endphp
                                    <span style="color: red;">{{ $expired_date }} ({{ $ipkl->expired ?? '-' }} Hari)</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="row align-items-center">
                        <div class="col-sm-2 font-weight-bold">Jenis Transaksi</div>
                        <div class="col-sm-4 mt-sm-0 mt-1">
                            <div class="row align-items-center">
                                <div class="col-1 d-none d-sm-inline">
                                    :
                                </div>
                                <div class="col">
                                    @php
                                        $month = Carbon\Carbon::createFromFormat('m', $ipkl->month)->translatedFormat('F');
                                    @endphp
                                    {{ $ipkl->type ?? '-' }} ({{ $month }} {{ $ipkl->year }})
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2 font-weight-bold">Nominal</div>
                        <div class="col-sm-4 mt-sm-0 mt-1">
                            <div class="row align-items-center">
                                <div class="col-1 d-none d-sm-inline">
                                    :
                                </div>
                                <div class="col">
                                    Rp {{ number_format($ipkl->nominal) }}
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="row align-items-center">
                        <div class="col-sm-2 font-weight-bold">Keterangan</div>
                        <div class="col-sm-4 mt-sm-0 mt-1">
                            <div class="row align-items-center">
                                <div class="col-1 d-none d-sm-inline">
                                    :
                                </div>
                                <div class="col">
                                    {!! $ipkl->notes ? nl2br(e($ipkl->notes)) : '-' !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2 font-weight-bold">status</div>
                        <div class="col-sm-4 mt-sm-0 mt-1">
                            <div class="row align-items-center">
                                <div class="col-1 d-none d-sm-inline">
                                    :
                                </div>
                                <div class="col">
                                    @if ($ipkl->status == 'paid')
                                        <div class="badge" style="color: rgba(20, 78, 7, 0.889); background-color:rgb(186, 238, 162); border-radius:10px;">{{ $ipkl->status ?? '-' }}</div>
                                    @else
                                        <div class="badge" style="color: rgba(78, 26, 26, 0.889); background-color:rgb(242, 170, 170); border-radius:10px;">{{ $ipkl->status ?? '-' }}</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="row align-items-center">
                        <div class="col-sm-2 font-weight-bold">Paid Date</div>
                        <div class="col-sm-4 mt-sm-0 mt-1">
                            <div class="row align-items-center">
                                <div class="col-1 d-none d-sm-inline">
                                    :
                                </div>
                                <div class="col">
                                    {{ $ipkl->paid_date ?? '-' }}
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2 font-weight-bold">Payment Source</div>
                        <div class="col-sm-4 mt-sm-0 mt-1">
                            <div class="row align-items-center">
                                <div class="col-1 d-none d-sm-inline">
                                    :
                                </div>
                                <div class="col">
                                    {{ $ipkl->payment_source ?? '-' }}
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
                                    {{ $ipkl->createdBy->name ?? '-' }}
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
                                    {{ $ipkl->updatedBy->name ?? '-' }}
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
@endsection
