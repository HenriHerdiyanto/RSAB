<?php

use App\Http\Controllers\PasienController;
use App\Http\Middleware\RoleMiddleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route User
Route::middleware([RoleMiddleware::class . ':user'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});

// Route Admin
Route::middleware([RoleMiddleware::class . ':admin'])->group(function () {
    Route::get('/admin', function () {
        return view('admin.dashboard'); // misal buat view khusus admin
    })->name('admin.dashboard');

    // pasien
    Route::resource('pasien', PasienController::class);
});
