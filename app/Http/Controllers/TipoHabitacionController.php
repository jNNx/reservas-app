<?php

namespace App\Http\Controllers;

use App\Models\TipoHabitacion;
use Illuminate\Http\Request;

class TipoHabitacionController extends Controller
{
    public function index()
    {
        $tipo_habitacion = TipoHabitacion::all();
        return response()->json($tipo_habitacion, 200);
    }

    public function store(Request $request)
    {
        $tipo_habitacion = New TipoHabitacion;
        $tipo_habitacion->nombre = $request->nombre;
        $tipo_habitacion->tarifa_id = $request->tarifa_id;
        $tipo_habitacion->save();
        return response()->json($tipo_habitacion, 200);
    }

    public function show($id)
    {
        $tipo_habitacion = TipoHabitacion::findOrFail($id);
        return response()->json($tipo_habitacion, 200);
    }

    public function update(Request $request)
    {
        $tipo_habitacion = TipoHabitacion::findOrFail($request->id);
        $tipo_habitacion->precio = $request->precio;
        return response()->json($tipo_habitacion, 200);
    }


    public function destroy($id)
    {
        //
    }
}
