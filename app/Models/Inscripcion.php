<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class inscripcion extends Model
{
    // Nombre de la tabla en la base de datos
    protected $table = 'inscripciones';

    // Atributos que se pueden asignar masivamente
    protected $fillable = [
        'usuario_id',
        'juego_id',
        'tipo',
        'equipo_id',
        'estado_pago',
        'imagen_comprobante',
        'numero_comprobante',
        'created_at',
        'updated_at',
    ];

    // Relación con el modelo User
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

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($inscripcion) {
            // Validar duplicados
            if (Inscripcion::where('usuario_id', $inscripcion->usuario_id)
                ->where('juego_id', $inscripcion->juego_id)
                ->where('tipo', $inscripcion->tipo)
                ->exists()) {
                throw new \Exception('El usuario ya está inscrito en este juego con el tipo seleccionado.');
            }
        });
    }
}
