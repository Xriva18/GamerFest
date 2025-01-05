<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class role extends Model
{
    // Nombre de la tabla en la base de datos
    protected $table = 'roles';

    // Atributos que se pueden asignar masivamente
    protected $fillable = [
        'nombre',
    ];

    // Relación uno a muchos con el modelo User
    public function usuarios()
    {
        return $this->hasMany(User::class, 'rol_id');
    }
}
