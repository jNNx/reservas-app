<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
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
        $reserva = New Reserva;
        $reserva->cliente_id = $request->cliente_id;
        $reserva->user_id = Auth::User()->id;
        $reserva->metodo_pago_id = $request->metodo_pago;
        $reserva->fecha_ingreso = $request->fecha_ingreso;
        $reserva->fecha_salida = $request->fecha_salida;
        $reserva->importe_final = $request->importe_final;
        $reserva->save();
        return response()->json($reserva, 200);
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

    public function destroy($id)
    {
        //
    }
}
