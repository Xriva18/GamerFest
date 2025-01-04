<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UniversidadController;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/login', function (Request $request) {
    if (Auth::check()) {
        Auth::logout();
        // Opcional: Puedes invalidar la sesión y regenerar el token CSRF
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    }
    // Mostrar el formulario de inicio de sesión
    // Reutilizamos el método 'create' del AuthenticatedSessionController
    return app(AuthenticatedSessionController::class)->create($request);
})->name('login');

require __DIR__ . '/auth.php';
