<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use Illuminate\Http\Request;

class PersonaController extends Controller
{
    public function index()
    {
        $personas = Persona::all();
        return response()->json($personas, 200);
    }

    public function store(Request $request)
    {
        $personas = New Persona;
        $personas->nombre = $request->nombre;
        $personas->apellido = $request->apellido;
        $personas->dni = $request->dni;
        $personas->telefono = $request->telefono;
        $personas->email = $request->email;
        $personas->save();
        return response()->json($personas, 200);
    }

    public function show($id)
    {
        $persona = Persona::findOrFail($id);
        return response()->json($persona, 200);
    }

    public function update(Request $request)
    {
        $Updatepersona = Persona::findOrFail($request->id);
        $Updatepersona->nombre = $request->nombre;
        $Updatepersona->apellido = $request->apellido;
        $Updatepersona->dni = $request->dni;
        $Updatepersona->telefono = $request->telefono;
        $Updatepersona->email = $request->email;
        $Updatepersona->save();
        return response()->json($Updatepersona, 200);
    }

    public function destroy($id)
    {
        //
    }
}
