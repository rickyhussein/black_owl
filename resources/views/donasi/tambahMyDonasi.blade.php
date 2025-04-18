@extends('layouts.app')
@section('back')
    <a href="{{ url('/my-donasi') }}" class="back-btn"> <i class="icon-left"></i> </a>
@endsection
@section('container')
    <form class="tf-form" action="{{ url('/my-donasi/store') }}" enctype="multipart/form-data" method="POST">
        <div id="app-wrap" class="mt-4">
            <div class="bill-content">
                <div class="tf-container ms-4 me-4">
                    <div class="card-secton transfer-section mt-2">
                        <div class="tf-container">
                            @csrf

                            <div class="group-input">
                                <label for="date">Tanggal</label>
                                <input type="text" class="@error('date') is-invalid @enderror" id="date" name="date" value="{{ old('date', date('Y-m-d')) }}" readonly>
                                @error('date')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="group-input">
                                <label for="type" style="z-index: 1000">Jenis Donasi</label>
                                <select name="type" id="type" class="@error('type') is-invalid @enderror select2" data-live-search="true">
                                    <option value="">-- Pilih Jenis Donasi --</option>
                                    <option value="Donasi Fasum" {{ 'Donasi Fasum' == old('type') ? 'selected="selected"' : '' }}>Donasi Fasum</option>
                                    <option value="Donasi Umum" {{ 'Donasi Umum' == old('type') ? 'selected="selected"' : '' }}>Donasi Umum</option>
                                    <option value="Donasi Lainnya" {{ 'Donasi Lainnya' == old('type') ? 'selected="selected"' : '' }}>Donasi Lainnya</option>
                                </select>
                                @error('type')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="group-input">
                                <label for="payment_source" style="z-index: 1000">Jenis Pembayaran</label>
                                <select name="payment_source" id="payment_source" class="@error('payment_source') is-invalid @enderror select2" data-live-search="true">
                                    <option value="">-- Pilih Jenis Pembayaran --</option>
                                    <option value="midtrans" {{ 'midtrans' == old('payment_source') ? 'selected="selected"' : '' }}>midtrans</option>
                                    <option value="Bank Transfer (Perlu Konfirmasi Pembayaran Manual)" {{ 'Bank Transfer (Perlu Konfirmasi Pembayaran Manual)' == old('payment_source') ? 'selected="selected"' : '' }}>Bank Transfer (Perlu Konfirmasi Pembayaran Manual)</option>
                                </select>
                                @error('type')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="group-input">
                                <label for="nominal">Nominal Donasi</label>
                                <input type="text" class="money @error('nominal') is-invalid @enderror" id="nominal" name="nominal" value="{{ old('nominal') }}">
                                @error('nominal')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="group-input">
                                <label for="notes">Keterangan</label>
                                <textarea name="notes" id="notes" class="@error('notes') is-invalid @enderror" cols="30" rows="5"> {{ old('notes') }}</textarea>
                                @error('notes')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div id="fileContainer" style="margin-top: -15px">
                                Bukti Transaksi (Jika Sudah Transfer)
                                <div class="group-input">
                                    <input class="form-control @error('file_transaction_path') is-invalid @enderror" type="file" id="file_transaction_path" name="file_transaction_path">
                                    @error('file_transaction_path')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="bottom-navigation-bar st2 bottom-btn-fixed" style="bottom:80px">
            <div class="tf-container">
                <button type="submit" class="tf-btn accent large">Save</button>
            </div>
        </div>

    </form>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

    @push('script')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
        <script>
            $('.money').mask('000,000,000,000,000', {
                reverse: true
            });

            $('.select2').select2();

            let payment_source = $('#payment_source').val();
            if (payment_source == 'Bank Transfer (Perlu Konfirmasi Pembayaran Manual)') {
                $('#fileContainer').show();
            } else {
                $('#fileContainer').hide();
            }

            $('body').on('change', '#payment_source', function (event) {
                let payment_source = $('#payment_source').val();
                if (payment_source == 'Bank Transfer (Perlu Konfirmasi Pembayaran Manual)') {
                    $('#fileContainer').show();
                } else {
                    $('#fileContainer').hide();
                }
            });
        </script>
    @endpush
@endsection
