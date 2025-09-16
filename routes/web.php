<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FileUploadController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

Route::get('/', function () {
    return view('home');
})->name('home');

// Semua route di bawah ini hanya untuk user yang sudah login
Route::middleware(['auth'])->group(function () {
    // Dashboard
    Route::get('/dashboard', function () {
        return view('profile.dashboard', ['user' => auth()->user()]);
    })->name('dashboard');

    // Profile Management
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Upload Abstract
    Route::post('/upload/abstract', [FileUploadController::class, 'storeAbstract'])->name('upload.abstract');

    // Upload Full Paper
    Route::post('/upload/fullpaper', [FileUploadController::class, 'storeFullPaper'])->name('upload.fullpaper');
    
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->name('logout');
});

// Only for admin
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::delete('/users/{user}', [App\Http\Controllers\AdminController::class, 'destroy'])->name('admin.users.destroy');
});

require __DIR__.'/auth.php';
