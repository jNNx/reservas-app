<?php

namespace App\Models;

use App\Models\TipoPersona;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Persona extends Model
{
    use HasFactory;

    public function tipoPersonas()
    {
        return $this->hasMany(TipoPersona::class, 'id', 'tipo_persona_id');
    }
}
