<?php

namespace App\Models;

use App\Models\Persona;
use App\Models\Habitacion;
use App\Models\MetodoPago;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reserva extends Model
{
    use HasFactory;

    public function personas()
    {
        return $this->hasMany(Persona::class, 'id', 'persona_id');
    }

    public function metodo_pagos()
    {
        return $this->hasMany(MetodoPago::class, 'id', 'metodo_pago_id');
    }

    public function habitaciones()
    {
        return $this->hasMany(Habitacion::class, 'id', 'habitacion_id');
    }
}
