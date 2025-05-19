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
                    <select name="status_transaksi" id="status_transaksi" class="form-control status_transaksi @error('status_transaksi') is-invalid @enderror">
                        <option style="color: rgb(148, 148, 148);" value="">-- Pilih Status Transaksi --</option>
                        <option value="paid" {{ 'paid' == request('status_transaksi') ? 'selected="selected"' : '' }}>paid</option>
                        <option value="unpaid" {{ 'unpaid' == request('status_transaksi') ? 'selected="selected"' : '' }}>unpaid</option>
                        <option value="tagihan belum dibuat" {{ 'tagihan belum dibuat' == request('status_transaksi') ? 'selected="selected"' : '' }}>tagihan belum dibuat</option>
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
                <div class="col-4 mb-4">
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
                            <select name="status_transaksi" id="status_transaksi" class="form-control status_transaksi_2 @error('status_transaksi') is-invalid @enderror">
                                <option style="color: rgb(148, 148, 148);" value="">-- Pilih Status Transaksi --</option>
                                <option value="paid" {{ 'paid' == request('status_transaksi') ? 'selected="selected"' : '' }}>paid</option>
                                <option value="unpaid" {{ 'unpaid' == request('status_transaksi') ? 'selected="selected"' : '' }}>unpaid</option>
                                <option value="tagihan belum dibuat" {{ 'tagihan belum dibuat' == request('status_transaksi') ? 'selected="selected"' : '' }}>tagihan belum dibuat</option>
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
        <div class="card p-4">
            <div class="table-responsive" style="border-radius: 10px">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center" style="position: sticky; left: 0; background-color: rgb(215, 215, 215); z-index: 2;">No.</th>
                            <th style="min-width: 300px; background-color:rgb(243, 243, 243);" class="text-center">Nama</th>
                            <th style="min-width: 300px; background-color:rgb(243, 243, 243);" class="text-center">Alamat</th>
                            <th style="min-width: 120px; background-color:rgb(243, 243, 243);" class="text-center">RT</th>
                            <th style="min-width: 120px; background-color:rgb(243, 243, 243);" class="text-center">RW</th>
                            <th style="min-width: 300px; background-color:rgb(243, 243, 243);" class="text-center">Status</th>

                            @if (!request('month') || request('month') == '01')
                                <th style="min-width: 300px; background-color:rgb(243, 243, 243);" class="text-center" colspan="2">Januari</th>
                            @endif

                            @if (!request('month') || request('month') == '02')
                                <th style="min-width: 300px; background-color:rgb(243, 243, 243);" class="text-center" colspan="2">Februari</th>
                            @endif

                            @if (!request('month') || request('month') == '03')
                                <th style="min-width: 300px; background-color:rgb(243, 243, 243);" class="text-center" colspan="2">Maret</th>
                            @endif

                            @if (!request('month') || request('month') == '04')
                                <th style="min-width: 300px; background-color:rgb(243, 243, 243);" class="text-center" colspan="2">April</th>
                            @endif

                            @if (!request('month') || request('month') == '05')
                                <th style="min-width: 300px; background-color:rgb(243, 243, 243);" class="text-center" colspan="2">Mei</th>
                            @endif

                            @if (!request('month') || request('month') == '06')
                                <th style="min-width: 300px; background-color:rgb(243, 243, 243);" class="text-center" colspan="2">Juni</th>
                            @endif

                            @if (!request('month') || request('month') == '07')
                                <th style="min-width: 300px; background-color:rgb(243, 243, 243);" class="text-center" colspan="2">Juli</th>
                            @endif

                            @if (!request('month') || request('month') == '08')
                                <th style="min-width: 300px; background-color:rgb(243, 243, 243);" class="text-center" colspan="2">Agustus</th>
                            @endif

                            @if (!request('month') || request('month') == '09')
                                <th style="min-width: 300px; background-color:rgb(243, 243, 243);" class="text-center" colspan="2">September</th>
                            @endif

                            @if (!request('month') || request('month') == '10')
                                <th style="min-width: 300px; background-color:rgb(243, 243, 243);" class="text-center" colspan="2">Oktober</th>
                            @endif

                            @if (!request('month') || request('month') == '11')
                                <th style="min-width: 300px; background-color:rgb(243, 243, 243);" class="text-center" colspan="2">November</th>
                            @endif

                            @if (!request('month') || request('month') == '12')
                                <th style="min-width: 300px; background-color:rgb(243, 243, 243);" class="text-center" colspan="2">Desember</th>
                            @endif

                            @if (!request('month'))
                                <th style="min-width: 300px; background-color:rgb(243, 243, 243);" class="text-center">Total</th>
                            @endif

                        </tr>
                    </thead>
                    <tbody>
                        @if (count($users) <= 0)
                            <tr>
                                <td colspan="31" class="text-center">Tidak Ada Data</td>
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
                                        $count_januari_paid = $user->countIpklPaid($user->id, '01', $year);
                                        $count_januari_unpaid = $user->countIpklUnpaid($user->id, '01', $year);

                                        $total_februari = $user->getIpkl($user->id, '02', $year);
                                        $count_februari_paid = $user->countIpklPaid($user->id, '02', $year);
                                        $count_februari_unpaid = $user->countIpklUnpaid($user->id, '02', $year);

                                        $total_maret = $user->getIpkl($user->id, '03', $year);
                                        $count_maret_paid = $user->countIpklPaid($user->id, '03', $year);
                                        $count_maret_unpaid = $user->countIpklUnpaid($user->id, '03', $year);

                                        $total_april = $user->getIpkl($user->id, '04', $year);
                                        $count_april_paid = $user->countIpklPaid($user->id, '04', $year);
                                        $count_april_unpaid = $user->countIpklUnpaid($user->id, '04', $year);

                                        $total_mei = $user->getIpkl($user->id, '05', $year);
                                        $count_mei_paid = $user->countIpklPaid($user->id, '05', $year);
                                        $count_mei_unpaid = $user->countIpklUnpaid($user->id, '05', $year);

                                        $total_juni = $user->getIpkl($user->id, '06', $year);
                                        $count_juni_paid = $user->countIpklPaid($user->id, '06', $year);
                                        $count_juni_unpaid = $user->countIpklUnpaid($user->id, '06', $year);

                                        $total_juli = $user->getIpkl($user->id, '07', $year);
                                        $count_juli_paid = $user->countIpklPaid($user->id, '07', $year);
                                        $count_juli_unpaid = $user->countIpklUnpaid($user->id, '07', $year);

                                        $total_agustus = $user->getIpkl($user->id, '08', $year);
                                        $count_agustus_paid = $user->countIpklPaid($user->id, '08', $year);
                                        $count_agustus_unpaid = $user->countIpklUnpaid($user->id, '08', $year);

                                        $total_september = $user->getIpkl($user->id, '09', $year);
                                        $count_september_paid = $user->countIpklPaid($user->id, '09', $year);
                                        $count_september_unpaid = $user->countIpklUnpaid($user->id, '09', $year);

                                        $total_oktober = $user->getIpkl($user->id, '10', $year);
                                        $count_oktober_paid = $user->countIpklPaid($user->id, '10', $year);
                                        $count_oktober_unpaid = $user->countIpklUnpaid($user->id, '10', $year);

                                        $total_november = $user->getIpkl($user->id, '11', $year);
                                        $count_november_paid = $user->countIpklPaid($user->id, '11', $year);
                                        $count_november_unpaid = $user->countIpklUnpaid($user->id, '11', $year);

                                        $total_desember = $user->getIpkl($user->id, '12', $year);
                                        $count_desember_paid = $user->countIpklPaid($user->id, '12', $year);
                                        $count_desember_unpaid = $user->countIpklUnpaid($user->id, '12', $year);

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
                                    <td class="text-center" style="vertical-align: middle;">{{ $user->rw ?? '-' }}</td>
                                    <td class="text-center" style="vertical-align: middle;">{{ $user->status ?? '-' }}</td>

                                    @if (!request('month') || request('month') == '01')
                                        <td class="text-center" style="vertical-align: middle;">Rp {{ number_format($total_januari) }}</td>
                                        <td class="text-center" style="vertical-align: middle; width:50%;">
                                            @if ($total_januari > 0 && $count_januari_paid > 0)
                                                <a href="{{ url('/ipkl?user_id='.$user->id.'&month=01&year='.$year) }}" class="badge" style="color: rgba(20, 78, 7, 0.889); background-color:rgb(186, 238, 162); border-radius:10px; text-transform: uppercase;">paid</a>
                                            @else
                                                @if ($count_januari_unpaid > 0)
                                                    <a href="{{ url('/ipkl?user_id='.$user->id.'&month=01&year='.$year) }}" class="badge" style="color: rgba(78, 26, 26, 0.889); background-color:rgb(242, 170, 170); border-radius:10px; text-transform: uppercase;">unpaid</a>
                                                @else
                                                    <a href="{{ url('/ipkl/tambah/peruser?user_id='.$user->id) }}" class="badge" style="color: rgba(255, 123, 0, 0.889); background-color:rgb(255, 238, 177); border-radius:10px; text-transform: uppercase;">tagihan belum dibuat</a>
                                                @endif
                                            @endif
                                        </td>
                                    @endif

                                    @if (!request('month') || request('month') == '02')
                                        <td class="text-center" style="vertical-align: middle;">Rp {{ number_format($total_februari) }}</td>
                                        <td class="text-center" style="vertical-align: middle; width:50%;">
                                            @if ($total_februari > 0 && $count_februari_paid > 0)
                                                <a href="{{ url('/ipkl?user_id='.$user->id.'&month=02&year='.$year) }}" class="badge" style="color: rgba(20, 78, 7, 0.889); background-color:rgb(186, 238, 162); border-radius:10px; text-transform: uppercase;">paid</a>
                                            @else
                                                @if ($count_februari_unpaid > 0)
                                                    <a href="{{ url('/ipkl?user_id='.$user->id.'&month=02&year='.$year) }}" class="badge" style="color: rgba(78, 26, 26, 0.889); background-color:rgb(242, 170, 170); border-radius:10px; text-transform: uppercase;">unpaid</a>
                                                @else
                                                    <a href="{{ url('/ipkl/tambah/peruser?user_id='.$user->id) }}" class="badge" style="color: rgba(255, 123, 0, 0.889); background-color:rgb(255, 238, 177); border-radius:10px; text-transform: uppercase;">tagihan belum dibuat</a>
                                                @endif
                                            @endif
                                        </td>
                                    @endif

                                    @if (!request('month') || request('month') == '03')
                                        <td class="text-center" style="vertical-align: middle; width:50%;">Rp {{ number_format($total_maret) }}</td>
                                        <td class="text-center" style="vertical-align: middle; width:50%;">
                                            @if ($total_maret > 0 && $count_maret_paid > 0)
                                                <a href="{{ url('/ipkl?user_id='.$user->id.'&month=03&year='.$year) }}" class="badge" style="color: rgba(20, 78, 7, 0.889); background-color:rgb(186, 238, 162); border-radius:10px; text-transform: uppercase;">paid</a>
                                            @else
                                                @if ($count_maret_unpaid > 0)
                                                    <a href="{{ url('/ipkl?user_id='.$user->id.'&month=03&year='.$year) }}" class="badge" style="color: rgba(78, 26, 26, 0.889); background-color:rgb(242, 170, 170); border-radius:10px; text-transform: uppercase;">unpaid</a>
                                                @else
                                                    <a href="{{ url('/ipkl/tambah/peruser?user_id='.$user->id) }}" class="badge" style="color: rgba(255, 123, 0, 0.889); background-color:rgb(255, 238, 177); border-radius:10px; text-transform: uppercase;">tagihan belum dibuat</a>
                                                @endif
                                            @endif
                                        </td>
                                    @endif

                                    @if (!request('month') || request('month') == '04')
                                        <td class="text-center" style="vertical-align: middle; width:50%;">Rp {{ number_format($total_april) }}</td>
                                        <td class="text-center" style="vertical-align: middle;  width:50%;">
                                            @if ($total_april > 0 && $count_april_paid > 0)
                                                <a href="{{ url('/ipkl?user_id='.$user->id.'&month=04&year='.$year) }}" class="badge" style="color: rgba(20, 78, 7, 0.889); background-color:rgb(186, 238, 162); border-radius:10px; text-transform: uppercase;">paid</a>
                                            @else
                                                @if ($count_april_unpaid > 0)
                                                    <a href="{{ url('/ipkl?user_id='.$user->id.'&month=04&year='.$year) }}" class="badge" style="color: rgba(78, 26, 26, 0.889); background-color:rgb(242, 170, 170); border-radius:10px; text-transform: uppercase;">unpaid</a>
                                                @else
                                                    <a href="{{ url('/ipkl/tambah/peruser?user_id='.$user->id) }}" class="badge" style="color: rgba(255, 123, 0, 0.889); background-color:rgb(255, 238, 177); border-radius:10px; text-transform: uppercase;">tagihan belum dibuat</a>
                                                @endif
                                            @endif
                                        </td>
                                    @endif

                                    @if (!request('month') || request('month') == '05')
                                        <td class="text-center" style="vertical-align: middle;">Rp {{ number_format($total_mei) }}</td>
                                        <td class="text-center" style="vertical-align: middle;  width:50%;">
                                            @if ($total_mei > 0 && $count_mei_paid > 0)
                                                <a href="{{ url('/ipkl?user_id='.$user->id.'&month=05&year='.$year) }}" class="badge" style="color: rgba(20, 78, 7, 0.889); background-color:rgb(186, 238, 162); border-radius:10px; text-transform: uppercase;">paid</a>
                                            @else
                                                @if ($count_mei_unpaid > 0)
                                                    <a href="{{ url('/ipkl?user_id='.$user->id.'&month=05&year='.$year) }}" class="badge" style="color: rgba(78, 26, 26, 0.889); background-color:rgb(242, 170, 170); border-radius:10px; text-transform: uppercase;">unpaid</a>
                                                @else
                                                    <a href="{{ url('/ipkl/tambah/peruser?user_id='.$user->id) }}" class="badge" style="color: rgba(255, 123, 0, 0.889); background-color:rgb(255, 238, 177); border-radius:10px; text-transform: uppercase;">tagihan belum dibuat</a>
                                                @endif
                                            @endif
                                        </td>
                                    @endif

                                    @if (!request('month') || request('month') == '06')
                                        <td class="text-center" style="vertical-align: middle;">Rp {{ number_format($total_juni) }}</td>
                                        <td class="text-center" style="vertical-align: middle;  width:50%;">
                                            @if ($total_juni > 0 && $count_juni_paid > 0)
                                                <a href="{{ url('/ipkl?user_id='.$user->id.'&month=06&year='.$year) }}" class="badge" style="color: rgba(20, 78, 7, 0.889); background-color:rgb(186, 238, 162); border-radius:10px; text-transform: uppercase;">paid</a>
                                            @else
                                                @if ($count_juni_unpaid > 0)
                                                    <a href="{{ url('/ipkl?user_id='.$user->id.'&month=06&year='.$year) }}" class="badge" style="color: rgba(78, 26, 26, 0.889); background-color:rgb(242, 170, 170); border-radius:10px; text-transform: uppercase;">unpaid</a>
                                                @else
                                                    <a href="{{ url('/ipkl/tambah/peruser?user_id='.$user->id) }}" class="badge" style="color: rgba(255, 123, 0, 0.889); background-color:rgb(255, 238, 177); border-radius:10px; text-transform: uppercase;">tagihan belum dibuat</a>
                                                @endif
                                            @endif
                                        </td>
                                    @endif

                                    @if (!request('month') || request('month') == '07')
                                        <td class="text-center" style="vertical-align: middle;">Rp {{ number_format($total_juli) }}</td>
                                        <td class="text-center" style="vertical-align: middle;  width:50%;">
                                            @if ($total_juli > 0 && $count_juli_paid > 0)
                                                <a href="{{ url('/ipkl?user_id='.$user->id.'&month=07&year='.$year) }}" class="badge" style="color: rgba(20, 78, 7, 0.889); background-color:rgb(186, 238, 162); border-radius:10px; text-transform: uppercase;">paid</a>
                                            @else
                                                @if ($count_juli_unpaid > 0)
                                                    <a href="{{ url('/ipkl?user_id='.$user->id.'&month=07&year='.$year) }}" class="badge" style="color: rgba(78, 26, 26, 0.889); background-color:rgb(242, 170, 170); border-radius:10px; text-transform: uppercase;">unpaid</a>
                                                @else
                                                    <a href="{{ url('/ipkl/tambah/peruser?user_id='.$user->id) }}" class="badge" style="color: rgba(255, 123, 0, 0.889); background-color:rgb(255, 238, 177); border-radius:10px; text-transform: uppercase;">tagihan belum dibuat</a>
                                                @endif
                                            @endif
                                        </td>
                                    @endif

                                    @if (!request('month') || request('month') == '08')
                                        <td class="text-center" style="vertical-align: middle;">Rp {{ number_format($total_agustus) }}</td>
                                        <td class="text-center" style="vertical-align: middle;  width:50%;">
                                            @if ($total_agustus > 0 && $count_agustus_paid > 0)
                                                <a href="{{ url('/ipkl?user_id='.$user->id.'&month=08&year='.$year) }}" class="badge" style="color: rgba(20, 78, 7, 0.889); background-color:rgb(186, 238, 162); border-radius:10px; text-transform: uppercase;">paid</a>
                                            @else
                                                @if ($count_agustus_unpaid > 0)
                                                    <a href="{{ url('/ipkl?user_id='.$user->id.'&month=08&year='.$year) }}" class="badge" style="color: rgba(78, 26, 26, 0.889); background-color:rgb(242, 170, 170); border-radius:10px; text-transform: uppercase;">unpaid</a>
                                                @else
                                                    <a href="{{ url('/ipkl/tambah/peruser?user_id='.$user->id) }}" class="badge" style="color: rgba(255, 123, 0, 0.889); background-color:rgb(255, 238, 177); border-radius:10px; text-transform: uppercase;">tagihan belum dibuat</a>
                                                @endif
                                            @endif
                                        </td>
                                    @endif

                                    @if (!request('month') || request('month') == '09')
                                        <td class="text-center" style="vertical-align: middle;">Rp {{ number_format($total_september) }}</td>
                                        <td class="text-center" style="vertical-align: middle;  width:50%;">
                                            @if ($total_september > 0 && $count_september_paid > 0)
                                                <a href="{{ url('/ipkl?user_id='.$user->id.'&month=09&year='.$year) }}" class="badge" style="color: rgba(20, 78, 7, 0.889); background-color:rgb(186, 238, 162); border-radius:10px; text-transform: uppercase;">paid</a>
                                            @else
                                                @if ($count_september_unpaid > 0)
                                                    <a href="{{ url('/ipkl?user_id='.$user->id.'&month=09&year='.$year) }}" class="badge" style="color: rgba(78, 26, 26, 0.889); background-color:rgb(242, 170, 170); border-radius:10px; text-transform: uppercase;">unpaid</a>
                                                @else
                                                    <a href="{{ url('/ipkl/tambah/peruser?user_id='.$user->id) }}" class="badge" style="color: rgba(255, 123, 0, 0.889); background-color:rgb(255, 238, 177); border-radius:10px; text-transform: uppercase;">tagihan belum dibuat</a>
                                                @endif
                                            @endif
                                        </td>
                                    @endif

                                    @if (!request('month') || request('month') == '10')
                                        <td class="text-center" style="vertical-align: middle;">Rp {{ number_format($total_oktober) }}</td>
                                        <td class="text-center" style="vertical-align: middle;  width:50%;">
                                            @if ($total_oktober > 0 && $count_oktober_paid > 0)
                                                <a href="{{ url('/ipkl?user_id='.$user->id.'&month=10&year='.$year) }}" class="badge" style="color: rgba(20, 78, 7, 0.889); background-color:rgb(186, 238, 162); border-radius:10px; text-transform: uppercase;">paid</a>
                                            @else
                                                @if ($count_oktober_unpaid > 0)
                                                    <a href="{{ url('/ipkl?user_id='.$user->id.'&month=10&year='.$year) }}" class="badge" style="color: rgba(78, 26, 26, 0.889); background-color:rgb(242, 170, 170); border-radius:10px; text-transform: uppercase;">unpaid</a>
                                                @else
                                                    <a href="{{ url('/ipkl/tambah/peruser?user_id='.$user->id) }}" class="badge" style="color: rgba(255, 123, 0, 0.889); background-color:rgb(255, 238, 177); border-radius:10px; text-transform: uppercase;">tagihan belum dibuat</a>
                                                @endif
                                            @endif
                                        </td>
                                    @endif

                                    @if (!request('month') || request('month') == '11')
                                        <td class="text-center" style="vertical-align: middle;">Rp {{ number_format($total_november) }}</td>
                                        <td class="text-center" style="vertical-align: middle;  width:50%;">
                                            @if ($total_november > 0 && $count_november_paid > 0)
                                                <a href="{{ url('/ipkl?user_id='.$user->id.'&month=11&year='.$year) }}" class="badge" style="color: rgba(20, 78, 7, 0.889); background-color:rgb(186, 238, 162); border-radius:10px; text-transform: uppercase;">paid</a>
                                            @else
                                                @if ($count_november_unpaid > 0)
                                                    <a href="{{ url('/ipkl?user_id='.$user->id.'&month=11&year='.$year) }}" class="badge" style="color: rgba(78, 26, 26, 0.889); background-color:rgb(242, 170, 170); border-radius:10px; text-transform: uppercase;">unpaid</a>
                                                @else
                                                    <a href="{{ url('/ipkl/tambah/peruser?user_id='.$user->id) }}" class="badge" style="color: rgba(255, 123, 0, 0.889); background-color:rgb(255, 238, 177); border-radius:10px; text-transform: uppercase;">tagihan belum dibuat</a>
                                                @endif
                                            @endif
                                        </td>
                                    @endif

                                    @if (!request('month') || request('month') == '12')
                                        <td class="text-center" style="vertical-align: middle;">Rp {{ number_format($total_desember) }}</td>
                                        <td class="text-center" style="vertical-align: middle;  width:50%;">
                                            @if ($total_desember > 0 && $count_desember_paid > 0)
                                                <a href="{{ url('/ipkl?user_id='.$user->id.'&month=12&year='.$year) }}" class="badge" style="color: rgba(20, 78, 7, 0.889); background-color:rgb(186, 238, 162); border-radius:10px; text-transform: uppercase;">paid</a>
                                            @else
                                                @if ($count_desember_unpaid > 0)
                                                    <a href="{{ url('/ipkl?user_id='.$user->id.'&month=12&year='.$year) }}" class="badge" style="color: rgba(78, 26, 26, 0.889); background-color:rgb(242, 170, 170); border-radius:10px; text-transform: uppercase;">unpaid</a>
                                                @else
                                                    <a href="{{ url('/ipkl/tambah/peruser?user_id='.$user->id) }}" class="badge" style="color: rgba(255, 123, 0, 0.889); background-color:rgb(255, 238, 177); border-radius:10px; text-transform: uppercase;">tagihan belum dibuat</a>
                                                @endif
                                            @endif
                                        </td>
                                    @endif

                                    @if (!request('month'))
                                        <td class="text-center" style="vertical-align: middle;">Rp {{ number_format($total) }}</td>
                                    @endif
                                </tr>
                            @endforeach
                            <tr>
                                <td class="text-center" style="position: sticky; left: 0; background-color: rgb(215, 215, 215); z-index: 1; vertical-align: middle;"></td>
                                <td class="text-center" colspan="5" style="vertical-align: middle; background-color: rgb(215, 215, 215);">Total</td>

                                @if (!request('month') || request('month') == '01')
                                    <td class="text-center" colspan="2" style="vertical-align: middle; background-color: rgb(235, 235, 235);">Rp {{ number_format($total_total_januari) }}</td>
                                @endif

                                @if (!request('month') || request('month') == '02')
                                    <td class="text-center" colspan="2" style="vertical-align: middle; background-color: rgb(235, 235, 235);">Rp {{ number_format($total_total_februari) }}</td>
                                @endif

                                @if (!request('month') || request('month') == '03')
                                    <td class="text-center" colspan="2" style="vertical-align: middle; background-color: rgb(235, 235, 235);">Rp {{ number_format($total_total_maret) }}</td>
                                @endif

                                @if (!request('month') || request('month') == '04')
                                    <td class="text-center" colspan="2" style="vertical-align: middle; background-color: rgb(235, 235, 235);">Rp {{ number_format($total_total_april) }}</td>
                                @endif

                                @if (!request('month') || request('month') == '05')
                                    <td class="text-center" colspan="2" style="vertical-align: middle; background-color: rgb(235, 235, 235);">Rp {{ number_format($total_total_mei) }}</td>
                                @endif

                                @if (!request('month') || request('month') == '06')
                                    <td class="text-center" colspan="2" style="vertical-align: middle; background-color: rgb(235, 235, 235);">Rp {{ number_format($total_total_juni) }}</td>
                                @endif

                                @if (!request('month') || request('month') == '07')
                                    <td class="text-center" colspan="2" style="vertical-align: middle; background-color: rgb(235, 235, 235);">Rp {{ number_format($total_total_juli) }}</td>
                                @endif

                                @if (!request('month') || request('month') == '08')
                                    <td class="text-center" colspan="2" style="vertical-align: middle; background-color: rgb(235, 235, 235);">Rp {{ number_format($total_total_agustus) }}</td>
                                @endif

                                @if (!request('month') || request('month') == '09')
                                    <td class="text-center" colspan="2" style="vertical-align: middle; background-color: rgb(235, 235, 235);">Rp {{ number_format($total_total_september) }}</td>
                                @endif

                                @if (!request('month') || request('month') == '10')
                                    <td class="text-center" colspan="2" style="vertical-align: middle; background-color: rgb(235, 235, 235);">Rp {{ number_format($total_total_oktober) }}</td>
                                @endif

                                @if (!request('month') || request('month') == '11')
                                    <td class="text-center" colspan="2" style="vertical-align: middle; background-color: rgb(235, 235, 235);">Rp {{ number_format($total_total_november) }}</td>
                                @endif

                                @if (!request('month') || request('month') == '12')
                                    <td class="text-center" colspan="2" style="vertical-align: middle; background-color: rgb(235, 235, 235);">Rp {{ number_format($total_total_desember) }}</td>
                                @endif

                                @if (!request('month'))
                                    <td class="text-center" style="vertical-align: middle; background-color: rgb(235, 235, 235);">Rp {{ number_format($total_total) }}</td>
                                @endif
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

    @push('script')
        <script>
            function toggleMonthRequired() {
                const status = $('.status_transaksi').val();
                if (status) {
                    $('.month').attr('required', true);
                } else {
                    $('.month').removeAttr('required');
                }
            }

            toggleMonthRequired();

            $('.status_transaksi').on('change', function () {
                toggleMonthRequired();
            });

            function toggleMonthTwoRequired() {
                const status = $('.status_transaksi_2').val();
                if (status) {
                    $('.month_2').attr('required', true);
                } else {
                    $('.month_2').removeAttr('required');
                }
            }

            toggleMonthTwoRequired();

            $('.status_transaksi_2').on('change', function () {
                toggleMonthTwoRequired();
            });
        </script>
    @endpush
@endsection




