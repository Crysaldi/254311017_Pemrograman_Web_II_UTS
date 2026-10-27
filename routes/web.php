<?php

use App\Http\Controllers\SumberEnergiController;
use App\Http\Controllers\InformasiEnergiController;

// Landing page & SPA fallback kelompok
Route::view('/', 'welcome')->name('home');

Route::view('/{path}', 'welcome')
    ->where('path', '^(login|register|artikel(/.*)?|kuis(/.*)?|hasil-kuis(/.*)?|forum(/.*)?|profil|admin(/.*)?)');

// Halaman Katalog Publik (Hanya READ untuk User)
Route::get('/informasi-energi', [InformasiEnergiController::class, 'index'])
    ->name('informasi-energi.index');

// Pengelolaan CRUD Khusus Admin (Terproteksi Auth)
Route::middleware('auth')->prefix('admin')->group(function () {
    Route::resource('sumber-energi', SumberEnergiController::class);
});