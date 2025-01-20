<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ea25Jugadores extends Model
{
    // Define la tabla asociada con el modelo
    protected $table = 'public.ea_25_aprobados_view';

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
