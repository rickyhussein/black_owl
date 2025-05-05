@extends('layouts.dashboard')
@section('button')
    <li class="nav-item mr-2">
        <a href="{{ url('/gate-card/export') }}{{ $_GET?'?'.$_SERVER['QUERY_STRING']: '' }}" class="btn btn-success nav-link" style="color: white"><i class="far fa-file-excel mr-1"></i>Export</a>
    </li>
@endsection
@section('isi')
    <div class="d-none d-md-block">
        <form action="{{ url('/gate-card') }}" class="mr-2 ml-2">
            <div class="form-row mb-2">
                <div class="col-4 mb-2">
                    <input type="text" class="form-control" name="user" placeholder="Nama / Alamat" id="user" value="{{ request('user') }}">
                </div>
                <div class="col-4 mb-2">
                    <input type="datetime" class="form-control start_date" name="start_date" placeholder="Start Date" id="start_date" value="{{ request('start_date') }}">
                </div>
                <div class="col-4 mb-2">
                    <input type="datetime" class="form-control end_date" name="end_date" placeholder="End Date" id="end_date" value="{{ request('end_date') }}">
                </div>
                <div class="col-4 mb-2">
                    <select name="payment_source" id="payment_source" class="form-control @error('payment_source') is-invalid @enderror selectpicker" data-live-search="true">
                        <option value="">-- Pilih Jenis Pembayaran --</option>
                        <option value="midtrans" {{ 'midtrans' == request('payment_source') ? 'selected="selected"' : '' }}>midtrans</option>
                        <option value="Bank Transfer (Perlu Konfirmasi Pembayaran Manual)" {{ 'Bank Transfer (Perlu Konfirmasi Pembayaran Manual)' == request('payment_source') ? 'selected="selected"' : '' }}>Bank Transfer (Perlu Konfirmasi Pembayaran Manual)</option>
                    </select>
                    @error('payment_source')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="col-4 mb-2">
                    <select name="status" id="status" class="form-control @error('status') is-invalid @enderror selectpicker" data-live-search="true">
                        <option value="">-- Pilih Status --</option>
                        <option value="unpaid" {{ 'unpaid' == request('status') ? 'selected="selected"' : '' }}>unpaid</option>
                        <option value="paid" {{ 'paid' == request('status') ? 'selected="selected"' : '' }}>paid</option>
                    </select>
                    @error('status')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="col-3 mb-2">
                    <select name="status_approval" id="status_approval" class="form-control @error('status_approval') is-invalid @enderror selectpicker" data-live-search="true">
                        <option value="">-- Pilih Status Approval --</option>
                        <option value="draft" {{ 'draft' == request('status_approval') ? 'selected="selected"' : '' }}>draft</option>
                        <option value="approved" {{ 'approved' == request('status_approval') ? 'selected="selected"' : '' }}>approved</option>
                        <option value="rejected" {{ 'rejected' == request('status_approval') ? 'selected="selected"' : '' }}>rejected</option>
                    </select>
                    @error('status_approval')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="col mb-2">
                    <button type="submit" id="search" class="btn"><i class="fas fa-search"></i></button>
                </div>
            </div>
        </form>
    </div>

    <div class="d-block d-md-none">
        <button type="button" class="btn btn-secondary btn-sm text-white ml-3 mb-3"  data-toggle="modal" data-target="#exampleModalCenter">
            <i class="fas fa-filter mr-1"></i> Filter
        </button>
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Filter</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ url('/gate-card') }}">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" name="user" placeholder="Nama / Alamat" id="user" value="{{ request('user') }}">
                        </div>
                        <div class="form-group">
                            <input type="datetime" class="form-control start_date" name="start_date" placeholder="Start Date" id="start_date" value="{{ request('start_date') }}">
                        </div>
                        <div class="form-group">
                            <input type="datetime" class="form-control end_date" name="end_date" placeholder="End Date" id="end_date" value="{{ request('end_date') }}">
                        </div>
                        <div class="form-group">
                            <select name="payment_source" id="payment_source" class="form-control @error('payment_source') is-invalid @enderror selectpicker" data-live-search="true">
                                <option value="">-- Pilih Jenis Pembayaran --</option>
                                <option value="midtrans" {{ 'midtrans' == request('payment_source') ? 'selected="selected"' : '' }}>midtrans</option>
                                <option value="Bank Transfer (Perlu Konfirmasi Pembayaran Manual)" {{ 'Bank Transfer (Perlu Konfirmasi Pembayaran Manual)' == request('payment_source') ? 'selected="selected"' : '' }}>Bank Transfer (Perlu Konfirmasi Pembayaran Manual)</option>
                            </select>
                            @error('payment_source')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <select name="status" id="status" class="form-control @error('status') is-invalid @enderror selectpicker" data-live-search="true">
                                <option value="">-- Pilih Status --</option>
                                <option value="unpaid" {{ 'unpaid' == request('status') ? 'selected="selected"' : '' }}>unpaid</option>
                                <option value="paid" {{ 'paid' == request('status') ? 'selected="selected"' : '' }}>paid</option>
                            </select>
                            @error('status')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <select name="status_approval" id="status_approval" class="form-control @error('status_approval') is-invalid @enderror selectpicker" data-live-search="true">
                                <option value="">-- Pilih Status Approval --</option>
                                <option value="draft" {{ 'draft' == request('status_approval') ? 'selected="selected"' : '' }}>draft</option>
                                <option value="approved" {{ 'approved' == request('status_approval') ? 'selected="selected"' : '' }}>approved</option>
                                <option value="rejected" {{ 'rejected' == request('status_approval') ? 'selected="selected"' : '' }}>rejected</option>
                            </select>
                            @error('status_approval')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-secondary">Search</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>

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
                            <th style="min-width: 170px; background-color:rgb(243, 243, 243);" class="text-center">Jenis Transaksi</th>
                            <th style="min-width: 250px; background-color:rgb(243, 243, 243);" class="text-center">Status Gate Card</th>
                            <th style="min-width: 250px; background-color:rgb(243, 243, 243);" class="text-center">Jenis Pembayaran</th>
                            <th style="min-width: 170px; background-color:rgb(243, 243, 243);" class="text-center">Nominal</th>
                            <th style="min-width: 170px; background-color:rgb(243, 243, 243);" class="text-center">Jumlah Gate Card Yang Dipesan</th>
                            <th style="min-width: 300px; background-color:rgb(243, 243, 243);" class="text-center">Nomor Polisi Kendaraan</th>
                            <th style="min-width: 170px; background-color:rgb(243, 243, 243);" class="text-center">Bukti Pembayaran</th>
                            <th style="min-width: 170px; background-color:rgb(243, 243, 243);" class="text-center">Status</th>
                            <th style="min-width: 170px; background-color:rgb(243, 243, 243);" class="text-center">Status Approval</th>
                            <th style="background-color:rgb(243, 243, 243);" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($transaction_gate_card) <= 0)
                            <tr>
                                <td colspan="12" class="text-center">Tidak Ada Data</td>
                            </tr>
                        @else
                            @foreach ($transaction_gate_card as $key => $gate_card)
                                <tr>
                                    <td class="text-center" style="position: sticky; left: 0; background-color: rgb(235, 235, 235); z-index: 1; vertical-align: middle;">{{ ($transaction_gate_card->currentpage() - 1) * $transaction_gate_card->perpage() + $key + 1 }}.</td>
                                    <td class="text-center" style="vertical-align: middle;">{{ $gate_card->user->alamat ?? '-' }}</td>
                                    <td class="text-center" style="vertical-align: middle;">{{ $gate_card->user->name ?? '-' }}</td>
                                    <td class="text-center" style="vertical-align: middle;">{{ $gate_card->date ?? '-' }}</td>
                                    <td class="text-center" style="vertical-align: middle;">{{ $gate_card->type ?? '-' }}</td>
                                    <td class="text-center" style="vertical-align: middle;">{{ $gate_card->status_gate_card ?? '-' }}</td>
                                    <td class="text-center" style="vertical-align: middle;">{{ $gate_card->payment_source ?? '-' }}</td>
                                    <td class="text-center" style="vertical-align: middle;">Rp {{ number_format($gate_card->nominal) }}</td>
                                    <td class="text-center" style="vertical-align: middle;">{{ $gate_card->qty ?? '-' }}</td>
                                    <td style="vertical-align: middle;">{!! $gate_card->notes ? nl2br(e($gate_card->notes)) : '-' !!}</td>
                                    <td class="text-center" style="vertical-align: middle;">
                                        @if ($gate_card->file_transaction_path)
                                            <a class="badge" style="color: rgb(21, 47, 118); background-color:rgba(192, 218, 254, 0.889); border-radius:10px;" target="_blank" href="{{ url('/storage/'.$gate_card->file_transaction_path) }}"><i class="fa fa-download mr-1"></i> {{ $gate_card->file_transaction_name }}</a>
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td class="text-center" style="vertical-align: middle;">
                                        @if ($gate_card->status == 'paid')
                                            <div class="badge" style="color: rgba(20, 78, 7, 0.889); background-color:rgb(186, 238, 162); border-radius:10px; text-transform: uppercase">{{ $gate_card->status ?? '-' }}</div>
                                        @else
                                            <div class="badge" style="color: rgba(78, 26, 26, 0.889); background-color:rgb(242, 170, 170); border-radius:10px; text-transform: uppercase">{{ $gate_card->status ?? '-' }}</div>
                                        @endif
                                    </td>
                                    <td class="text-center" style="vertical-align: middle;">
                                        @if ($gate_card->status_approval == 'approved')
                                            <div class="badge" style="color: rgba(20, 78, 7, 0.889); background-color:rgb(186, 238, 162); border-radius:10px; text-transform: uppercase;">{{ $gate_card->status_approval ?? '-' }}</div>
                                        @elseif ($gate_card->status_approval == 'rejected')
                                            <div class="badge" style="color: rgba(78, 26, 26, 0.889); background-color:rgb(242, 170, 170); border-radius:10px; text-transform: uppercase;">{{ $gate_card->status_approval ?? '-' }}</div>
                                        @elseif ($gate_card->status_approval == 'draft')
                                            <div class="badge" style="color: rgba(255, 123, 0, 0.889); background-color:rgb(255, 238, 177); border-radius:10px; text-transform: uppercase;">{{ $gate_card->status_approval ?? '-' }}</div>
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td class="text-center" style="vertical-align: middle;">
                                        <div style="display: flex; gap: 5px;">
                                            <a href="{{ url('/gate-card/show/'.$gate_card->id) }}" class="btn btn-info btn-sm" title="show Gate Card"><i class="fa fa-eye"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-end me-4 mt-4">
                {{ $transaction_gate_card->links() }}
            </div>
        </div>
    </div>
    @push('script')
        <script>
            $('.start_date').change(function(){
                var start_date = $(this).val();
                $('.start_date').val(start_date);
                $('.end_date').val(start_date);
            });

            $('.end_date').change(function(){
                var end_date = $(this).val();
                $('.end_date').val(end_date);
            });
        </script>
    @endpush

@endsection




