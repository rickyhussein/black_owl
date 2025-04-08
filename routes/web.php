<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\authController;
use App\Http\Controllers\IPKLController;
use App\Http\Controllers\rolesController;
use App\Http\Controllers\usersController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\PengurusController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\TataTertibController;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\NotificationController;

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

Route::get('/', [authController::class, 'index'])->middleware('islogin');
Route::get('/login', [authController::class, 'login'])->name('login')->middleware('islogin');
Route::post('/login-proses', [authController::class, 'loginProses']);
Route::get('/logout', [authController::class, 'logout'])->middleware('auth');

Route::get('/forgot-password', [authController::class, 'forgotPassword']);
Route::post('/forgot-password/link', [authController::class, 'forgotPasswordLink']);
Route::get('reset-password/{token}', [authController::class, 'showResetForm'])->name('password.reset');
Route::post('reset-password', [authController::class, 'reset'])->name('password.update');


Route::get('/dashboard', [dashboardController::class, 'index'])->middleware('role:admin');

Route::get('/dashboard-user', [dashboardController::class, 'dashboardUser'])->middleware('role:user');

Route::get('/notifications', [NotificationController::class, 'index'])->middleware('role:user');
Route::get('/notifications/read-message/{id}', [NotificationController::class, 'readMessage'])->middleware('role:user');
Route::get('/notification', [NotificationController::class, 'notification'])->middleware('role:user');

Route::get('/users/updateStatus', [usersController::class, 'updateStatus'])->middleware('role:admin');

Route::get('/users', [usersController::class, 'index'])->middleware('role:admin');
Route::get('/users/tambah', [usersController::class, 'tambah'])->middleware('role:admin');
Route::get('/users/export', [usersController::class, 'export'])->middleware('role:admin');
Route::post('/users/store', [usersController::class, 'store'])->middleware('role:admin');
Route::get('/users/edit/{id}', [usersController::class, 'edit'])->middleware('role:admin');
Route::put('/users/update/{id}', [usersController::class, 'update'])->middleware('role:admin');
Route::get('/users/edit-password/{id}', [usersController::class, 'editPassword'])->middleware('role:admin');
Route::put('/users/update-password/{id}', [usersController::class, 'updatePassword'])->middleware('role:admin');
Route::delete('/users/delete/{id}', [usersController::class, 'delete'])->middleware('role:admin');
Route::post('/users/import', [usersController::class, 'import'])->middleware('role:admin');

Route::get('/fasilitas', [FasilitasController::class, 'index'])->middleware('role:admin');
Route::get('/fasilitas/tambah', [FasilitasController::class, 'tambah'])->middleware('role:admin');
Route::post('/fasilitas/store', [FasilitasController::class, 'store'])->middleware('role:admin');
Route::get('/fasilitas/edit/{id}', [FasilitasController::class, 'edit'])->middleware('role:admin');
Route::put('/fasilitas/update/{id}', [FasilitasController::class, 'update'])->middleware('role:admin');
Route::delete('/fasilitas/delete/{id}', [FasilitasController::class, 'delete'])->middleware('role:admin');

Route::get('/kontak', [KontakController::class, 'index'])->middleware('role:admin');
Route::get('/kontak/tambah', [KontakController::class, 'tambah'])->middleware('role:admin');
Route::post('/kontak/store', [KontakController::class, 'store'])->middleware('role:admin');
Route::get('/kontak/edit/{id}', [KontakController::class, 'edit'])->middleware('role:admin');
Route::put('/kontak/update/{id}', [KontakController::class, 'update'])->middleware('role:admin');
Route::delete('/kontak/delete/{id}', [KontakController::class, 'delete'])->middleware('role:admin');

Route::get('/tata-tertib', [TataTertibController::class, 'index'])->middleware('role:admin');
Route::get('/tata-tertib/tambah', [TataTertibController::class, 'tambah'])->middleware('role:admin');
Route::post('/tata-tertib/store', [TataTertibController::class, 'store'])->middleware('role:admin');
Route::get('/tata-tertib/edit/{id}', [TataTertibController::class, 'edit'])->middleware('role:admin');
Route::put('/tata-tertib/update/{id}', [TataTertibController::class, 'update'])->middleware('role:admin');
Route::delete('/tata-tertib/delete/{id}', [TataTertibController::class, 'delete'])->middleware('role:admin');

Route::get('/pengurus', [PengurusController::class, 'index'])->middleware('role:admin');
Route::get('/pengurus/tambah', [PengurusController::class, 'tambah'])->middleware('role:admin');
Route::post('/pengurus/store', [PengurusController::class, 'store'])->middleware('role:admin');
Route::get('/pengurus/edit/{id}', [PengurusController::class, 'edit'])->middleware('role:admin');
Route::put('/pengurus/update/{id}', [PengurusController::class, 'update'])->middleware('role:admin');
Route::delete('/pengurus/delete/{id}', [PengurusController::class, 'delete'])->middleware('role:admin');

Route::get('/ipkl', [IPKLController::class, 'index'])->middleware('role:admin');
Route::get('/ipkl/export', [IPKLController::class, 'export'])->middleware('role:admin');
Route::get('/ipkl/tambah', [IPKLController::class, 'tambah'])->middleware('role:admin');
Route::post('/ipkl/store', [IPKLController::class, 'store'])->middleware('role:admin');
Route::get('/ipkl/edit/{id}', [IPKLController::class, 'edit'])->middleware('role:admin');
Route::put('/ipkl/update/{id}', [IPKLController::class, 'update'])->middleware('role:admin');
Route::get('/ipkl/show/{id}', [IPKLController::class, 'show'])->middleware('role:admin');
Route::delete('/ipkl/delete/{id}', [IPKLController::class, 'delete'])->middleware('role:admin');

Route::get('/laporan-ipkl', [IPKLController::class, 'laporanIpkl'])->middleware('role:admin');
Route::get('/laporan-ipkl/export', [IPKLController::class, 'laporanIpklExport'])->middleware('role:admin');

Route::get('/pengeluaran', [PengeluaranController::class, 'index'])->middleware('role:admin');
Route::get('/pengeluaran/export', [PengeluaranController::class, 'export'])->middleware('role:admin');
Route::get('/pengeluaran/tambah', [PengeluaranController::class, 'tambah'])->middleware('role:admin');
Route::post('/pengeluaran/store', [PengeluaranController::class, 'store'])->middleware('role:admin');
Route::get('/pengeluaran/edit/{id}', [PengeluaranController::class, 'edit'])->middleware('role:admin');
Route::put('/pengeluaran/update/{id}', [PengeluaranController::class, 'update'])->middleware('role:admin');
Route::get('/pengeluaran/show/{id}', [PengeluaranController::class, 'show'])->middleware('role:admin');
Route::delete('/pengeluaran/delete/{id}', [PengeluaranController::class, 'delete'])->middleware('role:admin');

Route::get('/laporan-pengeluaran', [PengeluaranController::class, 'laporanPengeluaran'])->middleware('role:user');
Route::get('/laporan-pengeluaran/show/{id}', [PengeluaranController::class, 'laporanPengeluaranShow'])->middleware('role:user');

Route::get('/my-ipkl', [IPKLController::class, 'myIpkl'])->middleware('role:user');
Route::get('/my-ipkl/show/{id}', [IPKLController::class, 'myIpklShow']);

Route::get('/laporan-keuangan', [TransactionController::class, 'laporanKeuangan'])->middleware('role:user');

Route::get('/my-profile', [usersController::class, 'myProfile'])->middleware('role:user');
Route::put('/my-profile/update/{id}', [usersController::class, 'myProfileUpdate'])->middleware('role:user');
Route::get('/ganti-password', [usersController::class, 'gantiPassword'])->middleware('role:user');
Route::put('/ganti-password/update/{id}', [usersController::class, 'gantiPasswordUpdate'])->middleware('role:user');

Route::resource('/roles', rolesController::class)->middleware('auth')->except('show');
Route::get('/switch/{id}', [authController::class, 'switch'])->middleware('auth');

Route::get('/reset', function () {
    Artisan::call('optimize');
    Artisan::call('config:cache');
    Artisan::call('route:clear');
    Artisan::call('migrate:fresh --seed');
    Artisan::call('storage:link');
});

Route::get('/optimize', function () {
    Artisan::call('optimize');
    Artisan::call('config:cache');
    Artisan::call('route:clear');
});

Route::get('/migrate', function () {
    Artisan::call('migrate');
});



