<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndividualRegistration extends Model
{
    use HasFactory;

    // Especifica los campos que se pueden llenar de forma masiva
    protected $fillable = [
        'name',
        'game',
        'image_path',
    ];
}

