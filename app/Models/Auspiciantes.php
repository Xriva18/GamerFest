<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class auspiciantes extends Model
{
    protected $table = 'auspiciantes';

    protected $fillable = [
        'nombre',
        'imagen',
        'aportacion',
    ];

    public $timestamps = false; // Deshabilita los timestamps
}
