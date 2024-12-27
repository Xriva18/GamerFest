<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UniversidadController extends Controller
{
    public function index()
    {
        // Endpoint y clave de Supabase
        $url = env('SUPABASE_URL') . '/rest/v1/universidades';
        $apiKey = env('SUPABASE_API_KEY');

        // Petición GET a Supabase
        $response = Http::withHeaders([
            'apikey' => $apiKey,
            'Authorization' => 'Bearer ' . $apiKey,
        ])->get($url, [
            'select' => 'id,nombre',
        ]);

        // Validar respuesta
        if ($response->ok()) {
            return response()->json($response->json());
        }

        return response()->json(['error' => 'No se pudieron cargar las universidades'], 500);
    }
}
