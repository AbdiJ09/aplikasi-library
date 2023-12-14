<?php

use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PengembalianController;
use App\Http\Controllers\DashboardBukuController;
use App\Http\Controllers\DashboardAnggotaController;
use App\Http\Controllers\DashboardPetugasController;
use App\Http\Controllers\DashboardPeminjamanController;
use App\Http\Controllers\DashboardPengembalianController;
use App\Http\Controllers\ProfileController;
use App\Models\Buku;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('components.landingPage.landingPage');
});
Route::get('/profil', function () {
    return view('profil', [
        'petugas' => User::with('Peminjaman')->where('level', 'petugas')->get(),
        'buku' => Buku::count(),
        'admin' => User::where('level', 'admin')->count(),
    ]);
})->name('profil');
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::controller(BukuController::class)->group(function () {
    Route::get('/home', 'index')->name('home');
    Route::get('/buku', 'AllBuku')->name('buku');
    Route::get('/book/{slug}', 'detailBuku')->name('detail-buku');
    Route::get('/search', 'search')->name('search');
});
Route::controller(AuthController::class)->group(function () {
    Route::post('/auth/login', 'login');
    Route::get('/auth/logout', 'logout')->name('logout');
});
Route::controller(PeminjamanController::class)->group(function () {
    Route::get('/peminjaman', 'index')->name('peminjaman');
    Route::get('search-peminjaman', 'searchPeminjaman')->name('search-peminjaman');
    Route::get('/show-data', 'showData')->name('show-data');
    Route::post('/siswa/pinjam/{slug}', 'pinjamBuku')->name('pinjam-buku');
});
Route::controller(PengembalianController::class)->group(function () {
    Route::get('/pengembalian', 'index')->name('pengembalian');
    Route::get('search-pengembalian', 'searchPengembalian')->name('search-pengembalian');
});
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('/dashboard/anggota', DashboardAnggotaController::class);
    Route::resource('/dashboard/buku', DashboardBukuController::class);
    Route::get('anggota-export', [AnggotaController::class, 'export']);
    Route::get('buku-export', [BukuController::class, 'export']);
    Route::resource('/dashboard/peminjaman', DashboardPeminjamanController::class);
    Route::resource('/dashboard/pengembalian', DashboardPengembalianController::class);
    Route::resource('/dashboard/petugas', DashboardPetugasController::class);
    Route::post('anggota-import', [AnggotaController::class, 'import'])->name('anggota-import');
    Route::post('buku-import', [DashboardBukuController::class, 'import'])->name('buku-import');
    Route::post('peminjaman-import', [DashboardPeminjamanController::class, 'import'])->name('peminjaman-import');
});

Route::get('/status-pengembalian', [PengembalianController::class, 'statusPengembalian'])->name('status-pengembalian');
