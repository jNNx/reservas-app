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

    public function persona()
    {
        return $this->hasMany(Persona::class);
    }

    public function metodo_pagos()
    {
        return $this->hasMany(MetodoPago::class);
    }

    public function habitaciones()
    {
        return $this->hasMany(Habitacion::class);
    }
}
