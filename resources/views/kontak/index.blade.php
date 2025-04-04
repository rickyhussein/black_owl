@extends('layouts.dashboard')
@section('button')
    <li class="nav-item mr-2">
        <a href="{{ url('/kontak/tambah') }}" class="btn btn-primary nav-link" style="color: white">+ Tambah</a>
    </li>
@endsection
@section('isi')
    <form action="{{ url('/kontak') }}" class="mr-2 ml-2">
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
                            <th style="width: 45%; background-color:rgb(243, 243, 243);" class="text-center">Nomor</th>
                            <th style="background-color:rgb(243, 243, 243); width:5%" class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($kontak) <= 0)
                            <tr>
                                <td colspan="10" class="text-center">Tidak Ada Data</td>
                            </tr>
                        @else
                            @foreach ($kontak as $key => $ktk)
                                <tr>
                                    <td class="text-center" style="position: sticky; left: 0; background-color: rgb(235, 235, 235); z-index: 1; vertical-align: middle;">{{ ($kontak->currentpage() - 1) * $kontak->perpage() + $key + 1 }}.</td>
                                    <td class="text-center" style="vertical-align: middle;">{{ $ktk->nama ?? '-' }}</td>
                                    <td class="text-center" style="vertical-align: middle;">{{ $ktk->nomor ?? '-' }}</td>
                                    <td style="vertical-align: middle;">
                                        <div style="display: flex; gap: 5px;">
                                            <a href="{{ url('/kontak/edit/'.$ktk->id) }}" class="btn btn-primary btn-sm" title="Edit kontak"><i class="fa fa-edit"></i></a>

                                            <form action="{{ url('/kontak/delete/'.$ktk->id) }}" method="post">
                                                @method('delete')
                                                @csrf
                                                <button title="Delete kontak" class="border-0 btn btn-danger btn-sm" onClick="return confirm('Are You Sure')"><i class="fa fa-trash"></i></button>
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
                {{ $kontak->links() }}
            </div>
        </div>
    </div>


@endsection




