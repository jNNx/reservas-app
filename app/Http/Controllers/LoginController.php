<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function logout()
    {
        $user = User::findOrFail(auth()->user()->id);
        $user->tokens()->delete();
        return ('Usuario deslogeado');
    }

    /**
     * Método para autenticar un usuario y loquearlo en el sistema,
     * genera un token para utilizar la API
     * @param: username
     */
    public function authenticate(Request $request)
    {
        $user = User::where("username", "=", "$request->username")->first();
        
        if(isset($user->id))
        {
            $user->tokens()->delete();
            if(Hash::check($request->password, $user->password))
            {
                $token = $user->createToken('token')->plainTextToken;
                if($user->tipo_user_id == 1)
                {
                    $user->givePermissionTo('AGREGAR USUARIO', 'ELIMINAR USUARIO', 'ELIMINAR RESERVA', 'LISTAR RESERVAS (TODAS)');
                }
                else if($user->tipo_user_id == 2)
                {
                    $user->givePermissionTo('AGREGAR RESERVA', 'VER RESERVA');
                }
                return response()->json([
                    "status" => true,
                    "mensaje" => "Usuario logeado exitosamente",
                    "id" => $user->id,
                    "nombre_completo" => $user->persona->nombre ." ". $user->persona->apellido,
                    "cargo" => $user->tipo_users->descripcion,
                    "access_token" => $token,
                    "token_type" => "login token"
                ], 200);
            }
            else
            {
                return response()->json([
                    "status" => false,
                    "mensaje" => "Contraseña incorrecta",
                ], 404);
            }
        }
        else
        {
            return response()->json([
                "status" => false,
                "mensaje" => "Usuario y/o contraseña incorrecta",
            ], 404);
        }
    }
}
