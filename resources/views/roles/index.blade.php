@extends('layouts.dashboard')
@section('isi')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                    <a href="{{ url('/roles/create') }}" class="btn btn-sm btn-primary">+ Tambah Role</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form action="{{ url('/roles') }}">
                    <div class="form-row mb-2">
                        <div class="col-lg-3-sm-6">
                            <input type="text" class="form-control" name="search" placeholder="search" id="mulai" value="{{ request('search') }}">
                        </div>
                        <div>
                            <button type="submit" id="search" class="form-control btn btn-secondary"><i class="fas fa-search"></i></button>
                        </div>
                            </div>
                </form>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No.</th>    
                                <th>Name</th>
                                <th>Guard</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($roles->count() == 0)
                                <tr>
                                    <td colspan="10">
                                        <center>
                                            No data available in table
                                        </center>
                                    </td>
                                </tr>
                            @else
                                @foreach ($roles as $role)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $role->name }}</td>
                                        <td>{{ $role->guard_name }}</td>
                                        <td>
                                            <a href="{{ url('/roles/'.$role->id.'/edit') }}" class="btn btn-sm btn-info"><i class="fa fa-solid fa-edit"></i></a>
                                            <form action="{{ url('/roles/'.$role->id) }}" method="post" class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <button class="btn btn-danger btn-sm btn-circle" onClick="return confirm('Are You Sure')"><i class="fa fa-solid fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="d-flex justify-content-end mr-4">
                {{ $roles->links() }}
            </div>
        </div>
    </div>
@endsection




