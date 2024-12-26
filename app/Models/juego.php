<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class juego extends Model
{
    // Nombre de la tabla en la base de datos
    protected $table = 'juegos';

    // Atributos que se pueden asignar masivamente
    protected $fillable = [
        'nombre',
        'imagen',
        'precio',
        'cantidad_participantes',
        'horario',
        'lugar',
        'tipo',
        'coordinador_id',
    ];

    // Relación con el modelo User (Coordinador)
    public function coordinador()
    {
        return $this->belongsTo(User::class, 'coordinador_id');
    }

    // Relación con el modelo Inscripcion (si existe)
    public function inscripciones()
    {
        return $this->hasMany(Inscripcion::class, 'juego_id');
    }
}
