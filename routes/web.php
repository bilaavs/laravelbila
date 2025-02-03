<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GenreController; // Import GenreController

// Halaman utama
Route::get('/', function () {
    return view('welcome');
});

// Route ke master template
Route::get('/master', function () {
    return view('template/master');
});

// Route ke films
Route::get('/films', function () {
    return view('template/separate/films');
})->name('films');

// Route ke genres - Gunakan Controller
Route::get('/genres', [GenreController::class, 'index'])->name('genres');
Route::post('/genres', [GenreController::class, 'store'])->name('genres.store');
Route::delete('/genres/{id}', [GenreController::class, 'destroy'])->name('genres.destroy');

