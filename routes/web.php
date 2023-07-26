<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authController;
use App\Http\Controllers\rolesController;
use App\Http\Controllers\usersController;
use App\Http\Controllers\dashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [authController::class, 'index'])->name('login')->middleware('guest');
Route::get('/register', [authController::class, 'register'])->middleware('guest');
Route::post('/register-proses', [authController::class, 'registerProses'])->middleware('guest');
Route::post('/login-proses', [authController::class, 'loginProses'])->middleware('guest');
Route::post('/logout', [authController::class, 'logout'])->middleware('auth');

Route::get('/dashboard', [dashboardController::class, 'index'])->middleware('auth');

Route::get('/users', [usersController::class, 'index'])->middleware('auth');
Route::get('/users/tambah-user', [usersController::class, 'tambahUsers'])->middleware('auth');
Route::post('/users/tambah-user-proses', [usersController::class, 'tambahUserProses'])->middleware('auth');
Route::get('/users/detail/{id}', [usersController::class, 'detail'])->middleware('auth');
Route::put('/users/update/{id}', [usersController::class, 'update'])->middleware('auth');
Route::delete('/users/delete/{id}', [usersController::class, 'deleteUser'])->middleware('auth');
Route::get('/users/edit-password/{id}', [usersController::class, 'editPassword'])->middleware('auth');
Route::put('/users/edit-password-proses/{id}', [usersController::class, 'editPasswordProses'])->middleware('auth');

Route::resource('/roles', rolesController::class)->middleware('auth')->except('show');

Route::get('/my-profile', [usersController::class, 'myProfile'])->middleware('auth');
Route::put('/my-profile/update/{id}', [usersController::class, 'myProfileUpdate'])->middleware('auth');
Route::get('/my-profile/edit-password', [usersController::class, 'myProfileEditPassword'])->middleware('auth');
Route::put('/my-profile/update-password/{id}', [usersController::class, 'myProfileUpdatePassword'])->middleware('auth');


