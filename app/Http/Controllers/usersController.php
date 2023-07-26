<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class usersController extends Controller
{
    public function index(Request $request)
    {
        $data = Http::get(url('/api/users'));

        if($data["code"] == 200){
            return view('users.index', [
                'title' => 'Users',
                'data_user' => $data['data']
            ]);
        } else {
            return view('users.index', [
                'title' => 'Users',
                'data_user' => $data = []
            ]);
        }
    }

    public function tambahUsers()
    {
        return view('users.tambah',[
            "title" => 'Tambah User',
            "roles" => Role::orderBy('name')->get(),
            'fails' => []
        ]);
    }

    public function tambahUserProses(Request $request)
    {
        $response = Http::post(url('/api/tambah-users'), [
            'name' => $request['name'],
            'email' => $request['email'],
            'telepon' => $request['telepon'],
            'kode_acak' => $request['kode_acak'],
            'password' => $request['password'],
            'roles' => $request['roles']
        ]);

        if ($response['code'] == 200){
            return redirect('/users')->with('success', 'Data Berhasil di Tambahkan');
        } else if($response['code'] == 412) {
            return view('users.tambah', [
                "title" => 'Tambah User',
                "roles" => Role::orderBy('name')->get(),
                'fails' => $response['data']
            ]);
        } else {
            Alert::error('Failed', 'Error');
            return back();
        }
    }

    public function detail($id)
    {
        $data = Http::get(url('/api/users/edit/'.$id));

        if($data["code"] == 200){
            return view('users.editUser', [
                'title' => 'Edit user',
                'user' => $data['data'],
                "roles" => Role::orderBy('name')->get(),
                'userRoles' => User::find($id)->Roles->pluck('name')->toArray()
            ]);
        } else {
            return view('users.editUser', [
                'title' => 'Edit user',
                'user' => $data = [],
                "roles" => Role::orderBy('name')->get(),
                'userRoles' => null
            ]);
        }
    }

    public function update(Request $request, $id)
    {
        return $request;
    }

    public function deleteUser($id)
    {
        $delete = User::find($id);
        Storage::delete($delete->foto);
        $delete->delete();
        return redirect('/users')->with('success', 'Data Berhasil di Delete');
    }


    public function myProfile()
    {
        return view('users.myProfile', [
            'title' => 'My Profile'
        ]);
    }

    public function myProfileUpdate(Request $request, $id)
    {
        $rules = [
            'name' => 'required|max:255',
            'foto' => 'image|file|max:10240',
            'telepon' => 'required',
        ];


        $userId = User::find($id);
       
        if ($request->email != $userId->email) {
            $rules['email'] = 'required|email:dns|unique:users';
        }

        $validatedData = $request->validate($rules);


        User::where('id', $id)->update($validatedData);
        
        $request->session()->flash('success', 'Data Berhasil di Update');
        return redirect('/my-profile');
    }

    public function myProfileEditPassword()
    {
        return view('users.myProfileEditPassword', [
            'title' => 'Edit Password'
        ]);
    }

    public function myProfileUpdatePassword(Request $request, $id)
    {
        $validatedData = $request->validate([
            'password' => 'required|min:6|max:255',
        ]);

        $validatedData['password'] = Hash::make($request->password);

        User::where('id', $id)->update($validatedData);
        $request->session()->flash('success', 'Password Berhasil Diganti');
        return redirect('/my-profile');
    }
}
