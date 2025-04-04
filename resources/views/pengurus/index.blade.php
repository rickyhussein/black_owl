@extends('layouts.dashboard')
@section('button')
    <li class="nav-item mr-2">
        <a href="{{ url('/pengurus/tambah') }}" class="btn btn-primary nav-link" style="color: white">+ Tambah</a>
    </li>
@endsection
@section('isi')
    <form action="{{ url('/pengurus') }}" class="mr-2 ml-2">
        <div class="form-row mb-2">
            <div class="col-10">
                <input type="text" class="form-control" name="search" placeholder="search" id="mulai" value="{{ request('search') }}">
            </div>
            <div class="col-2">
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
                            <th class="text-center" style="position: sticky; left: 0; background-color: rgb(215, 215, 215); z-index: 2; width:5%">No.</th>
                            <th style="background-color:rgb(243, 243, 243);" class="text-center">Nama</th>
                            <th style="background-color:rgb(243, 243, 243);" class="text-center">Posisi</th>
                            <th style="background-color:rgb(243, 243, 243);" class="text-center">Foto</th>
                            <th style="background-color:rgb(243, 243, 243);" class="text-center">Instagram</th>
                            <th style="background-color:rgb(243, 243, 243);" class="text-center">Youtube</th>
                            <th style="background-color:rgb(243, 243, 243);" class="text-center">Whatsapp</th>
                            <th style="background-color:rgb(243, 243, 243);" class="text-center">Facebook</th>
                            <th style="background-color:rgb(243, 243, 243); width:5%" class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($pengurus) <= 0)
                            <tr>
                                <td colspan="10" class="text-center">Tidak Ada Data</td>
                            </tr>
                        @else
                            @foreach ($pengurus as $key => $urus)
                                <tr>
                                    <td class="text-center" style="position: sticky; left: 0; background-color: rgb(235, 235, 235); z-index: 1; vertical-align: middle;">{{ ($pengurus->currentpage() - 1) * $pengurus->perpage() + $key + 1 }}.</td>
                                    <td class="text-center" style="vertical-align: middle;">{{ $urus->nama ?? '-' }}</td>
                                    <td class="text-center" style="vertical-align: middle;">{{ $urus->posisi ?? '-' }}</td>
                                    <td class="text-center" style="vertical-align: middle;">
                                        <img style="width: 125px; height: 170px; object-fit: cover;" src="{{ url('/storage/'.$urus->foto_pengurus) }}" alt="{{ $urus->nama ?? '-' }}">
                                    </td>
                                    <td class="text-center" style="vertical-align: middle;">
                                        @if ($urus->instagram)
                                            <a href="{{ $urus->instagram }}" class="btn btn-info btn-sm" target="_blank">{{ $urus->instagram }}</a>
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td class="text-center" style="vertical-align: middle;">
                                        @if ($urus->youtube)
                                            <a href="{{ $urus->youtube }}" class="btn btn-info btn-sm" target="_blank">{{ $urus->youtube }}</a>
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td class="text-center" style="vertical-align: middle;">
                                        @if ($urus->whatsapp)
                                            <a href="{{ $urus->whatsapp }}" class="btn btn-info btn-sm" target="_blank">{{ $urus->whatsapp }}</a>
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td class="text-center" style="vertical-align: middle;">
                                        @if ($urus->facebook)
                                            <a href="{{ $urus->facebook }}" class="btn btn-info btn-sm" target="_blank">{{ $urus->facebook }}</a>
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td style="vertical-align: middle;">
                                        <div style="display: flex; gap: 5px;">
                                            <a href="{{ url('/pengurus/edit/'.$urus->id) }}" class="btn btn-primary btn-sm" title="Edit pengurus"><i class="fa fa-edit"></i></a>

                                            <form action="{{ url('/pengurus/delete/'.$urus->id) }}" method="post">
                                                @method('delete')
                                                @csrf
                                                <button title="Delete pengurus" class="border-0 btn btn-danger btn-sm" onClick="return confirm('Are You Sure')"><i class="fa fa-trash"></i></button>
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
                {{ $pengurus->links() }}
            </div>
        </div>
    </div>


@endsection




