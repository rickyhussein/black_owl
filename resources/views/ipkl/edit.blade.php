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
                <form method="post" action="{{ url('/ipkl/update/'.$ipkl->id) }}" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="form-row">
                        <div class="col">
                            <label for="user_id">Nama / Alamat</label>
                            <select name="user_id" id="user_id" class="form-control @error('user_id') is-invalid @enderror selectpicker" data-live-search="true">
                                <option value="">-- Pilih --</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}" {{ $user->id == old('user_id', $ipkl->user_id) ? 'selected="selected"' : '' }}>{{ $user->alamat }} - {{ $user->name }} - {{ $user->status }}</option>
                                @endforeach
                            </select>
                            @error('user_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <br>

                    <div class="form-row">
                        <div class="col">
                            <label for="type">Jenis Transaksi</label>
                            <input type="text" class="form-control @error('type') is-invalid @enderror" id="type" name="type" value="{{ old('type', $ipkl->type) }}" readonly>
                            @error('type')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col">
                            <label for="nominal">Nominal Harga</label>
                            <input nominal="text" class="form-control money @error('nominal') is-invalid @enderror" id="nominal" name="nominal" value="{{ old('nominal', $ipkl->nominal) }}">
                            @error('nominal')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <br>

                    <div class="form-row">
                        <div class="col">
                            <label for="date">Tanggal</label>
                            <input type="datetime" class="form-control @error('date') is-invalid @enderror" id="date" name="date" value="{{ old('date', $ipkl->date) }}">
                            @error('date')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col">
                            <label for="expired">Expired Days</label>
                            <input type="integer" class="form-control @error('expired') is-invalid @enderror" id="expired" name="expired" value="{{ old('expired', $ipkl->expired) }}">
                            @error('expired')
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
                            <textarea name="notes" id="notes" class="form-control @error('notes') is-invalid @enderror" cols="30" rows="5"> {{ old('notes', $ipkl->notes) }}</textarea>
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

            var select_all = $('#select_all').val();
            $('#select_all').prop('checked', select_all == "1");

            $('#select_all').change(function () {
                if ($(this).is(':checked')) {
                    $('#user_id option').prop('selected', true);
                    $('#select_all').val(1)
                } else {
                    $('#user_id option').prop('selected', false);
                    $('#select_all').val(null)
                }
                $('#user_id').trigger('change');
            });
        </script>
    @endpush
@endsection
