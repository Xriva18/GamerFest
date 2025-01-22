<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MarioJugadores extends Model
{
    // Define la tabla asociada con el modelo
    protected $table = 'public.mario_kart_aprobados_view';

    // Define la clave primaria de la vista
    protected $primaryKey = 'id';

    // Indica que la clave primaria no es autoincremental
    public $incrementing = true;

    // Define el tipo de la clave primaria
    protected $keyType = 'integer';

    // Indica que la tabla no tiene columnas de timestamps
    public $timestamps = false;

    // Lista de atributos asignables masivamente
    protected $fillable = [
        'jugador_nombre_completo',
        'equipo_nombre',
    ];
}
