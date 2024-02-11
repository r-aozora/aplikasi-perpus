<?php

use App\Http\Controllers\Dashboard\BukuController;
use App\Http\Controllers\Dashboard\KategoriController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\KoleksiController;
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

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard.dashboard')
        ->with([
            'title' => 'Dashboard',
            'active' => 'Dashboard',
        ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::middleware('role:admin,pustakawan')->group(function () {
        Route::prefix('dashboard')->group(function () {
            Route::prefix('perpustakaan')->group(function () {
                Route::resource('buku', BukuController::class);
    
                Route::resource('kategori', KategoriController::class);
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
            Route::resource('pustaka', PustakaController::class);

            Route::resource('koleksi', KoleksiController::class);
        });
    });
});

Route::middleware('auth')->group(function () {
    Route::prefix('dashboard')->group(function () {
        Route::prefix('pengaturan')->group(function () {
            Route::get('/profil', [ProfileController::class, 'edit'])->name('profile.edit');
            Route::patch('/profil', [ProfileController::class, 'update'])->name('profile.update');
            Route::delete('/profil', [ProfileController::class, 'destroy'])->name('profile.destroy');
        });

        Route::resource('ulasan', UlasanController::class);
    });
});

require __DIR__.'/auth.php';
