@extends('layouts.dashboard')
@section('button')
    <li class="nav-item mr-2">
        <a href="{{ url('/infrastruktur/tambah') }}" class="btn btn-primary nav-link" style="color: white">+ Tambah</a>
    </li>
@endsection
@section('isi')
    <form action="{{ url('/infrastruktur') }}" class="mr-2 ml-2">
        <div class="form-row mb-2">
            <div class="col-3">
                <input type="datetime" class="form-control" name="start_date" placeholder="Start Date" id="start_date" value="{{ request('start_date') }}">
            </div>
            <div class="col-3">
                <input type="datetime" class="form-control" name="end_date" placeholder="End Date" id="end_date" value="{{ request('end_date') }}">
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
                            <th style="min-width: 250px; background-color:rgb(243, 243, 243);" class="text-center">Tanggal</th>
                            <th style="min-width: 250px; background-color:rgb(243, 243, 243);" class="text-center">Judul</th>
                            <th style="min-width: 500px; background-color:rgb(243, 243, 243);" class="text-center">Deskripsi</th>
                            <th style="min-width: 250px; background-color:rgb(243, 243, 243);" class="text-center">File</th>
                            <th style="min-width: 250px; background-color:rgb(243, 243, 243);" class="text-center">Created By</th>
                            <th style="min-width: 250px; background-color:rgb(243, 243, 243);" class="text-center">Updated By</th>
                            <th style="background-color:rgb(243, 243, 243);" class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($infrastrukturs) <= 0)
                            <tr>
                                <td colspan="11" class="text-center">Tidak Ada Data</td>
                            </tr>
                        @else
                            @foreach ($infrastrukturs as $key => $infrastruktur)
                                <tr>
                                    <td class="text-center" style="position: sticky; left: 0; background-color: rgb(235, 235, 235); z-index: 1; vertical-align: middle;">{{ ($infrastrukturs->currentpage() - 1) * $infrastrukturs->perpage() + $key + 1 }}.</td>
                                    <td class="text-center" style="vertical-align: middle;">{{ $infrastruktur->date ?? '-' }}</td>
                                    <td class="text-center" style="vertical-align: middle;">{{ $infrastruktur->title ?? '-' }}</td>
                                    <td style="vertical-align: middle;">{!! $infrastruktur->description ? nl2br(e($infrastruktur->description)) : '-' !!}</td>
                                    <td class="text-center" style="vertical-align: middle;">
                                        @if(count($infrastruktur->items) > 0)
                                            @foreach ($infrastruktur->items as $key => $item)
                                                @if ($item->infrastruktur_file_path)
                                                    <a class="badge" style="color: rgb(21, 47, 118); background-color:rgba(192, 218, 254, 0.889); border-radius:10px;" target="_blank" href="{{ url('/storage/'.$item->infrastruktur_file_path) }}"><i class="fa fa-download mr-1"></i> {{ $item->infrastruktur_file_name }}</a>
                                                    <br>
                                                @else
                                                    -
                                                @endif
                                            @endforeach
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td class="text-center" style="vertical-align: middle;">{{ $infrastruktur->createdBy->name ?? '-' }}</td>
                                    <td class="text-center" style="vertical-align: middle;">{{ $infrastruktur->updatedBy->name ?? '-' }}</td>
                                    <td class="text-center" style="vertical-align: middle;">
                                        <div style="display: flex; gap: 5px;">
                                            <a href="{{ url('/infrastruktur/show/'.$infrastruktur->id) }}" class="btn btn-info btn-sm" title="show Infrastruktur"><i class="fa fa-eye"></i></a>

                                            <a href="{{ url('/infrastruktur/edit/'.$infrastruktur->id) }}" class="btn btn-primary btn-sm" title="Edit Infrastruktur"><i class="fa fa-edit"></i></a>

                                            <form action="{{ url('/infrastruktur/delete/'.$infrastruktur->id) }}" method="post">
                                                @method('delete')
                                                @csrf
                                                <button title="Delete Infrastruktur" class="border-0 btn btn-danger btn-sm" onClick="return confirm('Are You Sure')"><i class="fa fa-trash"></i></button>
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
                {{ $infrastrukturs->links() }}
            </div>
        </div>
    </div>
    @push('script')
        <script>
            $('#start_date').change(function(){
                var start_date = $(this).val();
                $('#end_date').val(start_date);
            });
        </script>
    @endpush

@endsection




