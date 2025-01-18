<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SoloAprobados extends Model
{
    protected $table = 'public.aprobados_view';
    protected $primaryKey = 'id'; // Usa una columna de la vista como clave primaria lógica
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'usuario_nombre_completo',
        'coordinador_nombre_completo',
        'equipo_nombre',
        'juego_nombre',
    ];
}
