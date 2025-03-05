<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Usuario;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    // Método para obtener todos los usuarios
    public function index()
    {
        $usuarios = Usuario::all();

        if ($usuarios->isEmpty()) {
            return response()->json(["message" => "No hay registros de usuarios"], 404);
        }

        return response()->json(["usuarios" => $usuarios], 200);
    }

    // Método para buscar un usuario por su ID
    public function buscarId($id)
    {
        $usuario = Usuario::find($id);
        if (!$usuario) {
            return response()->json(["message" => "No existe ningun usuario con esa ID"], 404);
        }

        return response()->json(["usuario" => $usuario], 200);
    }

    // Método para crear un nuevo usuario
    public function almacenarUsuario(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "nombre" => "required|string|max:255",
            "email" => "required|email",
            "pass" => "required|string|min:8",
        ]);

        if ($validator->fails()) {
            return response()->json([
                "message" => "Error en la validación de los datos",
                "errors" => $validator->errors(),
                "status" => 400
            ], 400);
        }

        try {
            // Crear el nuevo usuario
            $usuario = Usuario::create([
                'nombre' => $request->nombre,
                'email' => $request->email,
                'pass' => bcrypt($request->pass),
            ]);

            return response()->json(["message" => "Usuario creado exitosamente", "usuario" => $usuario], 201);
        } catch (\Exception $e) {
            return response()->json([
                "message" => "Error al crear el usuario",
                "error" => $e->getMessage(),
            ], 500);
        }
    }

    // Método para modificar un usuario existente
    public function modificarUsuario(Request $request)
    {

        $data = $request->all();

        $registro = Usuario::find($data["id"]);

        if (!$registro) {
            return response()->json([
                'message' => 'El usuario no existe',
                'status' => 404
            ], 404);
        }

        try {
            $registro->update($data);
            return response()->json([
                'message' => 'Usuario actualizado correctamente',
                'usuario' => $registro,
                'status' => 200
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error al actualizar el usuario',
                'error' => $e->getMessage(),
                'status' => 500
            ], 500);
        }
    }


    // Método para eliminar un usuario
    public function borrarUsuario(int $id)
    {
        $usuario = Usuario::find($id);
        if (!$usuario) {
            return response()->json(["message" => "El usuario no existe"], 404);
        }

        $usuario->delete();

        return response()->json(["message" => "Usuario eliminado correctamente"], 200);
    }
}
