<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Juego;
use Exception;

class EnfrentamientoController extends Controller
{
    public function generarEnfrentamientos()
    {
        try {
            // 1. Obtener el usuario autenticado.
            $user = auth()->user();

            // Validar que exista un usuario autenticado.
            if (!$user) {
                return redirect()->back()->with('error', 'No hay usuario autenticado.');
            }

            // 2. Buscar en la tabla "juegos" el id cuyo "coordinador_id" coincida con el id del usuario.
            $juegoId = Juego::query()
                ->where('coordinador_id', $user->id)
                ->value('id');

            // Si no se encuentra ningún juego, se puede definir un comportamiento alternativo.
            if (!$juegoId) {
                return redirect()->back()->with('error', 'No se encontró un juego para este coordinador.');
            }

            // 3. Ejecutar la función SQL tres_ord_alt_idjuego_imp pasando el parámetro $juegoId.
            DB::select('SELECT public.tres_ord_alt_idjuego_imp(?);', [$juegoId]);

            return redirect()->back()->with('success', 'Enfrentamientos generados exitosamente mediante la función tres_ord_alt_idjuego_imp.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Error al generar enfrentamientos: ' . $e->getMessage());
        }
    }
}
