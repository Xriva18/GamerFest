<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Participante;

class EnfrentamientoController extends Controller
{
    public function generarEnfrentamientos()
    {
        // Obtener todos los participantes
        $participantes = Participante::all();

        if ($participantes->isEmpty()) {
            return redirect()->back()->with('error', 'No hay participantes para generar enfrentamientos.');
        }

        // Convertir a array y mezclar aleatoriamente
        $participantesArray = $participantes->all();
        shuffle($participantesArray);

        DB::beginTransaction();

        try {
            // Truncate de la tabla enfrentamientos para reiniciarla
            DB::table('enfrentamientos')->truncate();

            $cantidad = count($participantesArray);
            for ($i = 0; $i < $cantidad; $i += 2) {
                $inscripcion1 = $participantesArray[$i];
                $inscripcion2 = ($i + 1) < $cantidad ? $participantesArray[$i + 1] : null;

                // Se toma el juego_id del primer participante.
                $juegoId = $inscripcion1->juego_id;

                \App\Models\Enfrentamiento::create([
                    'juego_id'         => $juegoId,
                    'inscripcion_1_id' => $inscripcion1->id,
                    'inscripcion_2_id' => $inscripcion2 ? $inscripcion2->id : null,
                    // updated_at se manejará automáticamente (o por defecto en la BD)
                ]);
            }

            DB::commit();

            return redirect()->back()->with('success', 'Enfrentamientos generados exitosamente.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Error al generar enfrentamientos: ' . $e->getMessage());
        }
    }
}
