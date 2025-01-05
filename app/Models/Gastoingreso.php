<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class gastoIngreso extends Model
{
    // Nombre de la tabla en la base de datos
    protected $table = 'gastos_ingresos';

    // Atributos que se pueden asignar masivamente
    protected $fillable = [
        'tipo',
        'monto',
        'detalle',
        'comprobante',
        'fecha',
        'usuario_id',
    ];

    public $timestamps = false; // Deshabilita las marcas de tiempo

    // Relación con el modelo User
    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }
}
