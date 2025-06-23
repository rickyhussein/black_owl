@extends('layouts.dashboard')
@section('button')
    <li class="nav-item mr-2">
        <a href="{{ url('/infrastruktur') }}" class="btn nav-link" style="color: red; border:1px solid red; background-color:white; ">Back</a>
    </li>
@endsection
@section('isi')
    <div class="container-fluid">
        <div class="card col-lg-12">
            <div class="mt-4 p-4">
                <form method="post" action="{{ url('/infrastruktur/store') }}" enctype="multipart/form-data">
                    @csrf
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
                            <label for="title">Judul</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}">
                            @error('title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <br>

                    <div class="form-row">
                        <div class="col">
                            <label for="description">Deskripsi</label>
                            <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" cols="30" rows="5"> {{ old('description') }}</textarea>
                            @error('description')
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
                                        <input type="file" class="form-control borderi infrastruktur_file_path" id="infrastruktur_file_path" name="infrastruktur_file_path[]" multiple>
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
        <script>
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
