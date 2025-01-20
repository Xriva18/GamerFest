<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Enfrentamiento extends Model
{
    // Define la tabla en caso de que no siga la convención plural
    protected $table = 'enfrentamientos';

    // La clave primaria es "id" y es autoincremental (bigserial)
    protected $primaryKey = 'id';
    public $incrementing = true;

    // Desactivamos el manejo de timestamps automáticos si sólo se usa updated_at
    public $timestamps = false;

    protected $casts = [
        'id'              => 'integer',
        'juego_id'        => 'integer',
        'inscripcion_1_id' => 'integer',
        'inscripcion_2_id' => 'integer',
        'updated_at'      => 'datetime',
    ];

    // Campos asignables en masa
    protected $fillable = [
        'juego_id',
        'inscripcion_1_id',
        'inscripcion_2_id',
        'updated_at'
    ];

    // Relaciones: Un enfrentamiento pertenece a un juego
    public function juego(): BelongsTo
    {
        return $this->belongsTo(Juego::class, 'juego_id');
    }

    // Relaciones: Un enfrentamiento pertenece a dos participantes
    public function inscripcion1(): BelongsTo
    {
        return $this->belongsTo(Participante::class, 'inscripcion_1_id');
    }

    public function inscripcion2(): BelongsTo
    {
        return $this->belongsTo(Participante::class, 'inscripcion_2_id');
    }
}
