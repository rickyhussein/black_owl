<?php

namespace App\Http\Controllers;

use App\Models\User;
use GuzzleHttp\Client;
use App\Models\Keluarga;
use App\Exports\UserExport;
use App\Imports\UsersImport;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class usersController extends Controller
{
    public function index(Request $request)
    {
        $title = 'Users';
        $search = request()->input('search');
        $rt = request()->input('rt');
        $status = request()->input('status');

        $users = User::when($search, function ($query) use ($search) {
            $query->where(function ($query) use ($search) {
                $query->where('name', 'LIKE', '%'.$search.'%')
                ->orWhere('alamat', 'LIKE', '%'.$search.'%')
                ->orWhere('email', 'LIKE', '%'.$search.'%');
            });
        })
        ->when($rt, function ($query) use ($rt) {
            $query->where('rt', $rt);
        })
        ->when($status, function ($query) use ($status) {
            $query->where('status', $status);
        })
        ->orderBy('rt', 'asc')
        ->orderBy('alamat', 'asc')
        ->paginate(10)
        ->withQueryString();

        return view('users.index', compact(
            'title',
            'users'
        ));
    }

    public function updateStatus()
    {
        User::where('status', 'belum huni')->update(['status' => 'Belum dihuni']);
        User::where('status', 'Dihuni / Kunjungan')->orWhere('status', 'Dikontrakan')->orWhere('status', 'MENETAP')->update(['status' => 'Belum dihuni']);
        return back()->with('success', 'Data Berhasil Di Update');
    }

    public function export()
    {
        return (new UserExport($_GET))->download('User.xlsx');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file_excel' => 'required|mimes:xls,xlsx,csv|max:5000'
        ]);

        $file_excel = $request->file('file_excel')->store('file_excel');

        Excel::import(new UsersImport, public_path('/storage/'.$file_excel));
        return back()->with('success', 'Data Berhasil Di Import');
    }

    public function tambah()
    {
        $title = 'Users';
        $roles = Role::orderBy('name')->get();

        return view('users.tambah', compact(
            'title',
            'roles',
        ));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'foto' => 'image|file|max:10240',
            'email' => 'required|unique:users',
            'password' => 'required|min:6|max:255',
            'alamat' => 'required|unique:users',
            'rt' => 'required',
            'no_hp' => 'required',
            'keterangan' => 'nullable',
            'status' => 'required',
        ]);

        if ($request->file('foto')) {
            $validated['foto'] = $request->file('foto')->store('foto');
        }

        $validated['password'] = Hash::make($validated['password']);
        $user = User::create($validated);

        $nama_keluarga = $request->input('nama_keluarga', []);
        $status_keluarga = $request->input('status_keluarga', []);

        for ($i = 0; $i < count($nama_keluarga); $i++) {
            if ($nama_keluarga[$i] !== null && $status_keluarga[$i] !== null) {
                Keluarga::create([
                    'user_id' => $user->id,
                    'nama_keluarga' => $nama_keluarga[$i],
                    'status_keluarga' => $status_keluarga[$i],
                ]);
            }
        }

        if ($request->role) {
            foreach($request->role as $role){
                $user->assignRole($role);
            }
        }

        return redirect('/users')->with('success', 'Data Berhasil di Tambahkan');
    }

    public function edit($id)
    {
        $title = 'Users';
        $roles = Role::orderBy('name')->get();
        $user = User::find($id);
        $user_roles = $user->roles->pluck('name')->toArray();

        return view('users.edit', compact(
            'title',
            'roles',
            'user',
            'user_roles',
        ));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $rules = [
            'name' => 'required',
            'foto' => 'image|file|max:10240',
            'rt' => 'required',
            'no_hp' => 'required',
            'keterangan' => 'nullable',
            'status' => 'required',
        ];

        if ($request->email != $user->email) {
            $rules['email'] = 'required|unique:users';
        }

        if ($request->alamat != $user->alamat) {
            $rules['alamat'] = 'required|unique:users';
        }

        $validated = $request->validate($rules);


        if ($request->file('foto')) {
            $validated['foto'] = $request->file('foto')->store('foto');
        }

        foreach($user->roles as $r){
            $user->removeRole($r->name);
        }

        $user->update($validated);

        $nama_keluarga = $request->input('nama_keluarga', []);
        $status_keluarga = $request->input('status_keluarga', []);

        Keluarga::where('user_id', $user->id)->delete();
        for ($i = 0; $i < count($nama_keluarga); $i++) {
            if ($nama_keluarga[$i] !== null && $status_keluarga[$i] !== null) {
                Keluarga::create([
                    'user_id' => $user->id,
                    'nama_keluarga' => $nama_keluarga[$i],
                    'status_keluarga' => $status_keluarga[$i],
                ]);
            }
        }

        if ($request->role) {
            foreach($request->role as $role){
                $user->assignRole($role);
            }
        }

        return redirect('/users')->with('success', 'Data Berhasil di Update');
    }

    public function editPassword($id)
    {
        $title = 'Ganti Password';
        $user = User::find($id);

        return view('users.editPassword', compact(
            'title',
            'user',
        ));
    }

    public function updatePassword(Request $request, $id)
    {
        $user = User::find($id);

        $validated = $request->validate([
            'password' => 'required|min:6|max:255',
        ]);

        $validated['password'] = Hash::make($request->password);

        $user->update($validated);

        return redirect('/users')->with('success', 'Password Berhasil Di Ganti');
    }

    public function delete($id)
    {
        $user = User::find($id);
        Keluarga::where('user_id', $user->id)->delete();
        $user->delete();

        return redirect('/users')->with('success', 'Data Berhasil Dihapus');
    }

    public function myProfile()
    {
        $title = 'My Profile';
        $roles = Role::orderBy('name')->get();
        $user = User::find(auth()->user()->id);
        $user_roles = implode(', ', $user->roles->pluck('name')->toArray());

        return view('users.myProfile', compact(
            'title',
            'roles',
            'user',
            'user_roles',
        ));
    }

    public function myProfileUpdate(Request $request, $id)
    {
        $user = User::find($id);

        $rules = [
            'name' => 'required',
            'foto' => 'image|file|max:10240',
            'rt' => 'required',
            'no_hp' => 'required',
            'keterangan' => 'nullable',
        ];

        if ($request->email != $user->email) {
            $rules['email'] = 'required|unique:users';
        }

        if ($request->alamat != $user->alamat) {
            $rules['alamat'] = 'required|unique:users';
        }

        $validated = $request->validate($rules);


        if ($request->file('foto')) {
            $validated['foto'] = $request->file('foto')->store('foto');
        }

        $user->update($validated);

        $nama_keluarga = $request->input('nama_keluarga', []);
        $status_keluarga = $request->input('status_keluarga', []);

        Keluarga::where('user_id', $user->id)->delete();
        for ($i = 0; $i < count($nama_keluarga); $i++) {
            if ($nama_keluarga[$i] !== null && $status_keluarga[$i] !== null) {
                Keluarga::create([
                    'user_id' => $user->id,
                    'nama_keluarga' => $nama_keluarga[$i],
                    'status_keluarga' => $status_keluarga[$i],
                ]);
            }
        }


        return redirect('/my-profile')->with('success', 'Data Berhasil di Update');
    }

    public function gantiPassword()
    {
        $title = 'Ganti Password';
        $user = User::find(auth()->user()->id);

        return view('users.gantiPassword', compact(
            'title',
            'user',
        ));
    }

    public function gantiPasswordUpdate(Request $request, $id)
    {
        $user = User::find($id);

        $validated = $request->validate([
            'password' => 'required|min:6|max:255|confirmed',
        ]);

        $validated['password'] = Hash::make($request->password);

        $user->update($validated);
        return redirect('/ganti-password')->with('success', 'Password Berhasil Diganti');
    }

}
