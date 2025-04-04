<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IPKLController;
use App\Http\Controllers\API\UsersController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('users', [UsersController::class, 'index']);
Route::post('tambah-users', [UsersController::class, 'store']);
Route::get('users/edit/{id}', [UsersController::class, 'edit']);
Route::put('users/update/{id}', [UsersController::class, 'update']);
Route::delete('users/delete/{id}', [UsersController::class, 'delete']);

Route::post('/my-ipkl/callback', [IPKLController::class, 'myIpklCallback']);


