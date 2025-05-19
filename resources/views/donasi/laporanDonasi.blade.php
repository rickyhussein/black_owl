@extends('layouts.dashboard')
@section('button')
    <li class="nav-item mr-2">
        <a href="{{ url('/laporan-donasi/export') }}{{ $_GET?'?'.$_SERVER['QUERY_STRING']: '' }}" class="btn btn-success nav-link" style="color: white"><i class="far fa-file-excel mr-1"></i>Export</a>
    </li>
@endsection
@section('isi')
    <div class="d-none d-md-block">
        <form action="{{ url('/laporan-donasi') }}" class="mr-2 ml-2">
            <div class="form-row mb-2">
                <div class="col-4 mb-2">
                    <input type="text" class="form-control" name="search" placeholder="Nama / Alamat" id="mulai" value="{{ request('search') }}">
                </div>
                <div class="col-4 mb-2">
                    <select name="rt" id="rt" class="form-control @error('rt') is-invalid @enderror selectpicker" data-live-search="true">
                        <option value="">-- Pilih RT --</option>
                        <option value="001" {{ '001' == request('rt') ? 'selected="selected"' : '' }}>001</option>
                        <option value="002" {{ '002' == request('rt') ? 'selected="selected"' : '' }}>002</option>
                        <option value="003" {{ '003' == request('rt') ? 'selected="selected"' : '' }}>003</option>
                        <option value="004" {{ '004' == request('rt') ? 'selected="selected"' : '' }}>004</option>
                        <option value="005" {{ '005' == request('rt') ? 'selected="selected"' : '' }}>005</option>
                        <option value="006" {{ '006' == request('rt') ? 'selected="selected"' : '' }}>006</option>
                        <option value="007" {{ '007' == request('rt') ? 'selected="selected"' : '' }}>007</option>
                        <option value="008" {{ '008' == request('rt') ? 'selected="selected"' : '' }}>008</option>
                        <option value="009" {{ '009' == request('rt') ? 'selected="selected"' : '' }}>009</option>
                        <option value="010" {{ '010' == request('rt') ? 'selected="selected"' : '' }}>010</option>
                        <option value="011" {{ '011' == request('rt') ? 'selected="selected"' : '' }}>011</option>
                        <option value="012" {{ '012' == request('rt') ? 'selected="selected"' : '' }}>012</option>
                        <option value="013" {{ '013' == request('rt') ? 'selected="selected"' : '' }}>013</option>
                        <option value="014" {{ '014' == request('rt') ? 'selected="selected"' : '' }}>014</option>
                        <option value="015" {{ '015' == request('rt') ? 'selected="selected"' : '' }}>015</option>
                        <option value="016" {{ '016' == request('rt') ? 'selected="selected"' : '' }}>016</option>
                        <option value="017" {{ '017' == request('rt') ? 'selected="selected"' : '' }}>017</option>
                        <option value="018" {{ '018' == request('rt') ? 'selected="selected"' : '' }}>018</option>
                        <option value="019" {{ '019' == request('rt') ? 'selected="selected"' : '' }}>019</option>
                        <option value="020" {{ '020' == request('rt') ? 'selected="selected"' : '' }}>020</option>
                        <option value="021" {{ '021' == request('rt') ? 'selected="selected"' : '' }}>021</option>
                        <option value="022" {{ '022' == request('rt') ? 'selected="selected"' : '' }}>022</option>
                        <option value="023" {{ '023' == request('rt') ? 'selected="selected"' : '' }}>023</option>
                        <option value="024" {{ '024' == request('rt') ? 'selected="selected"' : '' }}>024</option>
                        <option value="025" {{ '025' == request('rt') ? 'selected="selected"' : '' }}>025</option>
                        <option value="026" {{ '026' == request('rt') ? 'selected="selected"' : '' }}>026</option>
                        <option value="027" {{ '027' == request('rt') ? 'selected="selected"' : '' }}>027</option>
                        <option value="028" {{ '028' == request('rt') ? 'selected="selected"' : '' }}>028</option>
                        <option value="029" {{ '029' == request('rt') ? 'selected="selected"' : '' }}>029</option>
                        <option value="030" {{ '030' == request('rt') ? 'selected="selected"' : '' }}>030</option>
                    </select>
                </div>
                <div class="col-4 mb-2">
                    <select name="rw" id="rw" class="form-control @error('rw') is-invalid @enderror selectpicker" data-live-search="true">
                        <option value="">-- Pilih RW --</option>
                        <option value="001" {{ '001' == request('rw') ? 'selected="selected"' : '' }}>001</option>
                        <option value="002" {{ '002' == request('rw') ? 'selected="selected"' : '' }}>002</option>
                        <option value="003" {{ '003' == request('rw') ? 'selected="selected"' : '' }}>003</option>
                        <option value="004" {{ '004' == request('rw') ? 'selected="selected"' : '' }}>004</option>
                        <option value="005" {{ '005' == request('rw') ? 'selected="selected"' : '' }}>005</option>
                        <option value="006" {{ '006' == request('rw') ? 'selected="selected"' : '' }}>006</option>
                        <option value="007" {{ '007' == request('rw') ? 'selected="selected"' : '' }}>007</option>
                        <option value="008" {{ '008' == request('rw') ? 'selected="selected"' : '' }}>008</option>
                        <option value="009" {{ '009' == request('rw') ? 'selected="selected"' : '' }}>009</option>
                        <option value="010" {{ '010' == request('rw') ? 'selected="selected"' : '' }}>010</option>
                        <option value="011" {{ '011' == request('rw') ? 'selected="selected"' : '' }}>011</option>
                        <option value="012" {{ '012' == request('rw') ? 'selected="selected"' : '' }}>012</option>
                        <option value="013" {{ '013' == request('rw') ? 'selected="selected"' : '' }}>013</option>
                        <option value="014" {{ '014' == request('rw') ? 'selected="selected"' : '' }}>014</option>
                        <option value="015" {{ '015' == request('rw') ? 'selected="selected"' : '' }}>015</option>
                        <option value="016" {{ '016' == request('rw') ? 'selected="selected"' : '' }}>016</option>
                        <option value="017" {{ '017' == request('rw') ? 'selected="selected"' : '' }}>017</option>
                        <option value="018" {{ '018' == request('rw') ? 'selected="selected"' : '' }}>018</option>
                        <option value="019" {{ '019' == request('rw') ? 'selected="selected"' : '' }}>019</option>
                        <option value="020" {{ '020' == request('rw') ? 'selected="selected"' : '' }}>020</option>
                        <option value="021" {{ '021' == request('rw') ? 'selected="selected"' : '' }}>021</option>
                        <option value="022" {{ '022' == request('rw') ? 'selected="selected"' : '' }}>022</option>
                        <option value="023" {{ '023' == request('rw') ? 'selected="selected"' : '' }}>023</option>
                        <option value="024" {{ '024' == request('rw') ? 'selected="selected"' : '' }}>024</option>
                        <option value="025" {{ '025' == request('rw') ? 'selected="selected"' : '' }}>025</option>
                        <option value="026" {{ '026' == request('rw') ? 'selected="selected"' : '' }}>026</option>
                        <option value="027" {{ '027' == request('rw') ? 'selected="selected"' : '' }}>027</option>
                        <option value="028" {{ '028' == request('rw') ? 'selected="selected"' : '' }}>028</option>
                        <option value="029" {{ '029' == request('rw') ? 'selected="selected"' : '' }}>029</option>
                        <option value="030" {{ '030' == request('rw') ? 'selected="selected"' : '' }}>030</option>
                    </select>
                </div>
                <div class="col-4 mb-2">
                    <select name="status" id="status" class="form-control @error('status') is-invalid @enderror selectpicker" data-live-search="true">
                        <option value="">-- Pilih Status --</option>
                        <option value="Dihuni" {{ 'Dihuni' == request('status') ? 'selected="selected"' : '' }}>Dihuni</option>
                        <option value="Belum dihuni" {{ 'Belum dihuni' == request('status') ? 'selected="selected"' : '' }}>Belum dihuni</option>
                    </select>
                </div>
                <div class="col-4 mb-2">
                    <select name="month" id="month" class="form-control month @error('month') is-invalid @enderror selectpicker" data-live-search="true">
                        <option value="">-- Pilih Bulan --</option>
                        <option value="01" {{ '01' == request('month') ? 'selected="selected"' : '' }}>Januari</option>
                        <option value="02" {{ '02' == request('month') ? 'selected="selected"' : '' }}>Februari</option>
                        <option value="03" {{ '03' == request('month') ? 'selected="selected"' : '' }}>Maret</option>
                        <option value="04" {{ '04' == request('month') ? 'selected="selected"' : '' }}>April</option>
                        <option value="05" {{ '05' == request('month') ? 'selected="selected"' : '' }}>Mei</option>
                        <option value="06" {{ '06' == request('month') ? 'selected="selected"' : '' }}>Juni</option>
                        <option value="07" {{ '07' == request('month') ? 'selected="selected"' : '' }}>Juli</option>
                        <option value="08" {{ '08' == request('month') ? 'selected="selected"' : '' }}>Agustus</option>
                        <option value="09" {{ '09' == request('month') ? 'selected="selected"' : '' }}>September</option>
                        <option value="10" {{ '10' == request('month') ? 'selected="selected"' : '' }}>Oktober</option>
                        <option value="11" {{ '11' == request('month') ? 'selected="selected"' : '' }}>November</option>
                        <option value="12" {{ '12' == request('month') ? 'selected="selected"' : '' }}>Desember</option>
                    </select>
                </div>
                <div class="col-3 mb-4">
                    @php
                        $last= 2020;
                        $now = date('Y') + 5;
                    @endphp
                    <select name="year" id="year" class="form-control @error('year') is-invalid @enderror selectpicker" data-live-search="true">
                        <option value="">-- Pilih Tahun -- </option>
                        @for ($i = $now; $i >= $last; $i--)
                            <option value="{{ $i }}" {{ $i == request('year', $year) ? 'selected="selected"' : '' }}>{{ $i }}</option>
                        @endfor
                    </select>
                </div>
                <div class="col-1 mb-4">
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
                <form action="{{ url('/laporan-donasi') }}">
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
                                <option value="004" {{ '004' == request('rt') ? 'selected="selected"' : '' }}>004</option>
                                <option value="005" {{ '005' == request('rt') ? 'selected="selected"' : '' }}>005</option>
                                <option value="006" {{ '006' == request('rt') ? 'selected="selected"' : '' }}>006</option>
                                <option value="007" {{ '007' == request('rt') ? 'selected="selected"' : '' }}>007</option>
                                <option value="008" {{ '008' == request('rt') ? 'selected="selected"' : '' }}>008</option>
                                <option value="009" {{ '009' == request('rt') ? 'selected="selected"' : '' }}>009</option>
                                <option value="010" {{ '010' == request('rt') ? 'selected="selected"' : '' }}>010</option>
                                <option value="011" {{ '011' == request('rt') ? 'selected="selected"' : '' }}>011</option>
                                <option value="012" {{ '012' == request('rt') ? 'selected="selected"' : '' }}>012</option>
                                <option value="013" {{ '013' == request('rt') ? 'selected="selected"' : '' }}>013</option>
                                <option value="014" {{ '014' == request('rt') ? 'selected="selected"' : '' }}>014</option>
                                <option value="015" {{ '015' == request('rt') ? 'selected="selected"' : '' }}>015</option>
                                <option value="016" {{ '016' == request('rt') ? 'selected="selected"' : '' }}>016</option>
                                <option value="017" {{ '017' == request('rt') ? 'selected="selected"' : '' }}>017</option>
                                <option value="018" {{ '018' == request('rt') ? 'selected="selected"' : '' }}>018</option>
                                <option value="019" {{ '019' == request('rt') ? 'selected="selected"' : '' }}>019</option>
                                <option value="020" {{ '020' == request('rt') ? 'selected="selected"' : '' }}>020</option>
                                <option value="021" {{ '021' == request('rt') ? 'selected="selected"' : '' }}>021</option>
                                <option value="022" {{ '022' == request('rt') ? 'selected="selected"' : '' }}>022</option>
                                <option value="023" {{ '023' == request('rt') ? 'selected="selected"' : '' }}>023</option>
                                <option value="024" {{ '024' == request('rt') ? 'selected="selected"' : '' }}>024</option>
                                <option value="025" {{ '025' == request('rt') ? 'selected="selected"' : '' }}>025</option>
                                <option value="026" {{ '026' == request('rt') ? 'selected="selected"' : '' }}>026</option>
                                <option value="027" {{ '027' == request('rt') ? 'selected="selected"' : '' }}>027</option>
                                <option value="028" {{ '028' == request('rt') ? 'selected="selected"' : '' }}>028</option>
                                <option value="029" {{ '029' == request('rt') ? 'selected="selected"' : '' }}>029</option>
                                <option value="030" {{ '030' == request('rt') ? 'selected="selected"' : '' }}>030</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <select name="rw" id="rw" class="form-control @error('rw') is-invalid @enderror selectpicker" data-live-search="true">
                                <option value="">-- Pilih RW --</option>
                                <option value="001" {{ '001' == request('rw') ? 'selected="selected"' : '' }}>001</option>
                                <option value="002" {{ '002' == request('rw') ? 'selected="selected"' : '' }}>002</option>
                                <option value="003" {{ '003' == request('rw') ? 'selected="selected"' : '' }}>003</option>
                                <option value="004" {{ '004' == request('rw') ? 'selected="selected"' : '' }}>004</option>
                                <option value="005" {{ '005' == request('rw') ? 'selected="selected"' : '' }}>005</option>
                                <option value="006" {{ '006' == request('rw') ? 'selected="selected"' : '' }}>006</option>
                                <option value="007" {{ '007' == request('rw') ? 'selected="selected"' : '' }}>007</option>
                                <option value="008" {{ '008' == request('rw') ? 'selected="selected"' : '' }}>008</option>
                                <option value="009" {{ '009' == request('rw') ? 'selected="selected"' : '' }}>009</option>
                                <option value="010" {{ '010' == request('rw') ? 'selected="selected"' : '' }}>010</option>
                                <option value="011" {{ '011' == request('rw') ? 'selected="selected"' : '' }}>011</option>
                                <option value="012" {{ '012' == request('rw') ? 'selected="selected"' : '' }}>012</option>
                                <option value="013" {{ '013' == request('rw') ? 'selected="selected"' : '' }}>013</option>
                                <option value="014" {{ '014' == request('rw') ? 'selected="selected"' : '' }}>014</option>
                                <option value="015" {{ '015' == request('rw') ? 'selected="selected"' : '' }}>015</option>
                                <option value="016" {{ '016' == request('rw') ? 'selected="selected"' : '' }}>016</option>
                                <option value="017" {{ '017' == request('rw') ? 'selected="selected"' : '' }}>017</option>
                                <option value="018" {{ '018' == request('rw') ? 'selected="selected"' : '' }}>018</option>
                                <option value="019" {{ '019' == request('rw') ? 'selected="selected"' : '' }}>019</option>
                                <option value="020" {{ '020' == request('rw') ? 'selected="selected"' : '' }}>020</option>
                                <option value="021" {{ '021' == request('rw') ? 'selected="selected"' : '' }}>021</option>
                                <option value="022" {{ '022' == request('rw') ? 'selected="selected"' : '' }}>022</option>
                                <option value="023" {{ '023' == request('rw') ? 'selected="selected"' : '' }}>023</option>
                                <option value="024" {{ '024' == request('rw') ? 'selected="selected"' : '' }}>024</option>
                                <option value="025" {{ '025' == request('rw') ? 'selected="selected"' : '' }}>025</option>
                                <option value="026" {{ '026' == request('rw') ? 'selected="selected"' : '' }}>026</option>
                                <option value="027" {{ '027' == request('rw') ? 'selected="selected"' : '' }}>027</option>
                                <option value="028" {{ '028' == request('rw') ? 'selected="selected"' : '' }}>028</option>
                                <option value="029" {{ '029' == request('rw') ? 'selected="selected"' : '' }}>029</option>
                                <option value="030" {{ '030' == request('rw') ? 'selected="selected"' : '' }}>030</option>
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
                            <select name="month" id="month" class="form-control month_2 @error('month') is-invalid @enderror selectpicker" data-live-search="true">
                                <option value="">-- Pilih Bulan --</option>
                                <option value="01" {{ '01' == request('month') ? 'selected="selected"' : '' }}>Januari</option>
                                <option value="02" {{ '02' == request('month') ? 'selected="selected"' : '' }}>Februari</option>
                                <option value="03" {{ '03' == request('month') ? 'selected="selected"' : '' }}>Maret</option>
                                <option value="04" {{ '04' == request('month') ? 'selected="selected"' : '' }}>April</option>
                                <option value="05" {{ '05' == request('month') ? 'selected="selected"' : '' }}>Mei</option>
                                <option value="06" {{ '06' == request('month') ? 'selected="selected"' : '' }}>Juni</option>
                                <option value="07" {{ '07' == request('month') ? 'selected="selected"' : '' }}>Juli</option>
                                <option value="08" {{ '08' == request('month') ? 'selected="selected"' : '' }}>Agustus</option>
                                <option value="09" {{ '09' == request('month') ? 'selected="selected"' : '' }}>September</option>
                                <option value="10" {{ '10' == request('month') ? 'selected="selected"' : '' }}>Oktober</option>
                                <option value="11" {{ '11' == request('month') ? 'selected="selected"' : '' }}>November</option>
                                <option value="12" {{ '12' == request('month') ? 'selected="selected"' : '' }}>Desember</option>
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
        <div class="card">
            <div class="card-body">
                <div class="table-responsive" style="border-radius: 10px">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th rowspan="2" class="text-center" style="position: sticky; left: 0; background-color: rgb(215, 215, 215); z-index: 2; vertical-align: middle;">No.</th>
                                <th rowspan="2" style="min-width: 300px; background-color:rgb(243, 243, 243); vertical-align: middle;" class="text-center">Nama</th>
                                <th rowspan="2" style="min-width: 300px; background-color:rgb(243, 243, 243); vertical-align: middle;" class="text-center">Alamat</th>
                                <th rowspan="2" style="min-width: 120px; background-color:rgb(243, 243, 243); vertical-align: middle;" class="text-center">RT</th>
                                <th rowspan="2" style="min-width: 120px; background-color:rgb(243, 243, 243); vertical-align: middle;" class="text-center">RW</th>
                                <th rowspan="2" style="min-width: 300px; background-color:rgb(243, 243, 243); vertical-align: middle;" class="text-center">Status</th>

                                @if (!request('month') || request('month') == '01')
                                    <th style="min-width: 600px; background-color:rgb(243, 243, 243); vertical-align: middle;" class="text-center" colspan="3">Januari</th>
                                @endif

                                @if (!request('month') || request('month') == '02')
                                    <th style="min-width: 600px; background-color:rgb(243, 243, 243); vertical-align: middle;" class="text-center" colspan="3">Februari</th>
                                @endif

                                @if (!request('month') || request('month') == '03')
                                    <th style="min-width: 600px; background-color:rgb(243, 243, 243); vertical-align: middle;" class="text-center" colspan="3">Maret</th>
                                @endif

                                @if (!request('month') || request('month') == '04')
                                    <th style="min-width: 600px; background-color:rgb(243, 243, 243); vertical-align: middle;" class="text-center" colspan="3">April</th>
                                @endif

                                @if (!request('month') || request('month') == '05')
                                    <th style="min-width: 600px; background-color:rgb(243, 243, 243); vertical-align: middle;" class="text-center" colspan="3">Mei</th>
                                @endif

                                @if (!request('month') || request('month') == '06')
                                    <th style="min-width: 600px; background-color:rgb(243, 243, 243); vertical-align: middle;" class="text-center" colspan="3">Juni</th>
                                @endif

                                @if (!request('month') || request('month') == '07')
                                    <th style="min-width: 600px; background-color:rgb(243, 243, 243); vertical-align: middle;" class="text-center" colspan="3">Juli</th>
                                @endif

                                @if (!request('month') || request('month') == '08')
                                    <th style="min-width: 600px; background-color:rgb(243, 243, 243); vertical-align: middle;" class="text-center" colspan="3">Agustus</th>
                                @endif

                                @if (!request('month') || request('month') == '09')
                                    <th style="min-width: 600px; background-color:rgb(243, 243, 243); vertical-align: middle;" class="text-center" colspan="3">September</th>
                                @endif

                                @if (!request('month') || request('month') == '10')
                                    <th style="min-width: 600px; background-color:rgb(243, 243, 243); vertical-align: middle;" class="text-center" colspan="3">Oktober</th>
                                @endif

                                @if (!request('month') || request('month') == '11')
                                    <th style="min-width: 600px; background-color:rgb(243, 243, 243); vertical-align: middle;" class="text-center" colspan="3">November</th>
                                @endif

                                @if (!request('month') || request('month') == '12')
                                    <th style="min-width: 600px; background-color:rgb(243, 243, 243); vertical-align: middle;" class="text-center" colspan="3">Desember</th>
                                @endif

                                <th rowspan="2" style="min-width: 300px; background-color:rgb(243, 243, 243); vertical-align: middle;" class="text-center">Total</th>
                            </tr>

                            <tr>
                                @if (!request('month') || request('month') == '01')
                                    <th style="min-width: 200px; background-color:rgb(243, 243, 243); vertical-align: middle;" class="text-center">Donasi Fasum</th>
                                    <th style="min-width: 200px; background-color:rgb(243, 243, 243); vertical-align: middle;" class="text-center">Donasi Umum</th>
                                    <th style="min-width: 200px; background-color:rgb(243, 243, 243); vertical-align: middle;" class="text-center">Donasi Lainnya</th>
                                @endif

                                @if (!request('month') || request('month') == '02')
                                    <th style="min-width: 200px; background-color:rgb(243, 243, 243); vertical-align: middle;" class="text-center">Donasi Fasum</th>
                                    <th style="min-width: 200px; background-color:rgb(243, 243, 243); vertical-align: middle;" class="text-center">Donasi Umum</th>
                                    <th style="min-width: 200px; background-color:rgb(243, 243, 243); vertical-align: middle;" class="text-center">Donasi Lainnya</th>
                                @endif

                                @if (!request('month') || request('month') == '03')
                                    <th style="min-width: 200px; background-color:rgb(243, 243, 243); vertical-align: middle;" class="text-center">Donasi Fasum</th>
                                    <th style="min-width: 200px; background-color:rgb(243, 243, 243); vertical-align: middle;" class="text-center">Donasi Umum</th>
                                    <th style="min-width: 200px; background-color:rgb(243, 243, 243); vertical-align: middle;" class="text-center">Donasi Lainnya</th>
                                @endif

                                @if (!request('month') || request('month') == '04')
                                    <th style="min-width: 200px; background-color:rgb(243, 243, 243); vertical-align: middle;" class="text-center">Donasi Fasum</th>
                                    <th style="min-width: 200px; background-color:rgb(243, 243, 243); vertical-align: middle;" class="text-center">Donasi Umum</th>
                                    <th style="min-width: 200px; background-color:rgb(243, 243, 243); vertical-align: middle;" class="text-center">Donasi Lainnya</th>
                                @endif

                                @if (!request('month') || request('month') == '05')
                                    <th style="min-width: 200px; background-color:rgb(243, 243, 243); vertical-align: middle;" class="text-center">Donasi Fasum</th>
                                    <th style="min-width: 200px; background-color:rgb(243, 243, 243); vertical-align: middle;" class="text-center">Donasi Umum</th>
                                    <th style="min-width: 200px; background-color:rgb(243, 243, 243); vertical-align: middle;" class="text-center">Donasi Lainnya</th>
                                @endif

                                @if (!request('month') || request('month') == '06')
                                    <th style="min-width: 200px; background-color:rgb(243, 243, 243); vertical-align: middle;" class="text-center">Donasi Fasum</th>
                                    <th style="min-width: 200px; background-color:rgb(243, 243, 243); vertical-align: middle;" class="text-center">Donasi Umum</th>
                                    <th style="min-width: 200px; background-color:rgb(243, 243, 243); vertical-align: middle;" class="text-center">Donasi Lainnya</th>
                                @endif

                                @if (!request('month') || request('month') == '07')
                                    <th style="min-width: 200px; background-color:rgb(243, 243, 243); vertical-align: middle;" class="text-center">Donasi Fasum</th>
                                    <th style="min-width: 200px; background-color:rgb(243, 243, 243); vertical-align: middle;" class="text-center">Donasi Umum</th>
                                    <th style="min-width: 200px; background-color:rgb(243, 243, 243); vertical-align: middle;" class="text-center">Donasi Lainnya</th>
                                @endif

                                @if (!request('month') || request('month') == '08')
                                    <th style="min-width: 200px; background-color:rgb(243, 243, 243); vertical-align: middle;" class="text-center">Donasi Fasum</th>
                                    <th style="min-width: 200px; background-color:rgb(243, 243, 243); vertical-align: middle;" class="text-center">Donasi Umum</th>
                                    <th style="min-width: 200px; background-color:rgb(243, 243, 243); vertical-align: middle;" class="text-center">Donasi Lainnya</th>
                                @endif

                                @if (!request('month') || request('month') == '09')
                                    <th style="min-width: 200px; background-color:rgb(243, 243, 243); vertical-align: middle;" class="text-center">Donasi Fasum</th>
                                    <th style="min-width: 200px; background-color:rgb(243, 243, 243); vertical-align: middle;" class="text-center">Donasi Umum</th>
                                    <th style="min-width: 200px; background-color:rgb(243, 243, 243); vertical-align: middle;" class="text-center">Donasi Lainnya</th>
                                @endif

                                @if (!request('month') || request('month') == '10')
                                    <th style="min-width: 200px; background-color:rgb(243, 243, 243); vertical-align: middle;" class="text-center">Donasi Fasum</th>
                                    <th style="min-width: 200px; background-color:rgb(243, 243, 243); vertical-align: middle;" class="text-center">Donasi Umum</th>
                                    <th style="min-width: 200px; background-color:rgb(243, 243, 243); vertical-align: middle;" class="text-center">Donasi Lainnya</th>
                                @endif

                                @if (!request('month') || request('month') == '11')
                                    <th style="min-width: 200px; background-color:rgb(243, 243, 243); vertical-align: middle;" class="text-center">Donasi Fasum</th>
                                    <th style="min-width: 200px; background-color:rgb(243, 243, 243); vertical-align: middle;" class="text-center">Donasi Umum</th>
                                    <th style="min-width: 200px; background-color:rgb(243, 243, 243); vertical-align: middle;" class="text-center">Donasi Lainnya</th>
                                @endif

                                @if (!request('month') || request('month') == '12')
                                    <th style="min-width: 200px; background-color:rgb(243, 243, 243); vertical-align: middle;" class="text-center">Donasi Fasum</th>
                                    <th style="min-width: 200px; background-color:rgb(243, 243, 243); vertical-align: middle;" class="text-center">Donasi Umum</th>
                                    <th style="min-width: 200px; background-color:rgb(243, 243, 243); vertical-align: middle;" class="text-center">Donasi Lainnya</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($users) <= 0)
                                <tr>
                                    <td colspan="43" class="text-center">Tidak Ada Data</td>
                                </tr>
                            @else
                                @php
                                    $total_total_januari_fasum = 0;
                                    $total_total_januari_umum = 0;
                                    $total_total_januari_lainnya = 0;

                                    $total_total_februari_fasum = 0;
                                    $total_total_februari_umum = 0;
                                    $total_total_februari_lainnya = 0;

                                    $total_total_maret_fasum = 0;
                                    $total_total_maret_umum = 0;
                                    $total_total_maret_lainnya = 0;

                                    $total_total_april_fasum = 0;
                                    $total_total_april_umum = 0;
                                    $total_total_april_lainnya = 0;

                                    $total_total_mei_fasum = 0;
                                    $total_total_mei_umum = 0;
                                    $total_total_mei_lainnya = 0;

                                    $total_total_juni_fasum = 0;
                                    $total_total_juni_umum = 0;
                                    $total_total_juni_lainnya = 0;

                                    $total_total_juli_fasum = 0;
                                    $total_total_juli_umum = 0;
                                    $total_total_juli_lainnya = 0;

                                    $total_total_agustus_fasum = 0;
                                    $total_total_agustus_umum = 0;
                                    $total_total_agustus_lainnya = 0;

                                    $total_total_september_fasum = 0;
                                    $total_total_september_umum = 0;
                                    $total_total_september_lainnya = 0;

                                    $total_total_oktober_fasum = 0;
                                    $total_total_oktober_umum = 0;
                                    $total_total_oktober_lainnya = 0;

                                    $total_total_november_fasum = 0;
                                    $total_total_november_umum = 0;
                                    $total_total_november_lainnya = 0;

                                    $total_total_desember_fasum = 0;
                                    $total_total_desember_umum = 0;
                                    $total_total_desember_lainnya = 0;

                                    $total_total = 0;
                                @endphp
                                @foreach ($users as $key => $user)
                                    <tr>
                                        @php
                                            $total_januari_fasum = $user->getDonasiFasum($user->id, '01', $year);
                                            $total_januari_umum = $user->getDonasiUmum($user->id, '01', $year);
                                            $total_januari_lainnya = $user->getDonasiLainnya($user->id, '01', $year);

                                            $total_februari_fasum = $user->getDonasiFasum($user->id, '02', $year);
                                            $total_februari_umum = $user->getDonasiUmum($user->id, '02', $year);
                                            $total_februari_lainnya = $user->getDonasiLainnya($user->id, '02', $year);

                                            $total_maret_fasum = $user->getDonasiFasum($user->id, '03', $year);
                                            $total_maret_umum = $user->getDonasiUmum($user->id, '03', $year);
                                            $total_maret_lainnya = $user->getDonasiLainnya($user->id, '03', $year);

                                            $total_april_fasum = $user->getDonasiFasum($user->id, '04', $year);
                                            $total_april_umum = $user->getDonasiUmum($user->id, '04', $year);
                                            $total_april_lainnya = $user->getDonasiLainnya($user->id, '04', $year);

                                            $total_mei_fasum = $user->getDonasiFasum($user->id, '05', $year);
                                            $total_mei_umum = $user->getDonasiUmum($user->id, '05', $year);
                                            $total_mei_lainnya = $user->getDonasiLainnya($user->id, '05', $year);

                                            $total_juni_fasum = $user->getDonasiFasum($user->id, '06', $year);
                                            $total_juni_umum = $user->getDonasiUmum($user->id, '06', $year);
                                            $total_juni_lainnya = $user->getDonasiLainnya($user->id, '06', $year);

                                            $total_juli_fasum = $user->getDonasiFasum($user->id, '07', $year);
                                            $total_juli_umum = $user->getDonasiUmum($user->id, '07', $year);
                                            $total_juli_lainnya = $user->getDonasiLainnya($user->id, '07', $year);

                                            $total_agustus_fasum = $user->getDonasiFasum($user->id, '08', $year);
                                            $total_agustus_umum = $user->getDonasiUmum($user->id, '08', $year);
                                            $total_agustus_lainnya = $user->getDonasiLainnya($user->id, '08', $year);

                                            $total_september_fasum = $user->getDonasiFasum($user->id, '09', $year);
                                            $total_september_umum = $user->getDonasiUmum($user->id, '09', $year);
                                            $total_september_lainnya = $user->getDonasiLainnya($user->id, '09', $year);

                                            $total_oktober_fasum = $user->getDonasiFasum($user->id, '10', $year);
                                            $total_oktober_umum = $user->getDonasiUmum($user->id, '10', $year);
                                            $total_oktober_lainnya = $user->getDonasiLainnya($user->id, '10', $year);

                                            $total_november_fasum = $user->getDonasiFasum($user->id, '11', $year);
                                            $total_november_umum = $user->getDonasiUmum($user->id, '11', $year);
                                            $total_november_lainnya = $user->getDonasiLainnya($user->id, '11', $year);

                                            $total_desember_fasum = $user->getDonasiFasum($user->id, '12', $year);
                                            $total_desember_umum = $user->getDonasiUmum($user->id, '12', $year);
                                            $total_desember_lainnya = $user->getDonasiLainnya($user->id, '12', $year);

                                            $total_total_januari_fasum += $total_januari_fasum;
                                            $total_total_januari_umum += $total_januari_umum;
                                            $total_total_januari_lainnya += $total_januari_lainnya;

                                            $total_total_februari_fasum += $total_februari_fasum;
                                            $total_total_februari_umum += $total_februari_umum;
                                            $total_total_februari_lainnya += $total_februari_lainnya;

                                            $total_total_maret_fasum += $total_maret_fasum;
                                            $total_total_maret_umum += $total_maret_umum;
                                            $total_total_maret_lainnya += $total_maret_lainnya;

                                            $total_total_april_fasum += $total_april_fasum;
                                            $total_total_april_umum += $total_april_umum;
                                            $total_total_april_lainnya += $total_april_lainnya;

                                            $total_total_mei_fasum += $total_mei_fasum;
                                            $total_total_mei_umum += $total_mei_umum;
                                            $total_total_mei_lainnya += $total_mei_lainnya;

                                            $total_total_juni_fasum += $total_juni_fasum;
                                            $total_total_juni_umum += $total_juni_umum;
                                            $total_total_juni_lainnya += $total_juni_lainnya;

                                            $total_total_juli_fasum += $total_juli_fasum;
                                            $total_total_juli_umum += $total_juli_umum;
                                            $total_total_juli_lainnya += $total_juli_lainnya;

                                            $total_total_agustus_fasum += $total_agustus_fasum;
                                            $total_total_agustus_umum += $total_agustus_umum;
                                            $total_total_agustus_lainnya += $total_agustus_lainnya;

                                            $total_total_september_fasum += $total_september_fasum;
                                            $total_total_september_umum += $total_september_umum;
                                            $total_total_september_lainnya += $total_september_lainnya;

                                            $total_total_oktober_fasum += $total_oktober_fasum;
                                            $total_total_oktober_umum += $total_oktober_umum;
                                            $total_total_oktober_lainnya += $total_oktober_lainnya;

                                            $total_total_november_fasum += $total_november_fasum;
                                            $total_total_november_umum += $total_november_umum;
                                            $total_total_november_lainnya += $total_november_lainnya;

                                            $total_total_desember_fasum += $total_desember_fasum;
                                            $total_total_desember_umum += $total_desember_umum;
                                            $total_total_desember_lainnya += $total_desember_lainnya;

                                            if (request('month') == '01') {
                                                $total = $total_januari_fasum + $total_januari_umum + $total_januari_lainnya;
                                            } else if (request('month') == '02') {
                                                $total = $total_februari_fasum + $total_februari_umum + $total_februari_lainnya;
                                            } else if (request('month') == '03') {
                                                $total = $total_maret_fasum + $total_maret_umum + $total_maret_lainnya;
                                            } else if (request('month') == '04') {
                                                $total = $total_april_fasum + $total_april_umum + $total_april_lainnya;
                                            } else if (request('month') == '05') {
                                                $total = $total_mei_fasum + $total_mei_umum + $total_mei_lainnya;
                                            } else if (request('month') == '06') {
                                                $total = $total_juni_fasum + $total_juni_umum + $total_juni_lainnya;
                                            } else if (request('month') == '07') {
                                                $total = $total_juli_fasum + $total_juli_umum + $total_juli_lainnya;
                                            } else if (request('month') == '08') {
                                                $total = $total_agustus_fasum + $total_agustus_umum + $total_agustus_lainnya;
                                            } else if (request('month') == '09') {
                                                $total = $total_september_fasum + $total_september_umum + $total_september_lainnya;
                                            } else if (request('month') == '10') {
                                                $total = $total_oktober_fasum + $total_oktober_umum + $total_oktober_lainnya;
                                            } else if (request('month') == '11') {
                                                $total = $total_november_fasum + $total_november_umum + $total_november_lainnya;
                                            } else if (request('month') == '12') {
                                                $total = $total_desember_fasum + $total_desember_umum + $total_desember_lainnya;
                                            } else {
                                                $total = $total_januari_fasum + $total_januari_umum + $total_januari_lainnya + $total_februari_fasum + $total_februari_umum + $total_februari_lainnya + $total_maret_fasum + $total_maret_umum + $total_maret_lainnya + $total_april_fasum + $total_april_umum + $total_april_lainnya + $total_mei_fasum + $total_mei_umum + $total_mei_lainnya + $total_juni_fasum + $total_juni_umum + $total_juni_lainnya + $total_juli_fasum + $total_juli_umum + $total_juli_lainnya + $total_agustus_fasum + $total_agustus_umum + $total_agustus_lainnya + $total_september_fasum + $total_september_umum + $total_september_lainnya + $total_oktober_fasum + $total_oktober_umum + $total_oktober_lainnya + $total_november_fasum + $total_november_umum + $total_november_lainnya + $total_desember_fasum + $total_desember_umum + $total_desember_lainnya;
                                            }


                                            $total_total += $total;
                                        @endphp
                                        <td class="text-center" style="position: sticky; left: 0; background-color: rgb(235, 235, 235); z-index: 1; vertical-align: middle;">{{ ($users->currentpage() - 1) * $users->perpage() + $key + 1 }}.</td>
                                        <td class="text-center" style="vertical-align: middle;">{{ $user->name }}</td>
                                        <td class="text-center" style="vertical-align: middle;">{{ $user->alamat ?? '-' }}</td>
                                        <td class="text-center" style="vertical-align: middle;">{{ $user->rt ?? '-' }}</td>
                                        <td class="text-center" style="vertical-align: middle;">{{ $user->rw ?? '-' }}</td>
                                        <td class="text-center" style="vertical-align: middle;">{{ $user->status ?? '-' }}</td>

                                        @if (!request('month') || request('month') == '01')
                                            <td class="text-center" style="vertical-align: middle;">Rp {{ number_format($total_januari_fasum) }}</td>
                                            <td class="text-center" style="vertical-align: middle;">Rp {{ number_format($total_januari_umum) }}</td>
                                            <td class="text-center" style="vertical-align: middle;">Rp {{ number_format($total_januari_lainnya) }}</td>
                                        @endif

                                        @if (!request('month') || request('month') == '02')
                                            <td class="text-center" style="vertical-align: middle;">Rp {{ number_format($total_februari_fasum) }}</td>
                                            <td class="text-center" style="vertical-align: middle;">Rp {{ number_format($total_februari_umum) }}</td>
                                            <td class="text-center" style="vertical-align: middle;">Rp {{ number_format($total_februari_lainnya) }}</td>
                                        @endif

                                        @if (!request('month') || request('month') == '03')
                                            <td class="text-center" style="vertical-align: middle;">Rp {{ number_format($total_maret_fasum) }}</td>
                                            <td class="text-center" style="vertical-align: middle;">Rp {{ number_format($total_maret_umum) }}</td>
                                            <td class="text-center" style="vertical-align: middle;">Rp {{ number_format($total_maret_lainnya) }}</td>
                                        @endif

                                        @if (!request('month') || request('month') == '04')
                                            <td class="text-center" style="vertical-align: middle;">Rp {{ number_format($total_april_fasum) }}</td>
                                            <td class="text-center" style="vertical-align: middle;">Rp {{ number_format($total_april_umum) }}</td>
                                            <td class="text-center" style="vertical-align: middle;">Rp {{ number_format($total_april_lainnya) }}</td>
                                        @endif

                                        @if (!request('month') || request('month') == '05')
                                            <td class="text-center" style="vertical-align: middle;">Rp {{ number_format($total_mei_fasum) }}</td>
                                            <td class="text-center" style="vertical-align: middle;">Rp {{ number_format($total_mei_umum) }}</td>
                                            <td class="text-center" style="vertical-align: middle;">Rp {{ number_format($total_mei_lainnya) }}</td>
                                        @endif

                                        @if (!request('month') || request('month') == '06')
                                            <td class="text-center" style="vertical-align: middle;">Rp {{ number_format($total_juni_fasum) }}</td>
                                            <td class="text-center" style="vertical-align: middle;">Rp {{ number_format($total_juni_umum) }}</td>
                                            <td class="text-center" style="vertical-align: middle;">Rp {{ number_format($total_juni_lainnya) }}</td>
                                        @endif

                                        @if (!request('month') || request('month') == '07')
                                            <td class="text-center" style="vertical-align: middle;">Rp {{ number_format($total_juli_fasum) }}</td>
                                            <td class="text-center" style="vertical-align: middle;">Rp {{ number_format($total_juli_umum) }}</td>
                                            <td class="text-center" style="vertical-align: middle;">Rp {{ number_format($total_juli_lainnya) }}</td>
                                        @endif

                                        @if (!request('month') || request('month') == '08')
                                            <td class="text-center" style="vertical-align: middle;">Rp {{ number_format($total_agustus_fasum) }}</td>
                                            <td class="text-center" style="vertical-align: middle;">Rp {{ number_format($total_agustus_umum) }}</td>
                                            <td class="text-center" style="vertical-align: middle;">Rp {{ number_format($total_agustus_lainnya) }}</td>
                                        @endif

                                        @if (!request('month') || request('month') == '09')
                                            <td class="text-center" style="vertical-align: middle;">Rp {{ number_format($total_september_fasum) }}</td>
                                            <td class="text-center" style="vertical-align: middle;">Rp {{ number_format($total_september_umum) }}</td>
                                            <td class="text-center" style="vertical-align: middle;">Rp {{ number_format($total_september_lainnya) }}</td>
                                        @endif

                                        @if (!request('month') || request('month') == '10')
                                            <td class="text-center" style="vertical-align: middle;">Rp {{ number_format($total_oktober_fasum) }}</td>
                                            <td class="text-center" style="vertical-align: middle;">Rp {{ number_format($total_oktober_umum) }}</td>
                                            <td class="text-center" style="vertical-align: middle;">Rp {{ number_format($total_oktober_lainnya) }}</td>
                                        @endif

                                        @if (!request('month') || request('month') == '11')
                                            <td class="text-center" style="vertical-align: middle;">Rp {{ number_format($total_november_fasum) }}</td>
                                            <td class="text-center" style="vertical-align: middle;">Rp {{ number_format($total_november_umum) }}</td>
                                            <td class="text-center" style="vertical-align: middle;">Rp {{ number_format($total_november_lainnya) }}</td>
                                        @endif

                                        @if (!request('month') || request('month') == '12')
                                            <td class="text-center" style="vertical-align: middle;">Rp {{ number_format($total_desember_fasum) }}</td>
                                            <td class="text-center" style="vertical-align: middle;">Rp {{ number_format($total_desember_umum) }}</td>
                                            <td class="text-center" style="vertical-align: middle;">Rp {{ number_format($total_desember_lainnya) }}</td>
                                        @endif

                                        <td class="text-center" style="vertical-align: middle;">Rp {{ number_format($total) }}</td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td class="text-center" style="position: sticky; left: 0; background-color: rgb(215, 215, 215); z-index: 1; vertical-align: middle;"></td>
                                    <td class="text-center" colspan="5" style="vertical-align: middle; background-color: rgb(215, 215, 215);">Total</td>

                                    @if (!request('month') || request('month') == '01')
                                        <td class="text-center" style="vertical-align: middle; background-color: rgb(235, 235, 235);">Rp {{ number_format($total_total_januari_fasum) }}</td>
                                        <td class="text-center" style="vertical-align: middle; background-color: rgb(235, 235, 235);">Rp {{ number_format($total_total_januari_umum) }}</td>
                                        <td class="text-center" style="vertical-align: middle; background-color: rgb(235, 235, 235);">Rp {{ number_format($total_total_januari_lainnya) }}</td>
                                    @endif

                                    @if (!request('month') || request('month') == '02')
                                        <td class="text-center" style="vertical-align: middle; background-color: rgb(235, 235, 235);">Rp {{ number_format($total_total_februari_fasum) }}</td>
                                        <td class="text-center" style="vertical-align: middle; background-color: rgb(235, 235, 235);">Rp {{ number_format($total_total_februari_umum) }}</td>
                                        <td class="text-center" style="vertical-align: middle; background-color: rgb(235, 235, 235);">Rp {{ number_format($total_total_februari_lainnya) }}</td>
                                    @endif

                                    @if (!request('month') || request('month') == '03')
                                        <td class="text-center" style="vertical-align: middle; background-color: rgb(235, 235, 235);">Rp {{ number_format($total_total_maret_fasum) }}</td>
                                        <td class="text-center" style="vertical-align: middle; background-color: rgb(235, 235, 235);">Rp {{ number_format($total_total_maret_umum) }}</td>
                                        <td class="text-center" style="vertical-align: middle; background-color: rgb(235, 235, 235);">Rp {{ number_format($total_total_maret_lainnya) }}</td>
                                    @endif

                                    @if (!request('month') || request('month') == '04')
                                        <td class="text-center" style="vertical-align: middle; background-color: rgb(235, 235, 235);">Rp {{ number_format($total_total_april_fasum) }}</td>
                                        <td class="text-center" style="vertical-align: middle; background-color: rgb(235, 235, 235);">Rp {{ number_format($total_total_april_umum) }}</td>
                                        <td class="text-center" style="vertical-align: middle; background-color: rgb(235, 235, 235);">Rp {{ number_format($total_total_april_lainnya) }}</td>
                                    @endif

                                    @if (!request('month') || request('month') == '05')
                                        <td class="text-center" style="vertical-align: middle; background-color: rgb(235, 235, 235);">Rp {{ number_format($total_total_mei_fasum) }}</td>
                                        <td class="text-center" style="vertical-align: middle; background-color: rgb(235, 235, 235);">Rp {{ number_format($total_total_mei_umum) }}</td>
                                        <td class="text-center" style="vertical-align: middle; background-color: rgb(235, 235, 235);">Rp {{ number_format($total_total_mei_lainnya) }}</td>
                                    @endif

                                    @if (!request('month') || request('month') == '06')
                                        <td class="text-center" style="vertical-align: middle; background-color: rgb(235, 235, 235);">Rp {{ number_format($total_total_juni_fasum) }}</td>
                                        <td class="text-center" style="vertical-align: middle; background-color: rgb(235, 235, 235);">Rp {{ number_format($total_total_juni_umum) }}</td>
                                        <td class="text-center" style="vertical-align: middle; background-color: rgb(235, 235, 235);">Rp {{ number_format($total_total_juni_lainnya) }}</td>
                                    @endif

                                    @if (!request('month') || request('month') == '07')
                                        <td class="text-center" style="vertical-align: middle; background-color: rgb(235, 235, 235);">Rp {{ number_format($total_total_juli_fasum) }}</td>
                                        <td class="text-center" style="vertical-align: middle; background-color: rgb(235, 235, 235);">Rp {{ number_format($total_total_juli_umum) }}</td>
                                        <td class="text-center" style="vertical-align: middle; background-color: rgb(235, 235, 235);">Rp {{ number_format($total_total_juli_lainnya) }}</td>
                                    @endif

                                    @if (!request('month') || request('month') == '08')
                                        <td class="text-center" style="vertical-align: middle; background-color: rgb(235, 235, 235);">Rp {{ number_format($total_total_agustus_fasum) }}</td>
                                        <td class="text-center" style="vertical-align: middle; background-color: rgb(235, 235, 235);">Rp {{ number_format($total_total_agustus_umum) }}</td>
                                        <td class="text-center" style="vertical-align: middle; background-color: rgb(235, 235, 235);">Rp {{ number_format($total_total_agustus_lainnya) }}</td>
                                    @endif

                                    @if (!request('month') || request('month') == '09')
                                        <td class="text-center" style="vertical-align: middle; background-color: rgb(235, 235, 235);">Rp {{ number_format($total_total_september_fasum) }}</td>
                                        <td class="text-center" style="vertical-align: middle; background-color: rgb(235, 235, 235);">Rp {{ number_format($total_total_september_umum) }}</td>
                                        <td class="text-center" style="vertical-align: middle; background-color: rgb(235, 235, 235);">Rp {{ number_format($total_total_september_lainnya) }}</td>
                                    @endif

                                    @if (!request('month') || request('month') == '10')
                                        <td class="text-center" style="vertical-align: middle; background-color: rgb(235, 235, 235);">Rp {{ number_format($total_total_oktober_fasum) }}</td>
                                        <td class="text-center" style="vertical-align: middle; background-color: rgb(235, 235, 235);">Rp {{ number_format($total_total_oktober_umum) }}</td>
                                        <td class="text-center" style="vertical-align: middle; background-color: rgb(235, 235, 235);">Rp {{ number_format($total_total_oktober_lainnya) }}</td>
                                    @endif

                                    @if (!request('month') || request('month') == '11')
                                        <td class="text-center" style="vertical-align: middle; background-color: rgb(235, 235, 235);">Rp {{ number_format($total_total_november_fasum) }}</td>
                                        <td class="text-center" style="vertical-align: middle; background-color: rgb(235, 235, 235);">Rp {{ number_format($total_total_november_umum) }}</td>
                                        <td class="text-center" style="vertical-align: middle; background-color: rgb(235, 235, 235);">Rp {{ number_format($total_total_november_lainnya) }}</td>
                                    @endif

                                    @if (!request('month') || request('month') == '12')
                                        <td class="text-center" style="vertical-align: middle; background-color: rgb(235, 235, 235);">Rp {{ number_format($total_total_desember_fasum) }}</td>
                                        <td class="text-center" style="vertical-align: middle; background-color: rgb(235, 235, 235);">Rp {{ number_format($total_total_desember_umum) }}</td>
                                        <td class="text-center" style="vertical-align: middle; background-color: rgb(235, 235, 235);">Rp {{ number_format($total_total_desember_lainnya) }}</td>
                                    @endif

                                    <td class="text-center" style="vertical-align: middle; background-color: rgb(235, 235, 235);">Rp {{ number_format($total_total) }}</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-end mr-4 mt-4">
        {{ $users->links() }}
    </div>

    @push('script')
        <script>

        </script>
    @endpush
@endsection




