<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

Route::get('/', function () {
    return view('pages.home', ['layout' => 'layouts.app-blank']);
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

// New route for the dashboard
Route::get('/dashboard', function () {
    return view('pages.dashboard', ['layout' => 'layouts.app']);
})->name('dashboard');

Route::get('/password/reset', function () {
    return view('auth.passwords.email');
})->name('password.request');
