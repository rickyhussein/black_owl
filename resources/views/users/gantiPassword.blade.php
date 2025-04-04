@extends('layouts.app')
@section('back')
    <a href="{{ url('/dashboard-user') }}" class="back-btn"> <i class="icon-left"></i> </a>
@endsection
@section('container')
    <div id="app-wrap" class="mt-4">
        <div class="bill-content">
            <div class="tf-container ms-4 me-4">
                <div class="card-secton transfer-section mt-2">
                    <div class="tf-container">
                        <div class="tf-balance-box" style="background-color: rgb(207, 207, 207);">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="inner-left d-flex justify-content-between align-items-center">
                                    @if($user->foto == null)
                                        <img src="{{ url('assets/img/foto_default.jpg') }}" alt="image">
                                    @else
                                        <img src="{{ url('/storage/'.$user->foto) }}" alt="image">
                                    @endif
                                    <p class="fw_7 on_surface_color">{{ $user->name }}</p>
                                </div>
                                <p class="fw_7 on_surface_color">{{ $user->alamat }}</p>
                            </div>
                        </div>
                        <div class="tf-spacing-20"></div>
                        <form method="post" class="tf-form" action="{{ url('/ganti-password/update/'.$user->id) }}">
                            @method('PUT')
                            @csrf
                            <div class="group-input">
                                <label for="password" class="float-left">Password Baru</label>
                                <input type="password" class="@error('password') is-invalid @enderror" id="password" name="password">
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="group-input">
                                <label for="password_confirmation" class="float-left">Konfirmasi Password</label>
                                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation">
                                @error('password_confirmation')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <button type="submit" class="tf-btn accent large">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
        <script>
            $('.select2').select2();
            var row_number = 1;
            var temp_row_number = row_number-1;
            $("#add_row").click(function(e) {
                e.preventDefault();
                var new_row_number = row_number - 1;
                var table = document.getElementById("tablemultiple");
                var tbodyRowCount = table.tBodies[0].rows.length;
                new_row = $('#tablemultiple tbody tr:last').clone();
                new_row.find("input").val("").end();
                new_row.find("select").val("").end();
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
