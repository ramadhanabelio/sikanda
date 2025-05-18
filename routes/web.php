<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AnggaranController;
use App\Http\Controllers\DashboardController;

Route::redirect('/', '/login');

// Auth routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.store');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.store');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/profile', [AuthController::class, 'showProfile'])->name('profile.edit');
Route::put('/profile/update', [AuthController::class, 'updateProfile'])->name('profile.update');

// Protected routes
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/anggaran', [AnggaranController::class, 'index'])->name('anggaran.index');
    Route::get('/anggaran/create', [AnggaranController::class, 'create'])->name('anggaran.create');
    Route::post('/anggaran', [AnggaranController::class, 'store'])->name('anggaran.store');
    Route::get('/anggaran/{id}/edit', [AnggaranController::class, 'edit'])->name('anggaran.edit');
    Route::put('/anggaran/{id}', [AnggaranController::class, 'update'])->name('anggaran.update');
    Route::delete('/anggaran/{id}', [AnggaranController::class, 'destroy'])->name('anggaran.destroy');
    Route::get('/laporan/export-pdf', [AnggaranController::class, 'exportPdf'])->name('laporan.export.pdf');
});
