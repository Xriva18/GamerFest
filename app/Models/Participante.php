<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Participante extends Model
{
    // Define la tabla en caso de que no siga la convención plural
    protected $table = 'participantes';

    // La clave primaria es "id" y es autoincremental (bigint, por ejemplo)
    protected $primaryKey = 'id';
    public $incrementing = true;

    // Asumimos que usamos casts para campos numéricos
    protected $casts = [
        'id' => 'integer',
        'usuario_id' => 'integer',
        'juego_id' => 'integer',
        'equipo_id' => 'integer',
    ];

    // Los campos que pueden asignarse en masa
    protected $fillable = [
        'usuario_id',
        'juego_id',
        'tipo',
        'equipo_id',
        'estado_juego',
    ];

    // Ejemplo de relación: Un participante pertenece a un juego
    public function juego(): BelongsTo
    {
        return $this->belongsTo(Juego::class, 'juego_id');
    }

    // Ejemplo de relación: Un participante tiene muchos enfrentamientos como inscripcion1
    public function enfrentamientosComoInscripcion1(): HasMany
    {
        return $this->hasMany(Enfrentamiento::class, 'inscripcion_1_id');
    }

    // Ejemplo de relación: Un participante tiene muchos enfrentamientos como inscripcion2
    public function enfrentamientosComoInscripcion2(): HasMany
    {
        return $this->hasMany(Enfrentamiento::class, 'inscripcion_2_id');
    }
}
