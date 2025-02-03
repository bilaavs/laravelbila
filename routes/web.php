<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
   
Route::get('/master', function () {
    return view('template/master');
});

Route::get('/films', function () {
    return view('template/separate/films');
})->name('films');