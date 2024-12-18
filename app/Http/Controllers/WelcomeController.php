<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IndividualRegistration;
use App\Models\GroupRegistration;

class WelcomeController extends Controller
{
    // Método para mostrar los juegos inscritos
    public function showJuegosInscritos()
    {
        // Obtener inscripciones individuales y grupales desde la base de datos
        $individualGames = IndividualRegistration::all();
        $groupGames = GroupRegistration::all();

        // Retornar la vista con los datos
        return view('juegos-inscritos', [
            'individualGames' => $individualGames,
            'groupGames' => $groupGames,
        ]);
    }
}
