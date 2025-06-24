@extends('layouts.dashboard')
@section('button')
    <li class="nav-item mr-2">
        <a href="{{ url('/laporan-gate-card/export') }}{{ $_GET?'?'.$_SERVER['QUERY_STRING']: '' }}" class="btn btn-success nav-link" style="color: white"><i class="far fa-file-excel mr-1"></i>Export</a>
    </li>
@endsection
@section('isi')
    <div class="d-none d-md-block">
        <form action="{{ url('/laporan-gate-card') }}" class="mr-2 ml-2">
            <div class="form-row mb-2">
                <div class="col-4 mb-2">
                    <input type="text" class="form-control" name="search" placeholder="Nama / Alamat" id="search" value="{{ request('search') }}">
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
                <form action="{{ url('/laporan-gate-card') }}">
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
                            <th style="min-width: 300px; background-color:rgb(243, 243, 243);" class="text-center">Total Pembayaran</th>
                            <th style="min-width: 300px; background-color:rgb(243, 243, 243);" class="text-center">Jumlah Gate Card</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $total_total = 0;
                        @endphp
                        @if (count($users) <= 0)
                            <tr>
                                <td colspan="8" class="text-center">Tidak Ada Data</td>
                            </tr>
                        @else
                            @foreach ($users as $key => $user)
                                <tr>
                                    @php
                                        $total = $user->getGateCard($user->id);
                                        $qty = $user->getQtyGateCard($user->id);
                                        $total_total += $total;
                                    @endphp
                                    <td class="text-center" style="position: sticky; left: 0; background-color: rgb(235, 235, 235); z-index: 1; vertical-align: middle;">{{ ($users->currentpage() - 1) * $users->perpage() + $key + 1 }}.</td>
                                    <td class="text-center" style="vertical-align: middle;">{{ $user->name }}</td>
                                    <td class="text-center" style="vertical-align: middle;">{{ $user->alamat ?? '-' }}</td>
                                    <td class="text-center" style="vertical-align: middle;">{{ $user->rt ?? '-' }}</td>
                                    <td class="text-center" style="vertical-align: middle;">{{ $user->rw ?? '-' }}</td>
                                    <td class="text-center" style="vertical-align: middle;">{{ $user->status ?? '-' }}</td>
                                    <td class="text-center" style="vertical-align: middle;">Rp {{ number_format($total) }}</td>
                                    <td class="text-center" style="vertical-align: middle;">{{ $qty }}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td class="text-center" style="position: sticky; left: 0; background-color: rgb(215, 215, 215); z-index: 1; vertical-align: middle;"></td>
                                <td class="text-center" colspan="5" style="vertical-align: middle; background-color: rgb(215, 215, 215);">Total</td>
                                <td class="text-center" colspan="2" style="vertical-align: middle; background-color: rgb(235, 235, 235);">Rp {{ number_format($total_total) }}</td>
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




