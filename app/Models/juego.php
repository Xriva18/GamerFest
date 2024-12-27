<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Juego extends Model
{
    public $timestamps = false; // Deshabilitar timestamps

    protected $table = 'juegos';

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

    public function coordinadorTemporal()
    {
        return $this->belongsTo(CoordinadorTemporal::class, 'coordinador_id', 'id_cod');
    }

    public function inscripciones()
    {
        return $this->hasMany(Inscripcion::class, 'juego_id');
    }
}
