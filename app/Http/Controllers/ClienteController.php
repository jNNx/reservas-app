<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Persona;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function store(Request $request)
    {
        $persona = New Persona;
        $persona->nombre = $request->nombre;
        $persona->apellido = $request->apellido;
        $persona->dni = $request->dni;
        $persona->telefono = $request->telefono;
        $persona->email = $request->email;
        if ($persona->save()) 
        {
            $cliente = New Cliente;
            $cliente->persona_id = $persona->id;
            $cliente->save();
        }
        return response()->json($persona, 200);
    }

    public function buscarCliente(Request $request)
    {
        $cliente = Cliente::buscarPorDni($request->dni);
        if ($cliente == null)
            return response()->json("No existe cliente con ese DNI", 404);
        else
            return response()->json($cliente, 200);
    }

    public function update()
    {
        //
    }

    public function destroy()
    {
        //
    }
}
