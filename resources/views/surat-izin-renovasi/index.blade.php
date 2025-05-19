@extends('layouts.dashboard')
@section('button')
    <li class="nav-item mr-2">
        {{-- <a href="{{ url('/surat-izin-renovasi/export') }}{{ $_GET?'?'.$_SERVER['QUERY_STRING']: '' }}" class="btn btn-success nav-link" style="color: white"><i class="far fa-file-excel mr-1"></i>Export</a> --}}
    </li>
@endsection
@section('isi')
    <form action="{{ url('/surat-izin-renovasi') }}" class="mr-2 ml-2">
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
                            <th style="min-width: 250px; background-color:rgb(243, 243, 243);" class="text-center">Alamat</th>
                            <th style="min-width: 100px; background-color:rgb(243, 243, 243);" class="text-center">RT</th>
                            <th style="min-width: 100px; background-color:rgb(243, 243, 243);" class="text-center">RW</th>
                            <th style="min-width: 250px; background-color:rgb(243, 243, 243);" class="text-center">Nomor HP</th>
                            <th style="min-width: 250px; background-color:rgb(243, 243, 243);" class="text-center">Email</th>
                            <th style="min-width: 250px; background-color:rgb(243, 243, 243);" class="text-center">Jenis Renovasi</th>
                            <th style="min-width: 250px; background-color:rgb(243, 243, 243);" class="text-center">Luas Area</th>
                            <th style="min-width: 250px; background-color:rgb(243, 243, 243);" class="text-center">Tanggal Mulai</th>
                            <th style="min-width: 250px; background-color:rgb(243, 243, 243);" class="text-center">Tanggal Selesai</th>
                            <th style="min-width: 250px; background-color:rgb(243, 243, 243);" class="text-center">Kontraktor / Pelaksana</th>
                            <th style="min-width: 250px; background-color:rgb(243, 243, 243);" class="text-center">Nama Perusahaan</th>
                            <th style="min-width: 250px; background-color:rgb(243, 243, 243);" class="text-center">Nomor Telepon Perusahaan</th>
                            <th style="min-width: 350px; background-color:rgb(243, 243, 243);" class="text-center">Dokumen Pendukung</th>
                            <th style="background-color:rgb(243, 243, 243);" class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($surat_izin_renovasis) <= 0)
                            <tr>
                                <td colspan="11" class="text-center">Tidak Ada Data</td>
                            </tr>
                        @else
                            @foreach ($surat_izin_renovasis as $key => $surat_izin_renovasi)
                                <tr>
                                    <td class="text-center" style="position: sticky; left: 0; background-color: rgb(235, 235, 235); z-index: 1; vertical-align: middle;">{{ ($surat_izin_renovasis->currentpage() - 1) * $surat_izin_renovasis->perpage() + $key + 1 }}.</td>
                                    <td class="text-center" style="vertical-align: middle;">{{ $surat_izin_renovasi->user->name ?? '-' }}</td>
                                    <td class="text-center" style="vertical-align: middle;">{{ $surat_izin_renovasi->date ?? '-' }}</td>
                                    <td class="text-center" style="vertical-align: middle;">{{ $surat_izin_renovasi->user->alamat ?? '-' }}</td>
                                    <td class="text-center" style="vertical-align: middle;">{{ $surat_izin_renovasi->user->rt ?? '-' }}</td>
                                    <td class="text-center" style="vertical-align: middle;">{{ $surat_izin_renovasi->user->rw ?? '-' }}</td>
                                    <td class="text-center" style="vertical-align: middle;">{{ $surat_izin_renovasi->user->no_hp ?? '-' }}</td>
                                    <td class="text-center" style="vertical-align: middle;">{{ $surat_izin_renovasi->user->email ?? '-' }}</td>
                                    <td class="text-center" style="vertical-align: middle;">{{ $surat_izin_renovasi->type ?? '-' }} {{ $surat_izin_renovasi->type_text ? ': ' . $surat_izin_renovasi->type_text : '' }}</td>
                                    <td class="text-center" style="vertical-align: middle;">{{ $surat_izin_renovasi->size ?? '-' }}</td>
                                    <td class="text-center" style="vertical-align: middle;">{{ $surat_izin_renovasi->start_date ?? '-' }}</td>
                                    <td class="text-center" style="vertical-align: middle;">{{ $surat_izin_renovasi->end_date ?? '-' }}</td>
                                    <td class="text-center" style="vertical-align: middle;">{{ $surat_izin_renovasi->contractor ?? '-' }}</td>
                                    <td class="text-center" style="vertical-align: middle;">{{ $surat_izin_renovasi->company_name ?? '-' }}</td>
                                    <td class="text-center" style="vertical-align: middle;">{{ $surat_izin_renovasi->company_phone ?? '-' }}</td>
                                    <td style="vertical-align: middle;">
                                        <div class="form-check">
                                            <input class="form-check-input @error('fotokopi_ktp_pemohon') is-invalid @enderror" type="checkbox" id="fotokopi_ktp_pemohon" name="fotokopi_ktp_pemohon" value="{{ old('fotokopi_ktp_pemohon', $surat_izin_renovasi->fotokopi_ktp_pemohon) }}">
                                            <label class="form-check-label" for="fotokopi_ktp_pemohon">
                                                Fotokopi KTP Pemohon
                                            </label>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input @error('gambar_design_renovasi') is-invalid @enderror" type="checkbox" id="gambar_design_renovasi" name="gambar_design_renovasi" value="{{ old('gambar_design_renovasi', $surat_izin_renovasi->gambar_design_renovasi) }}">
                                            <label class="form-check-label" for="gambar_design_renovasi">
                                                Gambar Design Renovasi
                                            </label>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input @error('surat_persetujuan_tetangga_terdekat') is-invalid @enderror" type="checkbox" id="surat_persetujuan_tetangga_terdekat" name="surat_persetujuan_tetangga_terdekat" value="{{ old('surat_persetujuan_tetangga_terdekat', $surat_izin_renovasi->surat_persetujuan_tetangga_terdekat) }}">
                                            <label class="form-check-label" for="surat_persetujuan_tetangga_terdekat">
                                                Surat Persetujuan Tetangga Terdekat
                                            </label>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input @error('dokumen_lainnya') is-invalid @enderror" type="checkbox" id="dokumen_lainnya" name="dokumen_lainnya" value="{{ old('dokumen_lainnya', $surat_izin_renovasi->dokumen_lainnya) }}">
                                            <label class="form-check-label" for="dokumen_lainnya">
                                                Dokumen Lainnya {{ $surat_izin_renovasi->dokumen_text ? ': ' . $surat_izin_renovasi->dokumen_text : '' }}
                                            </label>
                                        </div>
                                    </td>
                                    <td class="text-center" style="vertical-align: middle;">
                                        <center>
                                            <a target="_blank" href="{{ url('/surat-izin-renovasi/print/'.$surat_izin_renovasi->id) }}" class="btn btn-primary btn-sm" title="Download PDF"><i class="fa fa-file-pdf"></i></a>
                                        </center>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-end me-4 mt-4">
                {{ $surat_izin_renovasis->links() }}
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

            $('input[type="checkbox"]').each(function() {
                var isChecked = $(this).val() == 1;
                $(this).prop('checked', isChecked);
            });

            $('body').on('change', 'input[type="checkbox"]', function (event) {
                if(this.checked) {
                    $(this).val(1);
                } else {
                    $(this).val(null);
                }
            });
        </script>
    @endpush
@endsection




