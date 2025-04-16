@extends('layouts.dashboard')
@section('button')
    <li class="nav-item mr-2">
        <a href="{{ url('/kritik-saran/export') }}{{ $_GET?'?'.$_SERVER['QUERY_STRING']: '' }}" class="btn btn-success nav-link" style="color: white"><i class="far fa-file-excel mr-1"></i>Export</a>
    </li>
@endsection
@section('isi')
    <form action="{{ url('/kritik-saran') }}" class="mr-2 ml-2">
        <div class="form-row mb-2">
            <div class="col-7">
                <input type="text" class="form-control" name="search" placeholder="Search.." id="search" value="{{ request('search') }}">
            </div>
            <div class="col-3">
                <select name="status" id="status" class="form-control @error('status') is-invalid @enderror selectpicker" data-live-search="true">
                    <option value="">-- Pilih Status --</option>
                    <option value="draft" {{ 'draft' == request('status') ? 'selected="selected"' : '' }}>draft</option>
                    <option value="approved" {{ 'approved' == request('status') ? 'selected="selected"' : '' }}>approved</option>
                    <option value="rejected" {{ 'rejected' == request('status') ? 'selected="selected"' : '' }}>rejected</option>
                </select>
                @error('status')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col">
                <button type="submit" id="search" class="btn"><i class="fas fa-search"></i></button>
            </div>
        </div>
    </form>
    <div class="container-fluid">
        <div class="card p-4">
            <div class="table-responsive" style="border-radius: 10px">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center" style="position: sticky; left: 0; background-color: rgb(215, 215, 215); z-index: 2;">No.</th>
                            <th style="min-width: 170px; background-color:rgb(243, 243, 243);" class="text-center">Alamat</th>
                            <th style="min-width: 170px; background-color:rgb(243, 243, 243);" class="text-center">Nama</th>
                            <th style="min-width: 170px; background-color:rgb(243, 243, 243);" class="text-center">Tanggal</th>
                            <th style="min-width: 170px; background-color:rgb(243, 243, 243);" class="text-center">Judul</th>
                            <th style="min-width: 400px; background-color:rgb(243, 243, 243);" class="text-center">Kritik & Saran</th>
                            <th style="min-width: 170px; background-color:rgb(243, 243, 243);" class="text-center">Status</th>
                            <th style="background-color:rgb(243, 243, 243);" class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($kritik_sarans) <= 0)
                            <tr>
                                <td colspan="11" class="text-center">Tidak Ada Data</td>
                            </tr>
                        @else
                            @foreach ($kritik_sarans as $key => $kritik_saran)
                                <tr>
                                    <td class="text-center" style="position: sticky; left: 0; background-color: rgb(235, 235, 235); z-index: 1; vertical-align: middle;">{{ ($kritik_sarans->currentpage() - 1) * $kritik_sarans->perpage() + $key + 1 }}.</td>
                                    <td class="text-center" style="vertical-align: middle;">{{ $kritik_saran->user->alamat ?? '-' }}</td>
                                    <td class="text-center" style="vertical-align: middle;">{{ $kritik_saran->user->name ?? '-' }}</td>
                                    <td class="text-center" style="vertical-align: middle;">{{ $kritik_saran->date ?? '-' }}</td>
                                    <td class="text-center" style="vertical-align: middle;">{{ $kritik_saran->judul ?? '-' }}</td>
                                    <td style="vertical-align: middle;">{!! $kritik_saran->kritik_saran ? nl2br(e($kritik_saran->kritik_saran)) : '-' !!}</td>
                                    <td class="text-center" style="vertical-align: middle;">
                                        @if ($kritik_saran->status == 'approved')
                                            <div class="badge" style="color: rgba(20, 78, 7, 0.889); background-color:rgb(186, 238, 162); border-radius:10px; text-transform: uppercase;">{{ $kritik_saran->status ?? '-' }}</div>
                                        @elseif ($kritik_saran->status == 'rejected')
                                            <div class="badge" style="color: rgba(78, 26, 26, 0.889); background-color:rgb(242, 170, 170); border-radius:10px; text-transform: uppercase;">{{ $kritik_saran->status ?? '-' }}</div>
                                        @else
                                            <div class="badge" style="color: rgba(255, 123, 0, 0.889); background-color:rgb(255, 238, 177); border-radius:10px; text-transform: uppercase;">{{ $kritik_saran->status ?? '-' }}</div>
                                        @endif
                                    </td>
                                    <td class="text-center" style="vertical-align: middle;">
                                        <div style="display: flex; gap: 5px;">
                                            <a href="{{ url('/kritik-saran/show/'.$kritik_saran->id) }}" class="btn btn-info btn-sm" title="show IPKL"><i class="fa fa-eye"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-end me-4 mt-4">
                {{ $kritik_sarans->links() }}
            </div>
        </div>
    </div>
@endsection




