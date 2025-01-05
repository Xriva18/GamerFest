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
     * Display the login view or redirect if already authenticated.
     */
    public function create(): View|RedirectResponse
    {
        if (Auth::check()) {
            $user = Auth::user();

            switch ($user->rol_id) {
                case 1:
                    return redirect('/admin');
                case 2:
                    return redirect('/coordinador');
                case 3:
                    return redirect('/tesorero');
                case 4:
                    return redirect('/participante');
                default:
                    return redirect('/');
            }
        }

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
                return redirect('/admin');
            case 2:
                return redirect('/coordinador');
            case 3:
                return redirect('/tesorero');
            case 4:
                return redirect('/participante');
            default:
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
