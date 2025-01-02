<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // Este método ya se encarga de validar y autenticar las credenciales
        $request->authenticate();

        // Regeneramos la sesión para evitar fijación de sesión
        $request->session()->regenerate();

        // Dependiendo del rol del usuario autenticado, redirigimos:
        $user = $request->user();

        switch ($user->rol_id) {
            case 1:
                // Administrador
                return redirect()->intended('/admin');
                // O si prefieres un named route, por ejemplo:
                // return redirect()->intended(route('admin.dashboard'));
            case 2:
                // Coordinador
                return redirect()->intended('/coordinador');
            case 3:
                // Tesorero
                return redirect()->intended('/tesorero');
            case 4:
                // Participante
                return redirect()->intended('/participante');
            default:
                // Rol no definido, redirige a alguna ruta de fallback
                return redirect('/');
        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
