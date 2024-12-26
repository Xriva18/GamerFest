<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class universidad extends Model
{
    use HasFactory;

    protected $table = 'universidades'; // Nombre de la tabla en la base de datos.

    /**
     * Los atributos que se pueden asignar de manera masiva.
     */
    protected $fillable = [
        'nombre',
    ];

    /**
     * Relación con el modelo User.
     */
    public function usuarios()
    {
        return $this->hasMany(User::class, 'universidad');
    }
}

