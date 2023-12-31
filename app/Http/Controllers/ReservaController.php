<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Cliente;
use App\Models\Reserva;
use App\Models\Habitacion;
use App\Models\MetodoPago;
use App\Models\TipoHabitacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservaController extends Controller
{
    public function index()
    {
        $reservas = Reserva::all();
        return response()->json($reservas, 200);
    }

    public function store(Request $request)
    {
        $habitacion = Habitacion::findOrFail($request->habitacion_id);
        if($habitacion->disponible == 1)
        {
            $user = Auth::user();
            $reserva = New Reserva;
            $reserva->habitacion_id = $request->habitacion_id;
            $reserva->cliente_id = $request->cliente_id;
            $reserva->user_id = $user->id;
            $reserva->metodo_pago_id = $request->metodo_pago_id;
            $reserva->fecha_ingreso = Carbon::now()->format('Y-m-d');
            $reserva->hora_ingreso = Carbon::now()->format('h:i');
            $reserva->fecha_salida = Carbon::parse($request->fecha_salida)->format('Y-m-d');
            $reserva->importe_final = Habitacion::calcularPrecio($request->habitacion_id);
            $reserva->save();
            $habitacion->disponible = false;
            $habitacion->update();
            $cliente_datos = Cliente::find($request->cliente_id);
            $metodo_pago = MetodoPago::find($request->metodo_pago_id);
            $detalle = [
                $reserva->habitacion_id,
                $cliente_datos->persona->nombre.  $cliente_datos->persona->apellido, 
                $user->persona->nombre. " ".$user->persona->apellido,
                $metodo_pago->descripcion,
                $reserva->fecha_ingreso,
                $reserva->fecha_salida,
                $reserva->importe_final
            ];
            return response()->json($detalle, 200);
        }
        else
            return response()->json("Habitacion ocupada", 404);
    }

    public function show($id)
    {
        $reserva = Reserva::findOrFail($id);
        return response()->json($reserva, 200);
    }

    public function update(Request $request)
    {
        $updateReserva = Reserva::findOrFail($request->id);
        $updateReserva->fecha_salida = $request->fecha_salida;
        $updateReserva->save();
        return response()->json($updateReserva, 200);
    }

    public function destroy(Request $request)
    {
        $habitacion = Habitacion::findOrFail($request->habitacion_id);
        $reserva = Reserva::findOrFail($request->reserva_id);
        $reserva->fecha_salida = Carbon::now()->format('Y-m-d');
        $reserva->delete();
        $habitacion->disponible = true;
        $habitacion->update();

        return response()->json($reserva, 200);
    }
}
