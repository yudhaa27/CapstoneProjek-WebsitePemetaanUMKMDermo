<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\UmkmController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes - Sistem Informasi Pemetaan UMKM Kelurahan Dermo
|--------------------------------------------------------------------------
*/

// ==========================================
// RUTE PUBLIK (Pengunjung Tanpa Perlu Login)
// ==========================================
Route::get('/', [PublicController::class, 'home'])->name('public.home');
Route::get('/peta', [PublicController::class, 'map'])->name('public.map');
Route::get('/api/peta-data', [PublicController::class, 'mapData'])->name('api.map.data');
Route::get('/umkm', [PublicController::class, 'list'])->name('public.list');
Route::get('/umkm/{slug}', [PublicController::class, 'detail'])->name('public.detail');

// ==========================================
// RUTE AUTENTIKASI ADMIN
// ==========================================
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ==========================================
// RUTE ADMIN (Memerlukan Autentikasi)
// ==========================================
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // CRUD UMKM
    Route::resource('umkm', UmkmController::class);
});
