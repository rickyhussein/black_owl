@extends('layouts.dashboard')
@section('button')
    <li class="nav-item mr-2">
        <a href="{{ url('/social/calendar') }}" class="btn btn-success nav-link" style="color: white">Calendar</a>
    </li>
    <li class="nav-item mr-2">
        <a href="{{ url('/social/tambah') }}" class="btn btn-primary nav-link" style="color: white">+ Tambah</a>
    </li>
@endsection
@section('isi')
    <form action="{{ url('/social') }}" class="mr-2 ml-2">
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
                            <th style="min-width: 250px; background-color:rgb(243, 243, 243);" class="text-center">Tipe</th>
                            <th style="min-width: 250px; background-color:rgb(243, 243, 243);" class="text-center">Hari</th>
                            <th style="min-width: 250px; background-color:rgb(243, 243, 243);" class="text-center">Tanggal</th>
                            <th style="min-width: 250px; background-color:rgb(243, 243, 243);" class="text-center">Judul</th>
                            <th style="min-width: 250px; background-color:rgb(243, 243, 243);" class="text-center">Keterangan</th>
                            <th style="min-width: 250px; background-color:rgb(243, 243, 243);" class="text-center">Contact Person</th>
                            <th style="min-width: 250px; background-color:rgb(243, 243, 243);" class="text-center">Created By</th>
                            <th style="min-width: 250px; background-color:rgb(243, 243, 243);" class="text-center">Updated By</th>
                            <th style="background-color:rgb(243, 243, 243);" class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($socials) <= 0)
                            <tr>
                                <td colspan="11" class="text-center">Tidak Ada Data</td>
                            </tr>
                        @else
                            @foreach ($socials as $key => $social)
                                <tr>
                                    <td class="text-center" style="position: sticky; left: 0; background-color: rgb(235, 235, 235); z-index: 1; vertical-align: middle;">{{ ($socials->currentpage() - 1) * $socials->perpage() + $key + 1 }}.</td>
                                    <td class="text-center" style="vertical-align: middle;">{{ $social->type ?? '-' }}</td>
                                    <td class="text-center" style="vertical-align: middle;">{{ $social->day ?? '-' }}</td>
                                    <td class="text-center" style="vertical-align: middle;">{{ $social->date ?? '-' }}</td>
                                    <td class="text-center" style="vertical-align: middle;">{{ $social->title ?? '-' }}</td>
                                    <td class="text-center" style="vertical-align: middle;">{!! $social->note ? nl2br(e($social->note)) : '-' !!}</td>
                                    <td class="text-center" style="vertical-align: middle;">{{ $social->contact_person ?? '-' }}</td>
                                    <td class="text-center" style="vertical-align: middle;">{{ $social->createdBy->name ?? '-' }}</td>
                                    <td class="text-center" style="vertical-align: middle;">{{ $social->updatedBy->name ?? '-' }}</td>
                                    <td style="vertical-align: middle;">
                                        <div style="display: flex; gap: 5px;">
                                            <a href="{{ url('/social/edit/'.$social->id) }}" class="btn btn-primary btn-sm" title="Edit social"><i class="fa fa-edit"></i></a>

                                            <form action="{{ url('/social/delete/'.$social->id) }}" method="post">
                                                @method('delete')
                                                @csrf
                                                <button title="Delete social" class="border-0 btn btn-danger btn-sm" onClick="return confirm('Are You Sure')"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-end me-4 mt-4">
                {{ $socials->links() }}
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





