<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EquipoIntegrante extends Model
{
    protected $table = 'equipo_integrantes';

    protected $fillable = ['nombrequipo', 'usuario_id', 'lider_id'];

    public $timestamps = false;

    protected $casts = [
        'usuario_id' => 'array',
    ];

    public function lider()
    {
        return $this->belongsTo(User::class, 'lider_id');
    }
}
