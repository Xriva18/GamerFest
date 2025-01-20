<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Exception;

class EnfrentamientoController extends Controller
{
    public function generarEnfrentamientos()
    {
        try {
            // Ejecutar la función SQL uno_ordenamiento_aleatorio
            DB::select('SELECT public.uno_ordenamiento_aleatorio();');

            return redirect()->back()->with('success', 'Enfrentamientos generados exitosamente mediante la función uno_ordenamiento_aleatorio.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Error al generar enfrentamientos: ' . $e->getMessage());
        }
    }
}
