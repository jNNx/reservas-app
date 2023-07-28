<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::index();
        return response()->json($users, 200);
    }

    public function store(Request $request)
    {
        $persona = new Persona();
        $persona->dni = $request->dni;
        $persona->nombre = $request->nombre;
        $persona->apellido = $request->apellido;
        $persona->telefono = $request->telefono;
        $persona->email = $request->email;
        if ($persona->save()) 
        {
            $user = new User();
            $user->username = $request->username;
            $user->password = Hash::make($request->password);
            $user->persona_id = $persona->id;
            $user->tipo_user_id = $request->tipo_user_id;
            if ($request->tipo_user_id == 1) 
            {
                $user->givePermissionTo(['name' => 'AGREGAR USUARIO']);
                $user->givePermissionTo(['name' => 'LISTAR RESERVAS (TODAS)']);
            }
            else if ($request->tipo_user_id == 2) 
            {
                $user->givePermissionTo(['name' => 'VER RESERVA']);
            }
            if ($user->save()) {
                return response()->json($user->datos_user(), 200);
            }
        }
        return response()->json([], 401);
    }

    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return response()->json($user->datos_user(), 200);
    }

    public function restore($id)
    {
        $user = User::withTrashed()->findOrFail($id);
        $user->restore();
        return response()->json($user->datos_user(), 200);
    }

    public function asignarPermisos()
    {
        $usuarios = User::all();
        foreach ($usuarios as $user)
        {
            if($user->tipo_user_id == 1) 
            {
                $user->givePermissionTo(['name' => 'AGREGAR USUARIO']);
                $user->givePermissionTo(['name' => 'LISTAR RESERVAS (TODAS)']);
            }
            else if($user->tipo_user_id == 2) 
            {
                $user->givePermissionTo(['name' => 'VER RESERVA']);
            }
        }
        return $usuarios;        
    }
}
