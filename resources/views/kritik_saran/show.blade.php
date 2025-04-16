@extends('layouts.dashboard')
@section('button')
    @if ($kritik_saran->status == 'draft')
        <li class="nav-item mr-2">
            <button type="button" class="btn btn-primary text-white" data-toggle="modal" data-target="#exampleModalCenter">
                <i class="fas fa-check-circle mr-1"></i> Approval
            </button>
        </li>
    @endif
    <li class="nav-item mr-2">
        <a href="{{ url('/kritik-saran') }}" class="btn nav-link" style="color: red; border:1px solid red; background-color:white; ">Back</a>
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
                                    {{ $kritik_saran->user->name ?? '-' }}
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
                                    {{ $kritik_saran->user->alamat ?? '-' }}
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
                                    {{ $kritik_saran->date ?? '-' }}
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
                                    @if ($kritik_saran->kritik_saran_file_path)
                                        <a class="badge" style="color: rgb(21, 47, 118); background-color:rgba(192, 218, 254, 0.889); border-radius:10px;" target="_blank" href="{{ url('/storage/'.$kritik_saran->kritik_saran_file_path) }}"><i class="fa fa-download mr-1"></i> {{ $kritik_saran->kritik_saran_file_name }}</a>
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
                        <div class="col-sm-2 font-weight-bold">Judul</div>
                        <div class="col-sm-4 mt-sm-0 mt-1">
                            <div class="row align-items-center">
                                <div class="col-1 d-none d-sm-inline">
                                    :
                                </div>
                                <div class="col">
                                    {{ $kritik_saran->judul ?? '-' }}
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2 font-weight-bold">Kritik & Saran</div>
                        <div class="col-sm-4 mt-sm-0 mt-1">
                            <div class="row align-items-center">
                                <div class="col-1 d-none d-sm-inline">
                                    :
                                </div>
                                <div class="col">
                                    {!! $kritik_saran->kritik_saran ? nl2br(e($kritik_saran->kritik_saran)) : '-' !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </li>

                <li class="list-group-item">
                    <div class="row align-items-center">
                        <div class="col-sm-2 font-weight-bold">User Approval</div>
                        <div class="col-sm-4 mt-sm-0 mt-1">
                            <div class="row align-items-center">
                                <div class="col-1 d-none d-sm-inline">
                                    :
                                </div>
                                <div class="col">
                                    {{ $kritik_saran->approvedBy->name ?? '-' }}
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2 font-weight-bold">Catatan</div>
                        <div class="col-sm-4 mt-sm-0 mt-1">
                            <div class="row align-items-center">
                                <div class="col-1 d-none d-sm-inline">
                                    :
                                </div>
                                <div class="col">
                                    {!! $kritik_saran->catatan_pengurus ? nl2br(e($kritik_saran->catatan_pengurus)) : '-' !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </li>

                <li class="list-group-item">
                    <div class="row align-items-center">
                        <div class="col-sm-2 font-weight-bold">Status</div>
                        <div class="col-sm-4 mt-sm-0 mt-1">
                            <div class="row align-items-center">
                                <div class="col-1 d-none d-sm-inline">
                                    :
                                </div>
                                <div class="col">
                                    @if ($kritik_saran->status == 'approved')
                                        <div class="badge" style="color: rgba(20, 78, 7, 0.889); background-color:rgb(186, 238, 162); border-radius:10px; text-transform: uppercase;">{{ $kritik_saran->status ?? '-' }}</div>
                                    @elseif ($kritik_saran->status == 'rejected')
                                        <div class="badge" style="color: rgba(78, 26, 26, 0.889); background-color:rgb(242, 170, 170); border-radius:10px; text-transform: uppercase;">{{ $kritik_saran->status ?? '-' }}</div>
                                    @else
                                        <div class="badge" style="color: rgba(255, 123, 0, 0.889); background-color:rgb(255, 238, 177); border-radius:10px; text-transform: uppercase;">{{ $kritik_saran->status ?? '-' }}</div>
                                    @endif
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
                <h5 class="modal-title" id="exampleModalLongTitle">Approval</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ url('/kritik-saran/approval/'.$kritik_saran->id) }}" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control @error('status') is-invalid @enderror selectpicker" data-live-search="true">
                            <option value="">-- Pilih Status --</option>
                            <option value="approved" {{ 'approved' == old('status') ? 'selected="selected"' : '' }}>Approve</option>
                            <option value="rejected" {{ 'rejected' == old('status') ? 'selected="selected"' : '' }}>Reject</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="catatan_pengurus">Catatan</label>
                        <textarea name="catatan_pengurus" id="catatan_pengurus" class="form-control @error('catatan_pengurus') is-invalid @enderror" rows="5">{{ old('catatan_pengurus') }}</textarea>
                        @error('catatan_pengurus')
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
