<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupRegistration extends Model
{
    use HasFactory;

    // Especifica los campos que se pueden llenar de forma masiva
    protected $fillable = [
        'team_name',
        'game',
        'captain_name',
        'members',
        'image_path',
    ];

    // Convierte el campo 'members' de JSON a un array automáticamente
    protected $casts = [
        'members' => 'array',
    ];
}

