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

        static::creating(function ($inscripcion) {
            $inscripcion->usuario_id = $inscripcion->usuario_id ?? auth()->id(); // Asignar usuario autenticado si no llega del formulario
            $inscripcion->tipo = $inscripcion->tipo ?? 'Individual'; // Valor predeterminado
            $inscripcion->estado_pago = $inscripcion->estado_pago ?? 'Pendiente'; // Valor predeterminado
        });
    
        static::creating(function ($inscripcion) {
            // Asignar automáticamente el usuario autenticado
            $inscripcion->usuario_id = auth()->id();
    
            // Validar duplicados
            if (Inscripcion::where('usuario_id', $inscripcion->usuario_id)
                ->where('juego_id', $inscripcion->juego_id)
                ->exists()) {
                throw new \Exception('El usuario ya está inscrito en este juego.');
            }
        });
    }    
}
