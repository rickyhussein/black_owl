@extends('layouts.dashboard')
@section('button')
    <li class="nav-item mr-2">
        <a href="{{ url('/pengeluaran/tambah') }}" class="btn btn-primary nav-link" style="color: white">+ Tambah</a>
    </li>
    <li class="nav-item mr-2">
        <a href="{{ url('/pengeluaran/export') }}{{ $_GET?'?'.$_SERVER['QUERY_STRING']: '' }}" class="btn btn-success nav-link" style="color: white"><i class="far fa-file-excel mr-1"></i>Export</a>
    </li>
@endsection
@section('isi')
    <form action="{{ url('/pengeluaran') }}" class="mr-2 ml-2">
        <div class="form-row mb-2">
            <div class="col-3">
                <input type="datetime" class="form-control" name="start_date" placeholder="Start Date" id="start_date" value="{{ request('start_date') }}">
            </div>
            <div class="col-3">
                <input type="datetime" class="form-control" name="end_date" placeholder="End Date" id="end_date" value="{{ request('end_date') }}">
            </div>
            <div class="col-3">
                <select name="type" id="type" class="form-control @error('type') is-invalid @enderror selectpicker" data-live-search="true">
                    <option value="">Jenis Transaksi</option>
                    <option value="Gaji Security" {{ 'Gaji Security' == request('type') ? 'selected="selected"' : '' }}>Gaji Security</option>
                    <option value="Pembayaran Vendor" {{ 'Pembayaran Vendor' == request('type') ? 'selected="selected"' : '' }}>Pembayaran Vendor</option>
                    <option value="Operasional" {{ 'Operasional' == request('type') ? 'selected="selected"' : '' }}>Operasional</option>
                    <option value="Biaya & Aset" {{ 'Biaya & Aset' == request('type') ? 'selected="selected"' : '' }}>Biaya & Aset</option>
                    <option value="Lainnya" {{ 'Lainnya' == request('type') ? 'selected="selected"' : '' }}>Lainnya</option>
                </select>
                @error('type')
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
                            <th style="min-width: 170px; background-color:rgb(243, 243, 243);" class="text-center">Tanggal</th>
                            <th style="min-width: 170px; background-color:rgb(243, 243, 243);" class="text-center">Jenis Transaksi</th>
                            <th style="min-width: 170px; background-color:rgb(243, 243, 243);" class="text-center">Nominal</th>
                            <th style="min-width: 170px; background-color:rgb(243, 243, 243);" class="text-center">Status</th>
                            <th style="min-width: 170px; background-color:rgb(243, 243, 243);" class="text-center">File</th>
                            <th style="min-width: 300px; background-color:rgb(243, 243, 243);" class="text-center">Keterangan</th>
                            <th style="background-color:rgb(243, 243, 243);" class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($transaction_pengeluaran) <= 0)
                            <tr>
                                <td colspan="11" class="text-center">Tidak Ada Data</td>
                            </tr>
                        @else
                            @foreach ($transaction_pengeluaran as $key => $pengeluaran)
                                <tr>
                                    <td class="text-center" style="position: sticky; left: 0; background-color: rgb(235, 235, 235); z-index: 1; vertical-align: middle;">{{ ($transaction_pengeluaran->currentpage() - 1) * $transaction_pengeluaran->perpage() + $key + 1 }}.</td>
                                    <td class="text-center" style="vertical-align: middle;">{{ $pengeluaran->date ?? '-' }}</td>
                                    <td class="text-center" style="vertical-align: middle;">{{ $pengeluaran->type ?? '-' }}</td>
                                    <td class="text-center" style="vertical-align: middle;">Rp {{ number_format($pengeluaran->nominal) }}</td>
                                    <td class="text-center" style="vertical-align: middle;">
                                        @if ($pengeluaran->status == 'paid')
                                            <div class="badge" style="color: rgba(20, 78, 7, 0.889); background-color:rgb(186, 238, 162); border-radius:10px; text-transform: uppercase;">{{ $pengeluaran->status ?? '-' }}</div>
                                        @else
                                            <div class="badge" style="color: rgba(78, 26, 26, 0.889); background-color:rgb(242, 170, 170); border-radius:10px; text-transform: uppercase;">{{ $pengeluaran->status ?? '-' }}</div>
                                        @endif
                                    </td>
                                    <td class="text-center" style="vertical-align: middle;">
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
                                    </td>
                                    <td style="vertical-align: middle;">{!! $pengeluaran->notes ? nl2br(e($pengeluaran->notes)) : '-' !!}</td>
                                    <td class="text-center" style="vertical-align: middle;">
                                        <div style="display: flex; gap: 5px;">
                                            <a href="{{ url('/pengeluaran/show/'.$pengeluaran->id) }}" class="btn btn-info btn-sm" title="show Pengeluaran"><i class="fa fa-eye"></i></a>

                                            <a href="{{ url('/pengeluaran/edit/'.$pengeluaran->id) }}" class="btn btn-primary btn-sm" title="Edit Pengeluaran"><i class="fa fa-edit"></i></a>

                                            <form action="{{ url('/pengeluaran/delete/'.$pengeluaran->id) }}" method="post">
                                                @method('delete')
                                                @csrf
                                                <button title="Delete Pengeluaran" class="border-0 btn btn-danger btn-sm" onClick="return confirm('Are You Sure')"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-end me-4 mt-4">
                {{ $transaction_pengeluaran->links() }}
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




