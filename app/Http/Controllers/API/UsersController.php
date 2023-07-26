<?php

namespace App\Http\Controllers\API;

use Exception;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Helpers\ApiFormatter;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    public function index()
    {
        $data = User::all();

        if($data){
            return ApiFormatter::createApi(200, 'Success', $data);
        }else{
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    public function store(Request $request)
    {
           try {
            $request['kode_acak'] = Str::random(10);
            $rules = [
                'name' => 'required',
                'email' => 'required|email:dns|unique:users',
                'telepon' => 'required',
                'roles' => 'required',
                'kode_acak' => 'required',
                'password' => 'required|min:6'
            ];

            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return ApiFormatter::createApi(412, 'Failed', $validator->errors());
            }

            $users = User::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'telepon' => $request['telepon'],
                'kode_acak' => $request['kode_acak'],
                'password' => Hash::make($request['password'])
            ]);
            
            foreach($request->roles as $role){
                $users->assignRole($role);
            }
            
            if($users){
                return ApiFormatter::createApi(200, 'Success', $users);
            }else{
                return ApiFormatter::createApi(410, 'Failed');
            }
           } catch(Exception $error) {
            return ApiFormatter::createApi(400, '');
           }
    }

    public function edit($id)
    {
        $data = User::find($id);
        $data['userRoles'] = $data->Roles->pluck('name');
        if($data){
            return ApiFormatter::createApi(200, 'Success', $data);
        }else{
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    public function update(Request $request, $id)
    {
           try {
            $rules = [
                'name' => 'required',
                'telepon' => 'required',
                'roles' => 'required',
                'kode_acak' => 'required',
            ];

            $userId = User::find($id);
            
            if ($request->email != $userId->email) {
                $rules['email'] = 'required|email:dns|unique:users';
            }

            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return ApiFormatter::createApi(412, 'Failed', $validator->errors());
            }

            foreach($userId->roles as $r){
                $userId->removeRole($r->name);
            }

            User::where('id', $id)->update([
                'name' => $request['name'],
                'email' => $request['email'],
                'telepon' => $request['telepon'],
                'kode_acak' => $request['kode_acak'],
            ]);
            
            foreach($request->roles as $role){
                $userId->assignRole($role);
            }
            
            if($userId){
                return ApiFormatter::createApi(200, 'Success', $userId);
            }else{
                return ApiFormatter::createApi(410, 'Failed');
            }
           } catch(Exception $error) {
            return ApiFormatter::createApi(400, '');
           }
    }
}
