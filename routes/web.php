<?php

use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\DashboardAnggotaController;
use App\Http\Controllers\DashboardBukuController;
use App\Http\Controllers\DashboardController;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;

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
    return view('profil');
})->name('profil');

Route::controller(BukuController::class)->group(function () {
    Route::get('/home', 'index')->name('home');
    Route::get('/buku', 'AllBuku')->name('buku');
    Route::get('/book/{slug}', 'detailBuku')->name('detail-buku');
    Route::get('/search', 'search')->name('search');
});

Route::controller(AuthController::class)->group(function () {
    Route::post('/auth/login', 'login');
    Route::post('/auth/logout', 'logout')->name('logout');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::resource('/dashboard/anggota', DashboardAnggotaController::class);
Route::resource('/dashboard/buku', DashboardBukuController::class);
Route::get('anggota-export', [AnggotaController::class, 'export']);
Route::get('buku-export', [BukuController::class, 'export']);
