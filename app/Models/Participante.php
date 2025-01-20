<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Participante extends Model
{
    use HasFactory;
    public $timestamps = false;
    // Nombre de la tabla
    protected $table = 'participantes';

    // Campos asignables en masa
    protected $fillable = [
        'usuario_id',
        'juego_id',
        'tipo',
        'equipo_id',
        'estado_juego',
    ];

    // Valores predeterminados para atributos
    protected $attributes = [
        'estado_juego' => 'jugando',
    ];

    /**
     * Relaciones
     */

    // Relación con el modelo User (usuarios)
    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }

    // Relación con el modelo Juego
    public function juego()
    {
        return $this->belongsTo(Juego::class, 'juego_id');
    }

    // Relación con el modelo Equipo
    public function equipo()
    {
        return $this->belongsTo(Equipo::class, 'equipo_id');
    }
}
