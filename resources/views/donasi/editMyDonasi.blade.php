@extends('layouts.app')
@section('back')
    <a href="{{ url('/my-donasi/show/'.$donasi->id) }}" class="back-btn"> <i class="icon-left"></i> </a>
@endsection
@section('container')
    <form class="tf-form" action="{{ url('/my-donasi/update/'.$donasi->id) }}" enctype="multipart/form-data" method="POST">
        <div id="app-wrap" class="mt-4">
            <div class="bill-content">
                <div class="tf-container ms-4 me-4">
                    <div class="card-secton transfer-section mt-2">
                        <div class="tf-container">
                            @method('PUT')
                            @csrf

                            <div class="group-input">
                                <label for="name">Nama</label>
                                <input type="text" class="@error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $donasi->user->name ?? '') }}" readonly>
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="group-input">
                                <label for="alamat">Alamat</label>
                                <input type="text" class="@error('alamat') is-invalid @enderror" id="alamat" name="alamat" value="{{ old('alamat', $donasi->user->alamat ?? '') }}" readonly>
                                @error('alamat')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="group-input">
                                <label for="status_rumah">Status Rumah</label>
                                <input type="text" class="@error('status_rumah') is-invalid @enderror" id="status_rumah" name="status_rumah" value="{{ old('status_rumah', $donasi->user->status ?? '') }}" readonly>
                                @error('status_rumah')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="group-input">
                                <label for="date">Tanggal</label>
                                <input type="text" class="@error('date') is-invalid @enderror" id="date" name="date" value="{{ old('date', $donasi->date) }}" readonly>
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
                                    <option value="Donasi Fasum" {{ 'Donasi Fasum' == old('type', $donasi->type) ? 'selected="selected"' : '' }}>Donasi Fasum</option>
                                    <option value="Donasi Umum" {{ 'Donasi Umum' == old('type', $donasi->type) ? 'selected="selected"' : '' }}>Donasi Umum</option>
                                    <option value="Donasi Lainnya" {{ 'Donasi Lainnya' == old('type', $donasi->type) ? 'selected="selected"' : '' }}>Donasi Lainnya</option>
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
                                    <option value="midtrans" {{ 'midtrans' == old('payment_source', $donasi->payment_source) ? 'selected="selected"' : '' }}>midtrans</option>
                                    <option value="Bank Transfer (Perlu Konfirmasi Pembayaran Manual)" {{ 'Bank Transfer (Perlu Konfirmasi Pembayaran Manual)' == old('payment_source', $donasi->payment_source) ? 'selected="selected"' : '' }}>Bank Transfer (Perlu Konfirmasi Pembayaran Manual)</option>
                                </select>
                                @error('type')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="group-input">
                                <label for="nominal">Nominal Donasi</label>
                                <input type="text" class="money @error('nominal') is-invalid @enderror" id="nominal" name="nominal" value="{{ old('nominal', $donasi->nominal) }}">
                                @error('nominal')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="group-input">
                                <label for="notes">Keterangan</label>
                                <textarea name="notes" id="notes" class="@error('notes') is-invalid @enderror" cols="30" rows="5"> {{ old('notes', $donasi->notes) }}</textarea>
                                @error('notes')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div id="fileContainer" style="margin-top: -15px">
                                Bukti Pembayaran (Jika Sudah Transfer)

                                <div class="group-input">
                                    <input class="form-control @error('file_transaction_path') is-invalid @enderror" type="file" id="file_transaction_path" name="file_transaction_path">
                                    @error('file_transaction_path')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                    @if ($donasi->file_transaction_path)
                                        <div class="badge clickable mt-1" data-url="{{ url('/storage/'.$donasi->file_transaction_path) }}" style="color: rgb(21, 47, 118); background-color:rgba(192, 218, 254, 0.889); border-radius:10px; cursor: pointer;" target="_blank"><i class="fa fa-download me-1"></i> {{ $donasi->file_transaction_name }}</div>
                                    @endif
                                </div>

                                <div class="alert alert-warning" role="alert">
                                    Silahkan transfer ke rekening ini : <span class="me-1" style="font-weight: bold;">Bank Syariah Indonesia (BSI)</span> Nama Penerima : <span class="me-1" style="font-weight: bold;">Cluster Madrid Nutiara Gading City</span> No. Rekening : <a id="copy"><span style="font-weight: bold;">6868123336</span> <i class="fas fa-copy ms-1"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="bottom-navigation-bar st2 bottom-btn-fixed" style="bottom:65px">
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

            $('#copy').on('click', function(e) {
                e.preventDefault();
                var urlToCopy = "6868123336";
                var tempInput = $('<input>');
                $('body').append(tempInput);
                tempInput.val(urlToCopy).select();
                document.execCommand('copy');
                tempInput.remove();
                Swal.fire({
                    title: "Nomor Rekening Berhasil Dicopy",
                    icon: "success",
                    timer: 1500
                });
            });

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
