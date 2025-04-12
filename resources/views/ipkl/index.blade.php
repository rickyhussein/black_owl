@extends('layouts.dashboard')
@section('button')
    <li class="nav-item mr-2">
        <a href="{{ url('/ipkl/tambah') }}" class="btn btn-primary nav-link" style="color: white">+ Tambah (Multiple User)</a>
    </li>
    <li class="nav-item mr-2">
        <a href="{{ url('/ipkl/tambah/peruser') }}" class="btn btn-primary nav-link" style="color: white">+ Tambah (Per User)</a>
    </li>
    <li class="nav-item mr-2">
        <a href="{{ url('/ipkl/export') }}{{ $_GET?'?'.$_SERVER['QUERY_STRING']: '' }}" class="btn btn-success nav-link" style="color: white"><i class="far fa-file-excel mr-1"></i>Export</a>
    </li>
@endsection
@section('isi')
    <form action="{{ url('/ipkl') }}" class="mr-2 ml-2">
        <div class="form-row mb-2">
            <div class="col-3">
                <input type="text" class="form-control" name="user" placeholder="Nama / Alamat" id="user" value="{{ request('user') }}">
            </div>
            <div class="col-3">
                <input type="datetime" class="form-control" name="start_date" placeholder="Start Date" id="start_date" value="{{ request('start_date') }}">
            </div>
            <div class="col-3">
                <input type="datetime" class="form-control" name="end_date" placeholder="End Date" id="end_date" value="{{ request('end_date') }}">
            </div>
            <div class="col-2">
                <select name="status" id="status" class="form-control @error('status') is-invalid @enderror selectpicker" data-live-search="true">
                    <option value="">Status</option>
                    <option value="unpaid" {{ 'unpaid' == request('status') ? 'selected="selected"' : '' }}>unpaid</option>
                    <option value="paid" {{ 'paid' == request('status') ? 'selected="selected"' : '' }}>paid</option>
                </select>
                @error('status')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-1">
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
                            <th style="min-width: 170px; background-color:rgb(243, 243, 243);" class="text-center">Expired Days</th>
                            <th style="min-width: 170px; background-color:rgb(243, 243, 243);" class="text-center">Jatuh Tempo</th>
                            <th style="min-width: 170px; background-color:rgb(243, 243, 243);" class="text-center">Jenis Transaksi</th>
                            <th style="min-width: 170px; background-color:rgb(243, 243, 243);" class="text-center">Nominal</th>
                            <th style="min-width: 300px; background-color:rgb(243, 243, 243);" class="text-center">Keterangan</th>
                            <th style="min-width: 170px; background-color:rgb(243, 243, 243);" class="text-center">Status</th>
                            <th style="background-color:rgb(243, 243, 243);" class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($transaction_ipkl) <= 0)
                            <tr>
                                <td colspan="11" class="text-center">Tidak Ada Data</td>
                            </tr>
                        @else
                            @foreach ($transaction_ipkl as $key => $ipkl)
                                <tr>
                                    <td class="text-center" style="position: sticky; left: 0; background-color: rgb(235, 235, 235); z-index: 1; vertical-align: middle;">{{ ($transaction_ipkl->currentpage() - 1) * $transaction_ipkl->perpage() + $key + 1 }}.</td>
                                    <td class="text-center" style="vertical-align: middle;">{{ $ipkl->user->alamat ?? '-' }}</td>
                                    <td class="text-center" style="vertical-align: middle;">{{ $ipkl->user->name ?? '-' }}</td>
                                    <td class="text-center" style="vertical-align: middle;">{{ $ipkl->date ?? '-' }}</td>
                                    <td class="text-center" style="vertical-align: middle;">{{ $ipkl->expired ?? '-' }} Hari</td>
                                    <td class="text-center" style="vertical-align: middle; color:red;">
                                        @php
                                            $date = Carbon\Carbon::createFromFormat('Y-m-d', $ipkl->date);
                                            $expired_date = $date->addDays($ipkl->expired)->translatedFormat('Y-m-d');
                                        @endphp
                                        {{ $expired_date }}
                                    </td>
                                    <td class="text-center" style="vertical-align: middle;">
                                        @php
                                            $month = Carbon\Carbon::createFromFormat('m', $ipkl->month)->translatedFormat('F');
                                        @endphp
                                        {{ $ipkl->type ?? '-' }} ({{ $month }} {{ $ipkl->year }})
                                    </td>
                                    <td class="text-center" style="vertical-align: middle;">Rp {{ number_format($ipkl->nominal) }}</td>
                                    <td style="vertical-align: middle;">{!! $ipkl->notes ? nl2br(e($ipkl->notes)) : '-' !!}</td>
                                    <td class="text-center" style="vertical-align: middle;">
                                        @if ($ipkl->status == 'paid')
                                            <div class="badge" style="color: rgba(20, 78, 7, 0.889); background-color:rgb(186, 238, 162); border-radius:10px;">{{ $ipkl->status ?? '-' }}</div>
                                        @else
                                            <div class="badge" style="color: rgba(78, 26, 26, 0.889); background-color:rgb(242, 170, 170); border-radius:10px;">{{ $ipkl->status ?? '-' }}</div>
                                        @endif
                                    </td>
                                    <td class="text-center" style="vertical-align: middle;">
                                        <div style="display: flex; gap: 5px;">
                                            <a href="{{ url('/ipkl/show/'.$ipkl->id) }}" class="btn btn-info btn-sm" title="show IPKL"><i class="fa fa-eye"></i></a>

                                            @if ($ipkl->status == 'unpaid')
                                                <a href="{{ url('/ipkl/edit/'.$ipkl->id) }}" class="btn btn-primary btn-sm" title="Edit IPKL"><i class="fa fa-edit"></i></a>

                                                <form action="{{ url('/ipkl/delete/'.$ipkl->id) }}" method="post">
                                                    @method('delete')
                                                    @csrf
                                                    <button title="Delete IPKL" class="border-0 btn btn-danger btn-sm" onClick="return confirm('Are You Sure')"><i class="fa fa-trash"></i></button>
                                                </form>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-end me-4 mt-4">
                {{ $transaction_ipkl->links() }}
            </div>
        </div>
    </div>
    @push('script')
        <script>
            $('#start_date').change(function(){
                var start_date = $(this).val();
                $('#end_date').val(start_date);
            });
        </script>
    @endpush

@endsection




