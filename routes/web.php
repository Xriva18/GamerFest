<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/logo', [App\Http\Controllers\LogoController::class, 'show'])->name('logo');