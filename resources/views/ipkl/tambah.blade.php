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
                <form method="post" action="{{ url('/ipkl/store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="col">
                            <label for="user_id">Nama / Alamat</label>
                            <div class="row mr-3 ml-3">
                                <div class="col-3">
                                    <input type="checkbox" name="select_all" id="select_all" class="form-check-input" value="{{ old('select_all') }}">
                                    <label for="select_all" class="form-check-label">Pilih Semua</label>
                                </div>

                                @foreach ($status as $stat)
                                    <div class="col-3">
                                        <input type="checkbox" name="{{ $stat->status }}" id="{{ $stat->status }}" class="form-check-input" value="{{ old($stat->status) }}">
                                        <label for="{{ $stat->status }}" class="form-check-label">{{ $stat->status }}</label>
                                    </div>
                                @endforeach
                            </div>
                            <select class="form-control selectpicker @error('user_id') is-invalid @enderror" name="user_id[]" id="user_id" multiple data-live-search="true">
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}" {{ (is_array(old('user_id')) && in_array($user->id, old('user_id'))) ? 'selected' : '' }}>
                                        {{ $user->alamat }} - {{ $user->name }} - {{ $user->status }}
                                    </option>
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
                            <input type="text" class="form-control @error('type') is-invalid @enderror" id="type" name="type" value="{{ old('type', 'IPKL') }}" readonly>
                            @error('type')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col">
                            <label for="nominal">Nominal Harga</label>
                            <input nominal="text" class="form-control money @error('nominal') is-invalid @enderror" id="nominal" name="nominal" value="{{ old('nominal') }}">
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
                            <input type="datetime" class="form-control @error('date') is-invalid @enderror" id="date" name="date" value="{{ old('date', date('Y-m-d')) }}">
                            @error('date')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col">
                            <label for="expired">Expired Days</label>
                            <input type="number" class="form-control @error('expired') is-invalid @enderror" id="expired" name="expired" value="{{ old('expired') }}">
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
                            <textarea name="notes" id="notes" class="form-control @error('notes') is-invalid @enderror" cols="30" rows="5"> {{ old('notes') }}</textarea>
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

            $('input[type="checkbox"][name!="select_all"]').change(function () {
                let selectedStatuses = [];

                $('input[type="checkbox"][name!="select_all"]:checked').each(function () {
                    selectedStatuses.push($(this).attr('name'));
                });

                $('#user_id option').each(function () {
                    let userStatus = $(this).text().split(' - ').pop().trim();
                    $(this).prop('selected', selectedStatuses.includes(userStatus));
                });

                $('#user_id').trigger('change');
            });
        </script>
    @endpush
@endsection
