@extends('layouts.dashboard')
@section('button')
    <li class="nav-item mr-2">
        {{-- <a href="{{ url('/surat-pengantar/export') }}{{ $_GET?'?'.$_SERVER['QUERY_STRING']: '' }}" class="btn btn-success nav-link" style="color: white"><i class="far fa-file-excel mr-1"></i>Export</a> --}}
    </li>
@endsection
@section('isi')
    <form action="{{ url('/surat-pengantar') }}" class="mr-2 ml-2">
        <div class="form-row mb-2">
            <div class="col-5">
                <input type="text" class="form-control" name="search" placeholder="Search.." id="search" value="{{ request('search') }}">
            </div>
            <div class="col-3">
                <input type="datetime" class="form-control start_date" name="start_date" placeholder="Start Date" id="start_date" value="{{ request('start_date') }}">
            </div>
            <div class="col-3">
                <input type="datetime" class="form-control end_date" name="end_date" placeholder="End Date" id="end_date" value="{{ request('end_date') }}">
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
                            <th style="min-width: 250px; background-color:rgb(243, 243, 243);" class="text-center">Nama</th>
                            <th style="min-width: 250px; background-color:rgb(243, 243, 243);" class="text-center">Tanggal</th>
                            <th style="min-width: 250px; background-color:rgb(243, 243, 243);" class="text-center">Nomor Surat Pengantar</th>
                            <th style="min-width: 250px; background-color:rgb(243, 243, 243);" class="text-center">Jenis Surat Pengantar</th>
                            <th style="min-width: 250px; background-color:rgb(243, 243, 243);" class="text-center">Tempat Lahir</th>
                            <th style="min-width: 250px; background-color:rgb(243, 243, 243);" class="text-center">Tanggal Lahir</th>
                            <th style="min-width: 250px; background-color:rgb(243, 243, 243);" class="text-center">Bangsa</th>
                            <th style="min-width: 250px; background-color:rgb(243, 243, 243);" class="text-center">Agama</th>
                            <th style="min-width: 250px; background-color:rgb(243, 243, 243);" class="text-center">Nomor KTP</th>
                            <th style="min-width: 250px; background-color:rgb(243, 243, 243);" class="text-center">Status Perkawinan</th>
                            <th style="min-width: 250px; background-color:rgb(243, 243, 243);" class="text-center">Pekerjaan</th>
                            <th style="min-width: 250px; background-color:rgb(243, 243, 243);" class="text-center">Alamat</th>
                            <th style="background-color:rgb(243, 243, 243);" class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($surat_pengantars) <= 0)
                            <tr>
                                <td colspan="11" class="text-center">Tidak Ada Data</td>
                            </tr>
                        @else
                            @foreach ($surat_pengantars as $key => $surat_pengantar)
                                <tr>
                                    <td class="text-center" style="position: sticky; left: 0; background-color: rgb(235, 235, 235); z-index: 1; vertical-align: middle;">{{ ($surat_pengantars->currentpage() - 1) * $surat_pengantars->perpage() + $key + 1 }}.</td>
                                    <td class="text-center" style="vertical-align: middle;">{{ $surat_pengantar->keluarga->nama_keluarga ?? '-' }}</td>
                                    <td class="text-center" style="vertical-align: middle;">{{ $surat_pengantar->date ?? '-' }}</td>
                                    <td class="text-center" style="vertical-align: middle;">{{ $surat_pengantar->surat_pengantar_number ?? '-' }}</td>
                                    <td class="text-center" style="vertical-align: middle;">{{ $surat_pengantar->letter_type ?? '-' }} {{ $surat_pengantar->letter_type_text ? ': ' . $surat_pengantar->letter_type_text : '' }}</td>
                                    <td class="text-center" style="vertical-align: middle;">{{ $surat_pengantar->born_place ?? '-' }}</td>
                                    <td class="text-center" style="vertical-align: middle;">{{ $surat_pengantar->born_date ?? '-' }}</td>
                                    <td class="text-center" style="vertical-align: middle;">{{ $surat_pengantar->nation ?? '-' }}</td>
                                    <td class="text-center" style="vertical-align: middle;">{{ $surat_pengantar->religion ?? '-' }}</td>
                                    <td class="text-center" style="vertical-align: middle;">{{ $surat_pengantar->ktp_number ?? '-' }}</td>
                                    <td class="text-center" style="vertical-align: middle;">{{ $surat_pengantar->married_status ?? '-' }}</td>
                                    <td class="text-center" style="vertical-align: middle;">{{ $surat_pengantar->job ?? '-' }}</td>
                                    <td class="text-center" style="vertical-align: middle;">{{ $surat_pengantar->alamat ?? '-' }}</td>
                                    <td class="text-center" style="vertical-align: middle;">
                                        <div style="display: flex; gap: 5px;">
                                            <a target="_blank" href="{{ url('/surat-pengantar/print/'.$surat_pengantar->id) }}" class="btn btn-primary btn-sm" title="Download PDF"><i class="fa fa-file-pdf"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-end me-4 mt-4">
                {{ $surat_pengantars->links() }}
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
        </script>
    @endpush
@endsection




