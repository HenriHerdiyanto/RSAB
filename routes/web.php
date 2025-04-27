<?php

use App\Http\Controllers\AsuransiController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\RuangPelayananController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\RoleMiddleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route User
// Semua route butuh login
Route::middleware(['auth'])->group(function () {
    // Home (user biasa)
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // Admin Dashboard
    Route::get('/Dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    // Resource routes
    Route::resource('pasien', PasienController::class);
    Route::resource('dokter', DokterController::class);
    Route::resource('menus', MenuController::class);
    Route::resource('ruangpelayanans', RuangPelayananController::class);
    Route::resource('asuransis', AsuransiController::class);
    Route::resource('pegawai', PegawaiController::class);




    // Access Menu
    Route::post('user/{user}/give-access', [MenuController::class, 'giveAccess'])->name('user.give-access');
    Route::get('users/{user}/access', [UserController::class, 'accessMenu'])->name('users.access');
    Route::post('users/{user}/access', [UserController::class, 'updateAccessMenu'])->name('users.updateAccess');
    // dokter access
    Route::get('dokter/{user}/access', [UserController::class, 'accessMenuDokter'])->name('dokter.access');
    Route::post('dokter/{user}/access', [UserController::class, 'updateAccessMenuDokter'])->name('dokter.updateAccess');

    // pegawai access
    Route::get('pegawai/{user}/access', [UserController::class, 'accessMenuPegawai'])->name('pegawai.access');
    Route::post('pegawai/{user}/access', [UserController::class, 'updateAccessMenuPegawai'])->name('pegawai.updateAccess');
});
