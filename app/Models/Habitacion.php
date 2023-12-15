<?php

namespace App\Models;

use App\Models\Reserva;
use App\Models\TipoHabitacion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Habitacion extends Model
{
    use HasFactory;

    protected $table = "habitaciones";

    public function tipoHabitacion()
    {
        return $this->hasOne(TipoHabitacion::class, 'id','tipo_habitacion_id');
    }

    public function reserva()
    {
        return $this->belongsTo(Reserva::class);
    }

    public static function habitacionesDisponibles()
    {
        $habitaciones = Habitacion::all()->where('disponible', 1);
        $array_habitaciones = collect([]);
        foreach ($habitaciones as $habitacion)
        {
            $array_habitaciones->push([
                'id' => $habitacion->id,
            ]);
        }
        return $array_habitaciones;
    }

    public static function calcularPrecio($id)
    {
        $precio = Habitacion::where('id', $id)->get()->first();
        return $precio->tipoHabitacion->precio;
    }
}
//Habitacion::find(1)->tipoHabitacion