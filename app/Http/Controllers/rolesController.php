<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Role;

class rolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = Role::orderBy('name', 'ASC');

        if($request['search']){
            $searchTerm = $request['search'];
            $data = $data->where('name', 'LIKE', '%'.$searchTerm.'%');
        }

        return view('roles.index', [
            'title' => 'Roles',
            'roles' => $data->paginate(10)->withQueryString()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('roles.create', [
            'title' => 'Tambah Roles',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'guard_name' => 'required'
        ]);
        Role::create($validated);
        return redirect('/roles')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('roles.edit', [
            'title' => 'Edit Roles',
            'roles' => Role::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'guard_name' => 'required'
        ]);
        Role::where('id', $id)->update($validated);
        return redirect('/roles')->with('success', 'Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $check = DB::table('model_has_roles')->where('role_id', $id)->count();
        if($check == 0) {
            Role::find($id)->delete();
            return redirect('/roles')->with('success', 'Data Berhasil Dihapus');
        } else {
            Alert::error('Gagal', 'Ada User Yang Masih Menggunakan Role Ini!');
            return redirect('/roles');
        }
    }
}
