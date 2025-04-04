@extends('layouts.dashboard')
@section('button')
    <li class="nav-item mr-2">
        <a href="{{ url('/fasilitas/tambah') }}" class="btn btn-primary nav-link" style="color: white">+ Tambah</a>
    </li>
@endsection
@section('isi')
    <form action="{{ url('/fasilitas') }}" class="mr-2 ml-2">
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
                            <th style="width: 45%; background-color:rgb(243, 243, 243);" class="text-center">Nama</th>
                            <th style="width: 45%; background-color:rgb(243, 243, 243);" class="text-center">Foto</th>
                            <th style="background-color:rgb(243, 243, 243); width:5%" class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($fasilitas) <= 0)
                            <tr>
                                <td colspan="10" class="text-center">Tidak Ada Data</td>
                            </tr>
                        @else
                            @foreach ($fasilitas as $key => $fas)
                                <tr>
                                    <td class="text-center" style="position: sticky; left: 0; background-color: rgb(235, 235, 235); z-index: 1; vertical-align: middle;">{{ ($fasilitas->currentpage() - 1) * $fasilitas->perpage() + $key + 1 }}.</td>
                                    <td class="text-center" style="vertical-align: middle;">{{ $fas->nama ?? '-' }}</td>
                                    <td class="text-center" style="vertical-align: middle;">
                                        <img style="width: 150px; height: 80px; object-fit: cover;" src="{{ url('/storage/'.$fas->fasilitas) }}" alt="{{ $fas->nama ?? '-' }}">
                                    </td>
                                    <td style="vertical-align: middle;">
                                        <div style="display: flex; gap: 5px;">
                                            <a href="{{ url('/fasilitas/edit/'.$fas->id) }}" class="btn btn-primary btn-sm" title="Edit fasilitas"><i class="fa fa-edit"></i></a>

                                            <form action="{{ url('/fasilitas/delete/'.$fas->id) }}" method="post">
                                                @method('delete')
                                                @csrf
                                                <button title="Delete fasilitas" class="border-0 btn btn-danger btn-sm" onClick="return confirm('Are You Sure')"><i class="fa fa-trash"></i></button>
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
                {{ $fasilitas->links() }}
            </div>
        </div>
    </div>


@endsection




