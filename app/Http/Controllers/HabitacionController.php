<?php

namespace App\Http\Controllers;

use App\Models\Habitacion;
use Illuminate\Http\Request;

class HabitacionController extends Controller
{
    public function index()
    {
        $habitacion = Habitacion::all();
        return response()->json($habitacion, 200);
    }

    public function store(Request $request)
    {
        $habitacion = New Habitacion;
        $habitacion->tipo_habitacion_id = $request->tipo_habitacion_id;
        $habitacion->descripcion = $request->descripcion;
        $habitacion->disponible = $request->disponible;
        $habitacion->save();
        return response()->json($habitacion, 200);
    }

    public function show($id)
    {
        $habitacion = Habitacion::findOrFail($id);
        return response()->json($habitacion, 200);
    }

    public function update(Request $request)
    {
        $Updatehabitacion = Habitacion::findOrFail($request->id);
        $Updatehabitacion->descripcion = $request->descripcion;
        $Updatehabitacion->disponible = $request->disponible;
        $Updatehabitacion->save();
        return response()->json($Updatehabitacion, 200);
    }

    public function habitacionesDisponibles()
    {
        $habitaciones = Habitacion::habitacionesDisponibles();
        return response()->json($habitaciones, 200);
    }

    public function calcularPrecio($id)
    {
        $habitacion = Habitacion::calcularPrecio($id);
        return response()->json($habitacion, 200);
    }

    public function destroy($id)
    {
        //
    }
}
