<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CutiController;

Route::get('/', function () {
    return view('pages.home');
})->name('home');

// Autentikasi
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard')
    ->middleware('auth');

// Pegawai Resource Routes
Route::resource('pegawai', PegawaiController::class)
    ->middleware('auth');

// Cuti Resource Routes
Route::middleware(['auth'])->group(function () {
    Route::resource('cuti', CutiController::class);
});
Route::get('cuti/{cuti}', [CutiController::class, 'show'])->name('cuti.show');

