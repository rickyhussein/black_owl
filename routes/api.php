<?php

use App\Http\Controllers\API\UsersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

