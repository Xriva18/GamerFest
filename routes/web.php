<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UniversidadController;
use App\Http\Controllers\FileUploadController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

/*Route::get('/', function (Request $request) {
    // Cerrar la sesión del usuario
    Auth::logout();

    // Invalidar la sesión actual
    $request->session()->invalidate();

    // Regenerar el token de la sesión para prevenir ataques de tipo CSRF
    $request->session()->regenerateToken();

    // Retornar la vista de bienvenida
    return view('welcome');
});*/

Route::get('/', function () {
    return view('welcome');
});

/*Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');*/

Route::get('/bienvenido', function () {
    return view('bienvenido');
})->name('bienvenido');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/admin', function () {
        $user = Auth::user();

        // Validar el rol_id para el panel de administrador
        if ($user->rol_id !== 1) {
            abort(403, 'No tienes permiso para acceder al panel de administrador.');
        }

        // Redirigir al path del PanelProvider correspondiente
        return redirect('/administrador'); // Path configurado en AdminPanelProvider
    })->name('admin.panel');

    Route::get('/coordinador', function () {
        $user = Auth::user();

        // Validar el rol_id para el panel de coordinador
        if ($user->rol_id !== 2) {
            abort(403, 'No tienes permiso para acceder al panel de coordinador.');
        }

        return redirect('/coordinadorJuego'); // Path configurado en CoordinadorPanelProvider
    })->name('coordinador.panel');

    Route::get('/tesorero', function () {
        $user = Auth::user();

        // Validar el rol_id para el panel de tesorero
        if ($user->rol_id !== 3) {
            abort(403, 'No tienes permiso para acceder al panel de tesorero.');
        }

        return redirect('/tesoreroJuego'); // Path configurado en TesoreroPanelProvider
    })->name('tesorero.panel');

    Route::get('/participante', function () {
        $user = Auth::user();

        // Validar el rol_id para el panel de participante
        if ($user->rol_id !== 4) {
            abort(403, 'No tienes permiso para acceder al panel de participante.');
        }

        return redirect('/participanteJuego'); // Path configurado en ParticipantePanelProvider
    })->name('participante.panel');
});

Route::get('/universidades', [UniversidadController::class, 'index'])->name('universidades.index');


Route::get('/inscripcion', function () {
    return view('inscripcion');
})->name('inscripcion');

Route::get('fileupload', [FileUploadController::class, 'create'])->name('fileupload.create');
Route::post('fileupload', [FileUploadController::class, 'store'])->name('fileupload.store');


Route::get('login', [AuthenticatedSessionController::class, 'create'])
    ->name('login');

Route::post('login', [AuthenticatedSessionController::class, 'store']);

require __DIR__ . '/auth.php';
