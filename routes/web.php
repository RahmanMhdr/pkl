v<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PerusahaanController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\DepartemenController;
use App\Http\Controllers\ProyekController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

// Halaman awal (bisa redirect ke dashboard jika sudah login)
Route::get('/', function () {
    return view('welcome');
})->name('home');

// ====== AUTHENTICATION (Login/Register) ======
// Halaman Register
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Halaman Login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

// Logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


// ====== ROUTE YANG DIJAGA LOGIN (AUTH) ======
Route::middleware(['auth'])->group(function () {
    Route::resource('perusahaan', PerusahaanController::class);
    Route::resource('karyawan', KaryawanController::class);
    Route::resource('departemen', DepartemenController::class);
    Route::resource('proyek', ProyekController::class);
});
