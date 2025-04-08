@extends('layouts.dashboard')
@section('button')
    <li class="nav-item mr-2">
        <a href="{{ url('/ipkl') }}" class="btn nav-link" style="color: red; border:1px solid red; background-color:white; ">Back</a>
    </li>
@endsection
@section('isi')
    <div class="container-fluid">
        <div class="card col-lg-12">
            <div class="mt-4 p-4">
                <form method="post" action="{{ url('/pengeluaran/update/'.$pengeluaran->id) }}" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="form-row">
                        <div class="col">
                            <label for="type">Jenis Transaksi</label>
                            <select name="type" id="type" class="form-control @error('type') is-invalid @enderror selectpicker" data-live-search="true">
                                <option value="">-- Pilih Jenis Transaksi --</option>
                                <option value="Gaji Security" {{ 'Gaji Security' == old('type', $pengeluaran->type) ? 'selected="selected"' : '' }}>Gaji Security</option>
                                <option value="Pembayaran Vendor" {{ 'Pembayaran Vendor' == old('type', $pengeluaran->type) ? 'selected="selected"' : '' }}>Pembayaran Vendor</option>
                                <option value="Operasional" {{ 'Operasional' == old('type', $pengeluaran->type) ? 'selected="selected"' : '' }}>Operasional</option>
                                <option value="Biaya & Aset" {{ 'Biaya & Aset' == old('type', $pengeluaran->type) ? 'selected="selected"' : '' }}>Biaya & Aset</option>
                                <option value="Lainnya" {{ 'Lainnya' == request('type') ? 'selected="selected"' : '' }}>Lainnya</option>
                            </select>
                            @error('type')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="col">
                            <label for="date">Tanggal</label>
                            <input type="datetime" class="form-control @error('date') is-invalid @enderror" id="date" name="date" value="{{ old('date', $pengeluaran->date) }}">
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
                            <input nominal="text" class="form-control money @error('nominal') is-invalid @enderror" id="nominal" name="nominal" value="{{ old('nominal', $pengeluaran->nominal) }}">
                            @error('nominal')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col">
                            <label for="file_transaction_path" class="form-label">
                                File
                                @if ($pengeluaran->file_transaction_path)
                                    <a class="badge ml-2" style="color: rgb(21, 47, 118); background-color:rgba(192, 218, 254, 0.889); border-radius:10px;" target="_blank" href="{{ url('/storage/'.$pengeluaran->file_transaction_path) }}"><i class="fa fa-download mr-1"></i> {{ $pengeluaran->file_transaction_name }}</a>
                                @endif
                            </label>
                            <input class="form-control @error('file_transaction_path') is-invalid @enderror" type="file" id="file_transaction_path" name="file_transaction_path">
                            @error('file_transaction_path')
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
                            <textarea name="notes" id="notes" class="form-control @error('notes') is-invalid @enderror" cols="30" rows="5"> {{ old('notes', $pengeluaran->notes) }}</textarea>
                            @error('notes')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
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
        </script>
    @endpush
@endsection
