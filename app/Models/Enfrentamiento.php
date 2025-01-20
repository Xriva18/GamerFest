<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enfrentamiento extends Model
{
    // Nombre de la tabla
    protected $table = 'enfrentamientos';

    // Llave primaria
    protected $primaryKey = 'id';

    // Indicamos que la clave primaria es autoincremental
    public $incrementing = true;

    // Tipo de la clave primaria
    protected $keyType = 'int';

    // Indicar si el modelo utiliza marcas de tiempo
    public $timestamps = false;

    // Atributos que se pueden asignar masivamente
    protected $fillable = [
        'jugador1',
        'jugador2',
        'equipo1',
        'equipo2',
        'juego_id',
    ];

    // Relaciones

    /**
     * Relación con el modelo Participante (jugador1).
     */
    /**
     * Relación con el modelo Participante para el jugador 1.
     */
    public function participante1()
    {
        return $this->belongsTo(Participante::class, 'jugador1');
    }

    /**
     * Relación con el modelo Participante para el jugador 2.
     */
    public function participante2()
    {
        return $this->belongsTo(Participante::class, 'jugador2');
    }

    // ...
    /**
     * Relación con el modelo Equipo (equipo1).
     */
    public function equipo1()
    {
        return $this->belongsTo(Equipo::class, 'equipo1');
    }

    /**
     * Relación con el modelo Equipo (equipo2).
     */
    public function equipo2()
    {
        return $this->belongsTo(Equipo::class, 'equipo2');
    }

    /**
     * Relación con el modelo Juego.
     */
    public function juego()
    {
        return $this->belongsTo(Juego::class, 'juego_id');
    }
}
