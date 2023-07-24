<?php

namespace App\Models;

use App\Models\TipoHabitacion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TipoHabitacionTarifa extends Model
{
    use HasFactory;

    public function tipoHabitacion()
    {
        return $this->hasOne(TipoHabitacion::class);
    }
}
