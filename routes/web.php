<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/auth', function () {
    return view('auth');
})->name('auth');

Route::get('/', [HomeController::class, 'home'])->name('home');

Route::get('/registration',[HomeController::class, 'registration'])->name('registration');

Route::get('/login',[HomeController::class, 'login'])->name('login');

// Route::get('/term-and-condition', [HomeController::class, 'term'])->name('term');

// Route::get('/previous-seminar-and-publication', [HomeController::class, 'previous'])->name('previous');

// Route::get('/template', [HomeController::class, 'template'])->name('template');

// Route::get('/gallery', [HomeController::class, 'gallery'])->name('gallery');