<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pago extends Model
{
    // Nombre de la tabla en la base de datos
    protected $table = 'pagos';

    // Atributos que se pueden asignar masivamente
    protected $fillable = [
        'participacion_id',
        'imagen_comprobante',
        'numero_comprobante',
        'estado',
        'fecha_pago',
    ];

    // Relación con el modelo Inscripcion
    public function inscripcion()
    {
        return $this->belongsTo(Inscripcion::class, 'participacion_id');
    }
}
