<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\PeranController;
use App\Http\Controllers\CastController;
use App\Http\Controllers\GenreController;

// Halaman utama
Route::get('/', function () {
    return view('welcome');
});

// Route ke master template
Route::get('/master', function () {
    return view('template/master');
});

// Routes untuk Films
Route::get('/films', [FilmController::class, 'index'])->name('films');
Route::post('/films', [FilmController::class, 'store'])->name('films.store');
Route::delete('/films/{id}', [FilmController::class, 'destroy'])->name('films.destroy');

// Routes untuk Peran
Route::get('/perans', [PeranController::class, 'index'])->name('perans');
Route::post('/perans', [PeranController::class, 'store'])->name('perans.store');
Route::delete('/perans/{id}', [PeranController::class, 'destroy'])->name('perans.destroy');

// Routes untuk Cast
Route::get('/casts', [CastController::class, 'index'])->name('casts');
Route::post('/casts', [CastController::class, 'store'])->name('casts.store');
Route::delete('/casts/{id}', [CastController::class, 'destroy'])->name('casts.destroy');

// Routes untuk Genre
Route::get('/genres', [GenreController::class, 'index'])->name('genres');
Route::post('/genres', [GenreController::class, 'store'])->name('genres.store');
Route::delete('/genres/{id}', [GenreController::class, 'destroy'])->name('genres.destroy');
