<?php

namespace App\Models;

use App\Models\TipoHabitacionTarifa;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TipoHabitacion extends Model
{
    use HasFactory;

    protected $table = "tipo_habitaciones";

    public function habitacion()
    {
        return $this->belongsTo(Habitacion::class);
    }
}
