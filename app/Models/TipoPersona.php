<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoPersona extends Model
{
    use HasFactory;

    public function Persona()
    {
        return $this->belongsTo(Persona::class, 'id', 'persona_id');
    }
}
