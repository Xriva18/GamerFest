<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\IndividualRegistrationController;
use App\Http\Controllers\GroupRegistrationController;

Route::get('/inscripcion-individual', [IndividualRegistrationController::class, 'create'])->name('individual.create');
Route::post('/inscripcion-individual', [IndividualRegistrationController::class, 'store'])->name('individual.store');

Route::get('/inscripcion-grupal', [GroupRegistrationController::class, 'create'])->name('group.create');
Route::post('/inscripcion-grupal', [GroupRegistrationController::class, 'store'])->name('group.store');

Route::get('/juegos-inscritos', [WelcomeController::class, 'showJuegosInscritos'])->name('juegos.inscritos');

Route::get('/', function () {
    return view('welcome');
});
