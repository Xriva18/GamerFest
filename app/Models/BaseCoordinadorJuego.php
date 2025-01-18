<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class BaseCoordinadorJuego extends Model
{
    protected $table = 'juegos';

    // Campos asignables masivamente
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

    // Relación con el coordinador
    public function coordinador(): BelongsTo
    {
        return $this->belongsTo(CoordinadorTemporal::class, 'coordinador_id', 'id_cod');
    }

    // Casts personalizados
    protected $casts = [
        'precio' => 'decimal:2',
        'horario' => 'datetime',
    ];

    public $timestamps = false; // Deshabilita las marcas de tiempo
}
