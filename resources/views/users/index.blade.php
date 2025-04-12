@extends('layouts.dashboard')
@section('button')
    <li class="nav-item mr-2">
        <a href="{{ url('/users/tambah') }}" class="btn btn-primary nav-link" style="color: white">+ Tambah</a>
    </li>
    <li class="nav-item mr-2">
        <button type="button" class="btn btn-secondary text-white" data-toggle="modal" data-target="#exampleModalCenter">
            <i class="fas fa-file-import mr-1"></i> Import
        </button>
    </li>
    <li class="nav-item mr-2">
        <a href="{{ url('/users/export') }}{{ $_GET?'?'.$_SERVER['QUERY_STRING']: '' }}" class="btn btn-success nav-link" style="color: white"><i class="far fa-file-excel mr-1"></i>Export</a>
    </li>
@endsection
@section('isi')
    <div class="d-none d-md-block">
        <form action="{{ url('/users') }}" class="mr-2 ml-2">
            <div class="form-row mb-2">
                <div class="col-4">
                    <input type="text" class="form-control" name="search" placeholder="Nama / Alamat / Email" id="search" value="{{ request('search') }}">
                </div>
                <div class="col-3">
                    <select name="rt" id="rt" class="form-control @error('rt') is-invalid @enderror selectpicker" data-live-search="true">
                        <option value="">-- Pilih RT --</option>
                        <option value="001" {{ '001' == request('rt') ? 'selected="selected"' : '' }}>001</option>
                        <option value="002" {{ '002' == request('rt') ? 'selected="selected"' : '' }}>002</option>
                        <option value="003" {{ '003' == request('rt') ? 'selected="selected"' : '' }}>003</option>
                    </select>
                </div>
                <div class="col-3">
                    <select name="status" id="status" class="form-control @error('status') is-invalid @enderror selectpicker" data-live-search="true">
                        <option value="">-- Pilih Status --</option>
                        <option value="Dihuni" {{ 'Dihuni' == request('status') ? 'selected="selected"' : '' }}>Dihuni</option>
                        <option value="Belum dihuni" {{ 'Belum dihuni' == request('status') ? 'selected="selected"' : '' }}>Belum dihuni</option>
                    </select>
                </div>
                <div class="col-2">
                    <button type="submit" id="search" class="btn"><i class="fas fa-search"></i></button>
                </div>
            </div>
        </form>
    </div>

    <div class="d-block d-md-none">
        <button type="button" class="btn btn-secondary btn-sm text-white ml-3 mb-3"  data-toggle="modal" data-target="#filterModal">
            <i class="fas fa-filter mr-1"></i> Filter
        </button>
        <div class="modal fade" id="filterModal" tabindex="-1" role="dialog" aria-labelledby="filterModalTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Filter</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ url('/users') }}">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" name="search" placeholder="Nama / Alamat / Email" id="search" value="{{ request('search') }}">
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
                            <th style="min-width: 170px; background-color:rgb(243, 243, 243);" class="text-center">Foto</th>
                            <th style="min-width: 170px; background-color:rgb(243, 243, 243);" class="text-center">Alamat</th>
                            <th style="min-width: 170px; background-color:rgb(243, 243, 243);" class="text-center">RT</th>
                            <th style="min-width: 170px; background-color:rgb(243, 243, 243);" class="text-center">Status</th>
                            <th style="min-width: 170px; background-color:rgb(243, 243, 243);" class="text-center">Nomor HP</th>
                            <th style="min-width: 170px; background-color:rgb(243, 243, 243);" class="text-center">Email</th>
                            <th style="min-width: 170px; background-color:rgb(243, 243, 243);" class="text-center">Keterangan</th>
                            <th style="min-width: 170px; background-color:rgb(243, 243, 243);" class="text-center">Role</th>
                            <th style="min-width: 320px; background-color:rgb(243, 243, 243);" class="text-center">Anggota Keluarga</th>
                            <th style="background-color:rgb(243, 243, 243);" class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($users) <= 0)
                            <tr>
                                <td colspan="10" class="text-center">Tidak Ada Data</td>
                            </tr>
                        @else
                            @foreach ($users as $key => $user)
                                <tr>
                                    <td class="text-center" style="position: sticky; left: 0; background-color: rgb(235, 235, 235); z-index: 1; vertical-align: middle;">{{ ($users->currentpage() - 1) * $users->perpage() + $key + 1 }}.</td>
                                    <td class="text-center" style="vertical-align: middle;">{{ $user->name }}</td>
                                    <td class="text-center" style="vertical-align: middle;">
                                        @if($user->foto == null)
                                            <img style="width: 80px; height: 80px; border-radius: 50%; object-fit: cover;" src="{{ url('assets/img/foto_default.jpg') }}" alt="{{ $user->name ?? '-' }}">
                                        @else
                                            <img style="width: 80px; height: 80px; border-radius: 50%; object-fit: cover;" src="{{ url('/storage/'.$user->foto) }}" alt="{{ $user->name ?? '-' }}">
                                        @endif
                                    </td>
                                    <td class="text-center" style="vertical-align: middle;">{{ $user->alamat ?? '-' }}</td>
                                    <td class="text-center" style="vertical-align: middle;">{{ $user->rt ?? '-' }}</td>
                                    <td class="text-center" style="vertical-align: middle;">{{ $user->status ?? '-' }}</td>
                                    <td class="text-center" style="vertical-align: middle;">{{ $user->no_hp ?? '-' }}</td>
                                    <td class="text-center" style="vertical-align: middle;">{{ $user->email ?? '-' }}</td>
                                    <td class="text-center" style="vertical-align: middle;">{{ $user->keterangan ?? '-' }}</td>
                                    <td class="text-center" style="vertical-align: middle;">
                                        @if (count($user->roles) > 0)
                                            @foreach ($user->roles as $role)
                                                <div class="badge" style="color: rgb(21, 47, 118); background-color:rgba(192, 218, 254, 0.889); border-radius:10px;">{{ $role->name ?? '-' }}</div>
                                                <br>
                                            @endforeach
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td class="text-center" style="vertical-align: middle;">
                                        @if (count($user->keluarga) > 0)
                                            @foreach ($user->keluarga as $keluarga)
                                                <div class="float-left">
                                                    <div class="badge" style="color: rgba(20, 78, 7, 0.889); background-color:rgb(186, 238, 162); border-radius:10px;">{{ $keluarga->nama_keluarga }}</div>
                                                </div>
                                                <div class="float-right">
                                                    <div class="badge" style="color: rgba(255, 123, 0, 0.889); background-color:rgb(255, 238, 177); border-radius:10px;">{{ $keluarga->status_keluarga }}</div>
                                                </div>
                                                <br>
                                            @endforeach
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td style="vertical-align: middle;">
                                        <div style="display: flex; gap: 5px;">
                                            <a href="{{ url('/users/edit/'.$user->id) }}" class="btn btn-primary btn-sm" title="Edit Users"><i class="fa fa-edit"></i></a>

                                            <a href="{{ url('/users/edit-password/'.$user->id) }}" class="btn btn-warning btn-sm" title="Edit Password"><i class="fa fa-key"></i></a>

                                            <form action="{{ url('/users/delete/'.$user->id) }}" method="post">
                                                @method('delete')
                                                @csrf
                                                <button title="Delete Users" class="border-0 btn btn-danger btn-sm" onClick="return confirm('Are You Sure')"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-end mr-4 mt-4">
                {{ $users->links() }}
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Import Users</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ url('/users/import') }}" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="file_excel">File Excel</label>
                        <input type="file" name="file_excel" id="file_excel" class="form-control @error('file_excel') is-invalid @enderror">
                        @error('file_excel')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
        </div>
    </div>
@endsection




