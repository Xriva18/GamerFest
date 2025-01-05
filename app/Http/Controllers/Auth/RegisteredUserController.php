<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('inscripcion');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name'         => ['required', 'string', 'max:255'],
            'email'        => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'     => ['required', 'confirmed', Rules\Password::defaults()],
            'apellido'     => ['required', 'string', 'max:255'],
            // Para validar que sea un entero y que exista en la tabla 'universidades'
            'universidad'  => ['required', 'integer', 'exists:universidades,id'],
        ]);

        $user = User::create([
            'name'           => $request->name,
            'email'          => $request->email,
            'password'       => Hash::make($request->password),
            'apellido'       => $request->apellido,
            // Guardamos el ID de la universidad en la columna 'universidad_id'
            'universidad_id' => $request->universidad,
        ]);

        event(new Registered($user));

        //Auth::login($user);

        return redirect(route('bienvenido', absolute: false));
    }
}
