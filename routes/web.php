<?php

use App\Http\Controllers\Dashboard\BukuController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\KategoriController;
use App\Http\Controllers\Dashboard\KelolaPeminjamanController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\KoleksiController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PustakaController;
use App\Http\Controllers\UlasanController;
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

Route::get('/', [DashboardController::class, 'landing'])
    ->name('home');

Route::get('/dashboard', [DashboardController::class, 'dashboard'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::middleware('role:admin,pustakawan')->group(function () {
        Route::prefix('dashboard')->group(function () {
            Route::prefix('perpustakaan')->group(function () {
                Route::resource('buku', BukuController::class);
    
                Route::resource('kategori', KategoriController::class);

                Route::resource('peminjaman', KelolaPeminjamanController::class);
            });
        });
    });

    Route::middleware('role:admin')->group(function () {
        Route::prefix('dashboard/pengaturan')->group(function () {
            Route::resource('user', UserController::class);
        });
    });

    Route::middleware('role:pembaca')->group(function () {
        Route::prefix('dashboard')->group(function () {
            Route::prefix('perpustakaan')->group(function () {
                Route::get('pustaka', [PustakaController::class, 'index'])
                    ->name('pustaka.index');
                Route::get('pustaka/{buku}', [PustakaController::class, 'show'])
                    ->name('pustaka.show');
    
                Route::resource('koleksi', KoleksiController::class);
    
                Route::resource('pinjam', PeminjamanController::class);
            });
        });
    });
});

Route::middleware('auth')->group(function () {
    Route::prefix('dashboard')->group(function () {
        Route::prefix('perpustakaan')->group(function () {
            Route::resource('ulasan', UlasanController::class);
        });

        Route::prefix('pengaturan')->group(function () {
            Route::get('/profil', [ProfileController::class, 'edit'])->name('profile.edit');
            Route::patch('/profil', [ProfileController::class, 'update'])->name('profile.update');
            Route::delete('/profil', [ProfileController::class, 'destroy'])->name('profile.destroy');
        });
    });
});

require __DIR__.'/auth.php';
