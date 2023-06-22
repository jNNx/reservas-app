<?php

namespace App\Models;

use App\Models\TipoHabitacion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Habitacion extends Model
{
    use HasFactory;

    protected $table = "habitaciones";

    public function tipoHabitacion()
    {
        return $this->hasOne(TipoHabitacion::class, 'id','tipo_habitaciones_id');
    }

}
//Habitacion::find(1)->tipoHabitacion