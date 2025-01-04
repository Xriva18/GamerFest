<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UniversidadController;
use App\Http\Controllers\FileUploadController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/universidades', [UniversidadController::class, 'index'])->name('universidades.index');


Route::get('/inscripcion', function () {
    return view('inscripcion');
})->name('inscripcion');

Route::get('fileupload', [FileUploadController::class, 'create'])->name('fileupload.create');
Route::post('fileupload', [FileUploadController::class, 'store'])->name('fileupload.store');


require __DIR__ . '/auth.php';
