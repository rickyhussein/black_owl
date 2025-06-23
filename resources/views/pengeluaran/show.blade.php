@extends('layouts.dashboard')
@section('button')
    <li class="nav-item mr-2">
        <button type="button" class="btn btn-success text-white" data-toggle="modal" data-target="#exampleModalCenter">
            Status Pembayaran
        </button>
    </li>
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
                        <div class="col-sm-2 font-weight-bold">Status</div>
                        <div class="col-sm-4 mt-sm-0 mt-1">
                            <div class="row align-items-center">
                                <div class="col-1 d-none d-sm-inline">
                                    :
                                </div>
                                <div class="col">
                                    @if ($pengeluaran->status == 'paid')
                                        <div class="badge" style="color: rgba(20, 78, 7, 0.889); background-color:rgb(186, 238, 162); border-radius:10px; text-transform: uppercase;">{{ $pengeluaran->status ?? '-' }}</div>
                                    @else
                                        <div class="badge" style="color: rgba(78, 26, 26, 0.889); background-color:rgb(242, 170, 170); border-radius:10px; text-transform: uppercase;">{{ $pengeluaran->status ?? '-' }}</div>
                                    @endif
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
                                    {!! $pengeluaran->notes ? nl2br(e($pengeluaran->notes)) : '-' !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2 font-weight-bold">File</div>
                        <div class="col-sm-4 mt-sm-0 mt-1">
                            <div class="row align-items-center">
                                <div class="col-1 d-none d-sm-inline">
                                    :
                                </div>
                                <div class="col">
                                    @if(count($pengeluaran->pengeluaranfile) > 0)
                                        @foreach ($pengeluaran->pengeluaranfile as $key => $file)
                                            @if ($file->pengeluaran_file_path)
                                                <a class="badge" style="color: rgb(21, 47, 118); background-color:rgba(192, 218, 254, 0.889); border-radius:10px;" target="_blank" href="{{ url('/storage/'.$file->pengeluaran_file_path) }}"><i class="fa fa-download mr-1"></i> {{ $file->pengeluaran_file_name }}</a>
                                                <br>
                                            @else
                                                -
                                            @endif
                                        @endforeach
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

    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Change Status</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ url('/pengeluaran/status/'.$pengeluaran->id) }}" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control @error('status') is-invalid @enderror selectpicker" data-live-search="true">
                            <option value="">-- Pilih Status --</option>
                            <option value="paid" {{ 'paid' == old('status', $pengeluaran->status) ? 'selected="selected"' : '' }}>paid</option>
                            <option value="unpaid" {{ 'unpaid' == old('status', $pengeluaran->status) ? 'selected="selected"' : '' }}>unpaid</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
        </div>
    </div>
@endsection
