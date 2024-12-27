<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Universidad extends Model
{
    protected $table = 'universidades'; // Nombre de la tabla en la base de datos.

    /**
     * Los atributos que se pueden asignar de manera masiva.
     */
    protected $fillable = [
        'nombre',
        'siglas', // Agregado el nuevo campo
    ];

    /**
     * Relación con el modelo User.
     */
    public function usuarios()
    {
        return $this->hasMany(User::class, 'universidad_id');
    }
}
