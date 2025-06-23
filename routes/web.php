<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\authController;
use App\Http\Controllers\IPKLController;
use App\Http\Controllers\UmkmController;
use App\Http\Controllers\AgamaController;
use App\Http\Controllers\rolesController;
use App\Http\Controllers\usersController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\DonasiController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\GateCardController;
use App\Http\Controllers\OlahragaController;
use App\Http\Controllers\PengurusController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\TataTertibController;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\KritiksSaranController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\InfrastrukturController;
use App\Http\Controllers\SuratPengantarController;
use App\Http\Controllers\SuratIzinRenovasiController;

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

Route::get('/umkm', [authController::class, 'umkm'])->middleware('islogin');
Route::get('/umkm/detail/{id}', [authController::class, 'detailUmkm'])->middleware('islogin');

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
Route::get('/users/updateRw', [usersController::class, 'updateRw'])->middleware('role:admin');

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
Route::get('/ipkl/tambah/peruser', [IPKLController::class, 'tambahPerUser'])->middleware('role:admin');
Route::post('/ipkl/store/peruser', [IPKLController::class, 'storePerUser'])->middleware('role:admin');
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
Route::post('/pengeluaran/status/{id}', [PengeluaranController::class, 'status'])->middleware('role:admin');

Route::get('/pengeluaran/fix', [PengeluaranController::class, 'fix'])->middleware('role:admin');

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
Route::get('/switch/{id}', [authController::class, 'switch']);

Route::get('/kritik-saran', [KritiksSaranController::class, 'index'])->middleware('role:admin');
Route::get('/kritik-saran/export', [KritiksSaranController::class, 'export'])->middleware('role:admin');
Route::get('/kritik-saran/show/{id}', [KritiksSaranController::class, 'show'])->middleware('role:admin');
Route::post('/kritik-saran/approval/{id}', [KritiksSaranController::class, 'approval'])->middleware('role:admin');

Route::get('/my-kritik-saran', [KritiksSaranController::class, 'myKritikSaran'])->middleware('role:user');
Route::get('/my-kritik-saran/tambah', [KritiksSaranController::class, 'tambahMyKritikSaran'])->middleware('role:user');
Route::post('/my-kritik-saran/store', [KritiksSaranController::class, 'storeMyKritikSaran'])->middleware('role:user');
Route::get('/my-kritik-saran/show/{id}', [KritiksSaranController::class, 'showMyKritikSaran'])->middleware('role:user');
Route::get('/my-kritik-saran/edit/{id}', [KritiksSaranController::class, 'editMyKritikSaran'])->middleware('role:user');
Route::put('/my-kritik-saran/update/{id}', [KritiksSaranController::class, 'updateMyKritikSaran'])->middleware('role:user');
Route::get('/my-kritik-saran/delete/{id}', [KritiksSaranController::class, 'deleteMyKritikSaran'])->middleware('role:user');

Route::get('/donasi', [DonasiController::class, 'index'])->middleware('role:admin');
Route::get('/donasi/show/{id}', [DonasiController::class, 'show'])->middleware('role:admin');
Route::post('/donasi/approval/{id}', [DonasiController::class, 'approval'])->middleware('role:admin');
Route::get('/donasi/export', [DonasiController::class, 'export'])->middleware('role:admin');

Route::get('/laporan-donasi', [DonasiController::class, 'laporanDonasi'])->middleware('role:admin');
Route::get('/laporan-donasi/export', [DonasiController::class, 'laporanDonasiExport'])->middleware('role:admin');

Route::get('/my-donasi', [DonasiController::class, 'myDonasi'])->middleware('role:user');
Route::get('/my-donasi/tambah', [DonasiController::class, 'tambahMyDonasi'])->middleware('role:user');
Route::post('/my-donasi/store', [DonasiController::class, 'storeMyDonasi'])->middleware('role:user');
Route::get('/my-donasi/show/{id}', [DonasiController::class, 'showMyDonasi'])->middleware('role:user');
Route::post('/my-donasi/upload/{id}', [DonasiController::class, 'uploadMyDonasi'])->middleware('role:user');
Route::get('/my-donasi/edit/{id}', [DonasiController::class, 'editMyDonasi'])->middleware('role:user');
Route::put('/my-donasi/update/{id}', [DonasiController::class, 'updateMyDonasi'])->middleware('role:user');
Route::get('/my-donasi/delete/{id}', [DonasiController::class, 'deleteMyDonasi'])->middleware('role:user');

Route::get('/gate-card', [GateCardController::class, 'index'])->middleware('role:admin');
Route::get('/gate-card/show/{id}', [GateCardController::class, 'show'])->middleware('role:admin');
Route::post('/gate-card/approval/{id}', [GateCardController::class, 'approval'])->middleware('role:admin');
Route::get('/gate-card/export', [GateCardController::class, 'export'])->middleware('role:admin');

Route::get('/my-gate-card', [GateCardController::class, 'myGateCard'])->middleware('role:user');
Route::get('/my-gate-card/tambah', [GateCardController::class, 'tambahMyGateCard'])->middleware('role:user');
Route::post('/my-gate-card/store', [GateCardController::class, 'storeMyGateCard'])->middleware('role:user');
Route::get('/my-gate-card/show/{id}', [GateCardController::class, 'showMyGateCard'])->middleware('role:user');
Route::post('/my-gate-card/upload/{id}', [GateCardController::class, 'uploadMyGateCard'])->middleware('role:user');
Route::get('/my-gate-card/edit/{id}', [GateCardController::class, 'editMyGateCard'])->middleware('role:user');
Route::put('/my-gate-card/update/{id}', [GateCardController::class, 'updateMyGateCard'])->middleware('role:user');
Route::get('/my-gate-card/delete/{id}', [GateCardController::class, 'deleteMyGateCard'])->middleware('role:user');

Route::get('/surat-pengantar', [SuratPengantarController::class, 'index'])->middleware('role:admin');
Route::get('/surat-pengantar/print/{id}', [SuratPengantarController::class, 'print'])->middleware('role:admin');

Route::get('/my-surat-pengantar', [SuratPengantarController::class, 'mySuratPengantar'])->middleware('role:user');
Route::get('/my-surat-pengantar/tambah', [SuratPengantarController::class, 'tambahMySuratPengantar'])->middleware('role:user');
Route::post('/my-surat-pengantar/store', [SuratPengantarController::class, 'storeMySuratPengantar'])->middleware('role:user');
Route::get('/my-surat-pengantar/show/{id}', [SuratPengantarController::class, 'showMySuratPengantar'])->middleware('role:user');
Route::get('/my-surat-pengantar/print/{id}', [SuratPengantarController::class, 'printMySuratPengantar'])->middleware('role:user');
Route::get('/my-surat-pengantar/edit/{id}', [SuratPengantarController::class, 'editMySuratPengantar'])->middleware('role:user');
Route::put('/my-surat-pengantar/update/{id}', [SuratPengantarController::class, 'updateMySuratPengantar'])->middleware('role:user');
Route::get('/my-surat-pengantar/delete/{id}', [SuratPengantarController::class, 'deleteMySuratPengantar'])->middleware('role:user');
Route::get('/my-surat-pengantar/getKeluarga', [SuratPengantarController::class, 'getKeluarga'])->middleware('role:user');

Route::get('/surat-izin-renovasi', [SuratIzinRenovasiController::class, 'index'])->middleware('role:admin');
Route::get('/surat-izin-renovasi/print/{id}', [SuratIzinRenovasiController::class, 'print'])->middleware('role:admin');

Route::get('/my-surat-izin-renovasi', [SuratIzinRenovasiController::class, 'mySuratIzinRenovasi'])->middleware('role:user');
Route::get('/my-surat-izin-renovasi/tambah', [SuratIzinRenovasiController::class, 'tambahMySuratIzinRenovasi'])->middleware('role:user');
Route::post('/my-surat-izin-renovasi/store', [SuratIzinRenovasiController::class, 'storeMySuratIzinRenovasi'])->middleware('role:user');
Route::get('/my-surat-izin-renovasi/show/{id}', [SuratIzinRenovasiController::class, 'showMySuratIzinRenovasi'])->middleware('role:user');
Route::get('/my-surat-izin-renovasi/print/{id}', [SuratIzinRenovasiController::class, 'printMySuratIzinRenovasi'])->middleware('role:user');
Route::get('/my-surat-izin-renovasi/edit/{id}', [SuratIzinRenovasiController::class, 'editMySuratIzinRenovasi'])->middleware('role:user');
Route::put('/my-surat-izin-renovasi/update/{id}', [SuratIzinRenovasiController::class, 'updateMySuratIzinRenovasi'])->middleware('role:user');
Route::get('/my-surat-izin-renovasi/delete/{id}', [SuratIzinRenovasiController::class, 'deleteMySuratIzinRenovasi'])->middleware('role:user');
Route::get('/my-surat-izin-renovasi/getKeluarga', [SuratIzinRenovasiController::class, 'getKeluarga'])->middleware('role:user');

Route::get('/berita', [BeritaController::class, 'index'])->middleware('role:admin');
Route::get('/berita/tambah', [BeritaController::class, 'tambah'])->middleware('role:admin');
Route::post('/berita/store', [BeritaController::class, 'store'])->middleware('role:admin');
Route::get('/berita/edit/{id}', [BeritaController::class, 'edit'])->middleware('role:admin');
Route::put('/berita/update/{id}', [BeritaController::class, 'update'])->middleware('role:admin');
Route::delete('/berita/delete/{id}', [BeritaController::class, 'delete'])->middleware('role:admin');

Route::get('/my-berita', [BeritaController::class, 'myBerita'])->middleware('role:user');
Route::get('/my-berita/show/{id}', [BeritaController::class, 'showMyBerita'])->middleware('role:user');

Route::get('/olahraga', [OlahragaController::class, 'index'])->middleware('role:admin');
Route::get('/olahraga/calendar', [OlahragaController::class, 'calendar'])->middleware('role:admin');
Route::get('/olahraga/tambah', [OlahragaController::class, 'tambah'])->middleware('role:admin');
Route::post('/olahraga/store', [OlahragaController::class, 'store'])->middleware('role:admin');
Route::get('/olahraga/edit/{id}', [OlahragaController::class, 'edit'])->middleware('role:admin');
Route::put('/olahraga/update/{id}', [OlahragaController::class, 'update'])->middleware('role:admin');
Route::delete('/olahraga/delete/{id}', [OlahragaController::class, 'delete'])->middleware('role:admin');

Route::get('/my-olahraga', [OlahragaController::class, 'myOlahraga'])->middleware('role:user');

Route::get('/social', [SocialController::class, 'index'])->middleware('role:admin');
Route::get('/social/calendar', [SocialController::class, 'calendar'])->middleware('role:admin');
Route::get('/social/tambah', [SocialController::class, 'tambah'])->middleware('role:admin');
Route::post('/social/store', [SocialController::class, 'store'])->middleware('role:admin');
Route::get('/social/edit/{id}', [SocialController::class, 'edit'])->middleware('role:admin');
Route::put('/social/update/{id}', [SocialController::class, 'update'])->middleware('role:admin');
Route::delete('/social/delete/{id}', [SocialController::class, 'delete'])->middleware('role:admin');

Route::get('/my-social', [SocialController::class, 'mySocial'])->middleware('role:user');

Route::get('/agama', [AgamaController::class, 'index'])->middleware('role:admin');
Route::get('/agama/calendar', [AgamaController::class, 'calendar'])->middleware('role:admin');
Route::get('/agama/tambah', [AgamaController::class, 'tambah'])->middleware('role:admin');
Route::post('/agama/store', [AgamaController::class, 'store'])->middleware('role:admin');
Route::get('/agama/edit/{id}', [AgamaController::class, 'edit'])->middleware('role:admin');
Route::put('/agama/update/{id}', [AgamaController::class, 'update'])->middleware('role:admin');
Route::delete('/agama/delete/{id}', [AgamaController::class, 'delete'])->middleware('role:admin');

Route::get('/my-agama', [AgamaController::class, 'myAgama'])->middleware('role:user');

Route::get('/infrastruktur', [InfrastrukturController::class, 'index'])->middleware('role:admin');
Route::get('/infrastruktur/tambah', [InfrastrukturController::class, 'tambah'])->middleware('role:admin');
Route::post('/infrastruktur/store', [InfrastrukturController::class, 'store'])->middleware('role:admin');
Route::get('/infrastruktur/show/{id}', [InfrastrukturController::class, 'show'])->middleware('role:admin');
Route::get('/infrastruktur/edit/{id}', [InfrastrukturController::class, 'edit'])->middleware('role:admin');
Route::put('/infrastruktur/update/{id}', [InfrastrukturController::class, 'update'])->middleware('role:admin');
Route::delete('/infrastruktur/delete/{id}', [InfrastrukturController::class, 'delete'])->middleware('role:admin');

Route::get('/my-infrastruktur', [InfrastrukturController::class, 'myInfrastruktur'])->middleware('role:user');
Route::get('/my-infrastruktur/show/{id}', [InfrastrukturController::class, 'showMyInfrastruktur'])->middleware('role:user');

Route::get('/my-umkm', [UmkmController::class, 'myUmkm'])->middleware('role:user');
Route::get('/my-umkm/tambah', [UmkmController::class, 'tambahMyUmkm'])->middleware('role:user');
Route::post('/my-umkm/store', [UmkmController::class, 'storeMyUmkm'])->middleware('role:user');
Route::get('/my-umkm/show/{id}', [UmkmController::class, 'showMyUmkm'])->middleware('role:user');
Route::get('/my-umkm/edit/{id}', [UmkmController::class, 'editMyUmkm'])->middleware('role:user');
Route::put('/my-umkm/update/{id}', [UmkmController::class, 'updateMyUmkm'])->middleware('role:user');
Route::get('/my-umkm/delete/{id}', [UmkmController::class, 'deleteMyUmkm'])->middleware('role:user');

Route::get('/reset', function () {
    Artisan::call('optimize');
    Artisan::call('config:cache');
    Artisan::call('route:clear');
    Artisan::call('migrate:fresh --seed');
    Artisan::call('storage:link');
});

Route::get('/link', function () {
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



