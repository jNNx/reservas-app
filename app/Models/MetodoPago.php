<?php

namespace App\Models;

use App\Models\Reserva;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MetodoPago extends Model
{
    use HasFactory;

    public function reserva()
    {
        return $this->belongsTo(Reserva::class);
    }
}
