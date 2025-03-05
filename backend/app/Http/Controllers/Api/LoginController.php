<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'pass' => 'required|min:6',
        ]);

        $user = Usuario::where('email', $validated['email'])->first();

        if (!$user) {
            return response()->json(['message' => 'Credenciales inválidas'], 401);
        }
        if (Hash::check($validated['pass'], $user->pass)) {
            return response()->json(['message' => 'Login exitoso'], 200);
        }

        return response()->json(['message' => 'Credenciales inválidas'], 401);
    }
}
