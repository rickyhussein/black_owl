@extends('layouts.dashboard')
@section('button')
    <li class="nav-item mr-2">
        <a href="{{ url('/pengeluaran') }}" class="btn nav-link" style="color: red; border:1px solid red; background-color:white; ">Back</a>
    </li>
@endsection
@section('isi')
    <div class="container-fluid">
        <div class="card col-lg-12">
            <div class="mt-4 p-4">
                <form method="post" action="{{ url('/pengeluaran/store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="col">
                            <label for="type">Jenis Transaksi</label>
                            <select name="type" id="type" class="form-control @error('type') is-invalid @enderror selectpicker" data-live-search="true">
                                <option value="">-- Pilih Jenis Transaksi --</option>
                                <option value="Gaji Security" {{ 'Gaji Security' == old('type') ? 'selected="selected"' : '' }}>Gaji Security</option>
                                <option value="Pembayaran Vendor" {{ 'Pembayaran Vendor' == old('type') ? 'selected="selected"' : '' }}>Pembayaran Vendor</option>
                                <option value="Operasional" {{ 'Operasional' == old('type') ? 'selected="selected"' : '' }}>Operasional</option>
                                <option value="Biaya & Aset" {{ 'Biaya & Aset' == old('type') ? 'selected="selected"' : '' }}>Biaya & Aset</option>
                                <option value="Lainnya" {{ 'Lainnya' == old('type') ? 'selected="selected"' : '' }}>Lainnya</option>
                            </select>
                            @error('type')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="col">
                            <label for="date">Tanggal</label>
                            <input type="datetime" class="form-control @error('date') is-invalid @enderror" id="date" name="date" value="{{ old('date', date('Y-m-d')) }}">
                            @error('date')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <br>

                    <div class="form-row">
                        <div class="col">
                            <label for="nominal">Nominal</label>
                            <input type="text" class="form-control money @error('nominal') is-invalid @enderror" id="nominal" name="nominal" value="{{ old('nominal') }}">
                            @error('nominal')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col">
                            <label for="status" class="form-label">Status</label>
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
                    </div>
                    <br>

                    <div class="form-row">
                        <div class="col">
                            <label for="notes">Keterangan</label>
                            <textarea name="notes" id="notes" class="form-control @error('notes') is-invalid @enderror" cols="30" rows="5"> {{ old('notes') }}</textarea>
                            @error('notes')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <br>

                    <div class="table-responsive mb-3">
                        <table class="table table-striped" id="tablemultiple" style="font-size:12px">
                            <thead>
                                <tr>
                                    <th style="background-color:rgb(243, 243, 243);" class="text-center">File</th>
                                    <th class="text-center" style="background-color:rgb(243, 243, 243);">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr id="multiple0">
                                    <td style="vertical-align: middle;">
                                        <input type="file" class="form-control borderi pengeluaran_file_path" id="pengeluaran_file_path" name="pengeluaran_file_path[]" multiple>
                                    </td>

                                    <td class="text-center" style="vertical-align: middle;">
                                        <a class="btn btn-sm btn-danger delete"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <a id="add_row" class="btn btn-sm btn-success float-right mt-3">+ Tambah</a>
                    </div>
                    <br>

                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
            </div>
        </div>
    </div>

    @push('script')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
        <script>
            $('.money').mask('000,000,000,000,000', {
                reverse: true
            });

            var row_number = 1;
            var temp_row_number = row_number-1;
            $("#add_row").click(function(e) {
                e.preventDefault();
                var new_row_number = row_number - 1;
                var table = document.getElementById("tablemultiple");
                var tbodyRowCount = table.tBodies[0].rows.length;
                new_row = $('#tablemultiple tbody tr:last').clone();
                new_row.find("input").val("").end();
                $('#tablemultiple').append(new_row);
                $('#tablemultiple tbody tr:last').attr('id','multiple'+(tbodyRowCount));
                row_number++;
                temp_row_number = row_number - 1;
            });

            $('body').on('click', '.delete', function (event) {
                var table = document.getElementById("tablemultiple");
                var tbodyRowCount = table.tBodies[0].rows.length;
                if (tbodyRowCount <= 1) {
                    alert('Cannot delete if only 1 row!');
                } else {
                    if (confirm('Are you sure you want to delete?')) {
                        $(this).closest('tr').remove();
                    }
                }
            });
        </script>
    @endpush
@endsection
