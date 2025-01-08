<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EquipoIntegrante extends Model
{
    // Nombre de la tabla en la base de datos
    protected $table = 'equipo_integrantes';

    // Atributos que se pueden asignar masivamente
    protected $fillable = [
        'equipo_id',
        'usuario_id',
    ];

    public function equipo()
    {
        return $this->belongsTo(Equipo::class, 'equipo_id');
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }
}
