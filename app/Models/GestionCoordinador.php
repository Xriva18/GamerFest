<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class GestionCoordinador extends Model
{
    use HasFactory;

    protected $table = 'gestion_coordinador'; // Nombre de la tabla en la base de datos

    protected $primaryKey = 'id'; // Clave primaria de la tabla

    public $timestamps = false; // Indica que no se utilizan marcas de tiempo (created_at, updated_at)

    protected $fillable = [
        'juego_id',
        'coordinador_id',
        'asignado_en',
    ]; // Atributos asignables masivamente

    /**
     * Relación con el modelo Juego.
     */
    public function juego()
    {
        return $this->belongsTo(Juego::class, 'juego_id');
    }

    /**
     * Relación con el modelo CoordinadorTemporal.
     */
    public function coordinador()
    {
        return $this->belongsTo(CoordinadorTemporal::class, 'coordinador_id');
    }
}
