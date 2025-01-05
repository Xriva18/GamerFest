<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class equipo extends Model
{
    // Nombre de la tabla en la base de datos
    protected $table = 'equipos';

    // Atributos que se pueden asignar masivamente
    protected $fillable = [
        'nombre',
        'lider_id',
    ];

    // Relación con el modelo User (Líder)
    public function lider()
    {
        return $this->belongsTo(User::class, 'lider_id');
    }

    // Relación con inscripciones (si aplica)
    public function inscripciones()
    {
        return $this->hasMany(Inscripcion::class, 'equipo_id');
    }
}
