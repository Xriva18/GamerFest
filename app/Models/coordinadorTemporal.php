<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CoordinadorTemporal extends Model
{
    protected $table = 'coordinadores_temporal';

    public $incrementing = false;
    protected $keyType = 'integer';
    protected $primaryKey = 'id_cod'; // Especifica la clave primaria
    protected $fillable = ['id_cod', 'nombre_cod', 'apellido_cod'];
    public $timestamps = false;

    // Método para obtener el nombre completo
    public function getNombreCompletoAttribute(): string
    {
        return trim($this->nombre_cod . ' ' . ($this->apellido_cod ?? ''));
    }
}
