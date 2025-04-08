@extends('layouts.dashboard')
@section('button')
    <li class="nav-item mr-2">
        <a href="{{ url('/laporan-ipkl/export') }}{{ $_GET?'?'.$_SERVER['QUERY_STRING']: '' }}" class="btn btn-success nav-link" style="color: white"><i class="far fa-file-excel mr-1"></i>Export</a>
    </li>
@endsection
@section('isi')
    <div class="d-none d-md-block">
        <form action="{{ url('/laporan-ipkl') }}" class="mr-2 ml-2">
            <div class="form-row mb-2">
                <div class="col-4">
                    <input type="text" class="form-control" name="search" placeholder="Nama / Alamat" id="mulai" value="{{ request('search') }}">
                </div>
                <div class="col-2">
                    <select name="rt" id="rt" class="form-control @error('rt') is-invalid @enderror selectpicker" data-live-search="true">
                        <option value="">-- Pilih RT --</option>
                        <option value="001" {{ '001' == request('rt') ? 'selected="selected"' : '' }}>001</option>
                        <option value="002" {{ '002' == request('rt') ? 'selected="selected"' : '' }}>002</option>
                        <option value="003" {{ '003' == request('rt') ? 'selected="selected"' : '' }}>003</option>
                    </select>
                </div>
                <div class="col-2">
                    <select name="status" id="status" class="form-control @error('status') is-invalid @enderror selectpicker" data-live-search="true">
                        <option value="">-- Pilih Status --</option>
                        <option value="Dihuni" {{ 'Dihuni' == request('status') ? 'selected="selected"' : '' }}>Dihuni</option>
                        <option value="Belum dihuni" {{ 'Belum dihuni' == request('status') ? 'selected="selected"' : '' }}>Belum dihuni</option>
                    </select>
                </div>
                <div class="col-2">
                    @php
                        $last= 2020;
                        $now = date('Y');
                    @endphp
                    <select name="year" id="year" class="form-control @error('year') is-invalid @enderror selectpicker" data-live-search="true">
                        <option value="">Year</option>
                        @for ($i = $now; $i >= $last; $i--)
                        <option value="{{ $i }}" {{ $i == request('year') ? 'selected="selected"' : '' }}>{{ $i }}</option>
                        @endfor
                    </select>
                </div>
                <div class="col-2">
                    <button type="submit" id="search" class="btn"><i class="fas fa-search"></i></button>
                </div>
            </div>
        </form>
    </div>

    <div class="d-block d-md-none">
        <button type="button" class="btn btn-secondary btn-sm text-white ml-3 mb-3"  data-toggle="modal" data-target="#exampleModalCenter">
            <i class="fas fa-filter mr-1"></i> Filter
        </button>
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Filter</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ url('/laporan-ipkl') }}">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" name="search" placeholder="Nama / Alamat" id="mulai" value="{{ request('search') }}">
                        </div>
                        <div class="form-group">
                            <select name="rt" id="rt" class="form-control @error('rt') is-invalid @enderror selectpicker" data-live-search="true">
                                <option value="">-- Pilih RT --</option>
                                <option value="001" {{ '001' == request('rt') ? 'selected="selected"' : '' }}>001</option>
                                <option value="002" {{ '002' == request('rt') ? 'selected="selected"' : '' }}>002</option>
                                <option value="003" {{ '003' == request('rt') ? 'selected="selected"' : '' }}>003</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <select name="status" id="status" class="form-control @error('status') is-invalid @enderror selectpicker" data-live-search="true">
                                <option value="">-- Pilih Status --</option>
                                <option value="Dihuni" {{ 'Dihuni' == request('status') ? 'selected="selected"' : '' }}>Dihuni</option>
                                <option value="Belum dihuni" {{ 'Belum dihuni' == request('status') ? 'selected="selected"' : '' }}>Belum dihuni</option>
                            </select>
                        </div>
                        <div class="form-group">
                            @php
                                $last= 2020;
                                $now = date('Y');
                            @endphp
                            <select name="year" id="year" class="form-control @error('year') is-invalid @enderror selectpicker" data-live-search="true">
                                <option value="">Year</option>
                                @for ($i = $now; $i >= $last; $i--)
                                <option value="{{ $i }}" {{ $i == request('year') ? 'selected="selected"' : '' }}>{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-secondary">Search</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="card p-4">
            <div class="table-responsive" style="border-radius: 10px">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center" style="position: sticky; left: 0; background-color: rgb(215, 215, 215); z-index: 2;">No.</th>
                            <th style="min-width: 170px; background-color:rgb(243, 243, 243);" class="text-center">Nama</th>
                            <th style="min-width: 170px; background-color:rgb(243, 243, 243);" class="text-center">Alamat</th>
                            <th style="min-width: 170px; background-color:rgb(243, 243, 243);" class="text-center">RT</th>
                            <th style="min-width: 170px; background-color:rgb(243, 243, 243);" class="text-center">Status</th>
                            <th style="min-width: 170px; background-color:rgb(243, 243, 243);" class="text-center">Januari</th>
                            <th style="min-width: 170px; background-color:rgb(243, 243, 243);" class="text-center">Februari</th>
                            <th style="min-width: 170px; background-color:rgb(243, 243, 243);" class="text-center">Maret</th>
                            <th style="min-width: 170px; background-color:rgb(243, 243, 243);" class="text-center">April</th>
                            <th style="min-width: 170px; background-color:rgb(243, 243, 243);" class="text-center">Mei</th>
                            <th style="min-width: 170px; background-color:rgb(243, 243, 243);" class="text-center">Juni</th>
                            <th style="min-width: 170px; background-color:rgb(243, 243, 243);" class="text-center">Juli</th>
                            <th style="min-width: 170px; background-color:rgb(243, 243, 243);" class="text-center">Agustus</th>
                            <th style="min-width: 170px; background-color:rgb(243, 243, 243);" class="text-center">September</th>
                            <th style="min-width: 170px; background-color:rgb(243, 243, 243);" class="text-center">Oktober</th>
                            <th style="min-width: 170px; background-color:rgb(243, 243, 243);" class="text-center">November</th>
                            <th style="min-width: 170px; background-color:rgb(243, 243, 243);" class="text-center">Desember</th>
                            <th style="min-width: 170px; background-color:rgb(243, 243, 243);" class="text-center">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($users) <= 0)
                            <tr>
                                <td colspan="10" class="text-center">Tidak Ada Data</td>
                            </tr>
                        @else
                            @php
                                $total_total_januari = 0;
                                $total_total_februari = 0;
                                $total_total_maret = 0;
                                $total_total_april = 0;
                                $total_total_mei = 0;
                                $total_total_juni = 0;
                                $total_total_juli = 0;
                                $total_total_agustus = 0;
                                $total_total_september = 0;
                                $total_total_oktober = 0;
                                $total_total_november = 0;
                                $total_total_desember = 0;
                                $total_total = 0;
                            @endphp
                            @foreach ($users as $key => $user)
                                <tr>
                                    @php
                                        $total_januari = $user->getIpkl($user->id, '01', $year);
                                        $total_februari = $user->getIpkl($user->id, '02', $year);
                                        $total_maret = $user->getIpkl($user->id, '03', $year);
                                        $total_april = $user->getIpkl($user->id, '04', $year);
                                        $total_mei = $user->getIpkl($user->id, '05', $year);
                                        $total_juni = $user->getIpkl($user->id, '06', $year);
                                        $total_juli = $user->getIpkl($user->id, '07', $year);
                                        $total_agustus = $user->getIpkl($user->id, '08', $year);
                                        $total_september = $user->getIpkl($user->id, '09', $year);
                                        $total_oktober = $user->getIpkl($user->id, '10', $year);
                                        $total_november = $user->getIpkl($user->id, '11', $year);
                                        $total_desember = $user->getIpkl($user->id, '12', $year);
                                        $total = $total_januari + $total_februari + $total_maret + $total_april + $total_mei + $total_juni + $total_juli + $total_agustus + $total_september + $total_oktober + $total_november + $total_desember;

                                        $total_total_januari += $total_januari;
                                        $total_total_februari += $total_februari;
                                        $total_total_maret += $total_maret;
                                        $total_total_april += $total_april;
                                        $total_total_mei += $total_mei;
                                        $total_total_juni += $total_juni;
                                        $total_total_juli += $total_juli;
                                        $total_total_agustus += $total_agustus;
                                        $total_total_september += $total_september;
                                        $total_total_oktober += $total_oktober;
                                        $total_total_november += $total_november;
                                        $total_total_desember += $total_desember;
                                        $total_total += $total;
                                    @endphp
                                    <td class="text-center" style="position: sticky; left: 0; background-color: rgb(235, 235, 235); z-index: 1; vertical-align: middle;">{{ ($users->currentpage() - 1) * $users->perpage() + $key + 1 }}.</td>
                                    <td class="text-center" style="vertical-align: middle;">{{ $user->name }}</td>
                                    <td class="text-center" style="vertical-align: middle;">{{ $user->alamat ?? '-' }}</td>
                                    <td class="text-center" style="vertical-align: middle;">{{ $user->rt ?? '-' }}</td>
                                    <td class="text-center" style="vertical-align: middle;">{{ $user->status ?? '-' }}</td>
                                    <td class="text-center" style="vertical-align: middle;">Rp {{ number_format($total_januari) }}</td>
                                    <td class="text-center" style="vertical-align: middle;">Rp {{ number_format($total_februari) }}</td>
                                    <td class="text-center" style="vertical-align: middle;">Rp {{ number_format($total_maret) }}</td>
                                    <td class="text-center" style="vertical-align: middle;">Rp {{ number_format($total_april) }}</td>
                                    <td class="text-center" style="vertical-align: middle;">Rp {{ number_format($total_mei) }}</td>
                                    <td class="text-center" style="vertical-align: middle;">Rp {{ number_format($total_juni) }}</td>
                                    <td class="text-center" style="vertical-align: middle;">Rp {{ number_format($total_juli) }}</td>
                                    <td class="text-center" style="vertical-align: middle;">Rp {{ number_format($total_agustus) }}</td>
                                    <td class="text-center" style="vertical-align: middle;">Rp {{ number_format($total_september) }}</td>
                                    <td class="text-center" style="vertical-align: middle;">Rp {{ number_format($total_oktober) }}</td>
                                    <td class="text-center" style="vertical-align: middle;">Rp {{ number_format($total_november) }}</td>
                                    <td class="text-center" style="vertical-align: middle;">Rp {{ number_format($total_desember) }}</td>
                                    <td class="text-center" style="vertical-align: middle;">Rp {{ number_format($total) }}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td class="text-center" style="position: sticky; left: 0; background-color: rgb(215, 215, 215); z-index: 1; vertical-align: middle;"></td>
                                <td class="text-center" style="vertical-align: middle; background-color: rgb(215, 215, 215);" colspan="4">Total</td>
                                <td class="text-center" style="vertical-align: middle; background-color: rgb(235, 235, 235);">Rp {{ number_format($total_total_januari) }}</td>
                                <td class="text-center" style="vertical-align: middle; background-color: rgb(235, 235, 235);">Rp {{ number_format($total_total_februari) }}</td>
                                <td class="text-center" style="vertical-align: middle; background-color: rgb(235, 235, 235);">Rp {{ number_format($total_total_maret) }}</td>
                                <td class="text-center" style="vertical-align: middle; background-color: rgb(235, 235, 235);">Rp {{ number_format($total_total_april) }}</td>
                                <td class="text-center" style="vertical-align: middle; background-color: rgb(235, 235, 235);">Rp {{ number_format($total_total_mei) }}</td>
                                <td class="text-center" style="vertical-align: middle; background-color: rgb(235, 235, 235);">Rp {{ number_format($total_total_juni) }}</td>
                                <td class="text-center" style="vertical-align: middle; background-color: rgb(235, 235, 235);">Rp {{ number_format($total_total_juli) }}</td>
                                <td class="text-center" style="vertical-align: middle; background-color: rgb(235, 235, 235);">Rp {{ number_format($total_total_agustus) }}</td>
                                <td class="text-center" style="vertical-align: middle; background-color: rgb(235, 235, 235);">Rp {{ number_format($total_total_september) }}</td>
                                <td class="text-center" style="vertical-align: middle; background-color: rgb(235, 235, 235);">Rp {{ number_format($total_total_oktober) }}</td>
                                <td class="text-center" style="vertical-align: middle; background-color: rgb(235, 235, 235);">Rp {{ number_format($total_total_november) }}</td>
                                <td class="text-center" style="vertical-align: middle; background-color: rgb(235, 235, 235);">Rp {{ number_format($total_total_desember) }}</td>
                                <td class="text-center" style="vertical-align: middle; background-color: rgb(235, 235, 235);">Rp {{ number_format($total_total) }}</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-end mr-4 mt-4">
                {{ $users->links() }}
            </div>
        </div>
    </div>
@endsection




