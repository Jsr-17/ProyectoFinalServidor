<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    //funcion encargada de realizar la comprobacion de la autentificacion en la base de datos 
    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'pass' => 'required|min:6',
        ]);
        //funcion que devuelve el primer valor del email  de la base de datos que este relacionado con este 
        $user = Usuario::where('email', $validated['email'])->first();

        if (!$user) {
            return response()->json(['message' => 'Credenciales inválidas'], 401);
        }
        //hace la comprobacion del hash de la contraseña del usuario  para comprobar si es correcta
        if (Hash::check($validated['pass'], $user->pass)) {
            return response()->json(['message' => 'Login exitoso', "id" => $user->id], 200);
        }

        return response()->json(['message' => 'Credenciales inválidas'], 401);
    }
}
