<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class auspiciantes extends Model
{
    // Nombre de la tabla en la base de datos
    protected $table = 'auspiciantes';

    // Atributos que se pueden asignar masivamente
    protected $fillable = [
        'nombre',
        'imagen',
        'aportacion',
    ];
}
