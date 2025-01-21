<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PegawaiController;

Route::get('/', function () {
    return view('pages.home', ['layout' => 'layouts.app-blank']);
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

// New route for the dashboard
Route::get('/dashboard', function () {
    return view('pages.dashboard', ['layout' => 'layouts.app']);
})->name('dashboard');

// Updated route for the pegawai page
Route::get('/pegawai', [PegawaiController::class, 'index'])->name('pegawai.index');
Route::resource('pegawai', PegawaiController::class);

Route::get('/password/reset', function () {
    return view('auth.passwords.email');
})->name('password.request');
