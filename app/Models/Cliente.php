<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cliente extends Model
{
    use HasFactory;

    public function persona()
    {
        return $this->hasOne(Persona::class, 'id', 'persona_id');
    }

    public static function buscarPorDni($dni)
    {
        if ($cliente = Persona::where('dni', $dni)->get()->first())
        {
            $datosCliente = DB::table('personas')
            ->where('personas.dni', $cliente->dni)
            ->get(['personas.nombre as nombre',
                   'personas.apellido as apellido',
                   'personas.telefono as telefono',
                   'personas.email as email']);
        }
        else
            $datosCliente = [];

        return $datosCliente;
    }
}
