<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class users extends Authenticatable
{

    protected $table = 'users'; // Nombre de la tabla en la base de datos.

    /**
     * Los atributos que se pueden asignar de manera masiva.
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar_url',
        'apellido',
        'universidad',
        'rol_id',
    ];

    /**
     * Los atributos que deben ocultarse para los arrays.
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Los atributos que se deben convertir a tipos nativos.
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Relación con el modelo Role.
     */
    public function role()
    {
        return $this->belongsTo(role::class, 'rol_id');
    }

    /**
     * Relación con la tabla universidades (si necesitas extender esto).
     */
    public function universidad()
    {
        return $this->belongsTo(universidad::class, 'universidad');
    }

    /**
     * Relación con otras tablas, como inscripciones.
     */
    public function inscripciones()
    {
        return $this->hasMany(inscripcion::class, 'usuario_id');
    }

    /**
     * Relación con gastos_ingresos (si aplica).
     */
    public function gastosIngresos()
    {
        return $this->hasMany(gastoIngreso::class, 'usuario_id');
    }
}
