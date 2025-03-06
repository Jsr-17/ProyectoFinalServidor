<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Chollo;
use Illuminate\Http\Request;
;

use App\Models\Comentario;
use App\Models\Usuario;

class ComentarioController extends Controller
{

    public function index()
    {
        $data = Comentario::all();
        if ($data->isEmpty()) {
            return response()->json("No hay datos", 404);
        }
        return response()->json(["message" => $data], 200);
    }
    public function crear(Request $request)
    {
        $request->validate([
            'mensaje' => 'required|string|max:500',
            'id_usuario' => 'required|exists:usuario,id',
            'id_chollo' => 'required|exists:chollo,id',
            'id_comentario' => 'nullable|exists:comentario,id',

        ]);


        $comentario = Comentario::create([
            'mensaje' => $request->mensaje,
            'id_usuario' => $request->id_usuario,
            'id_chollo' => $request->id_chollo,
            'id_comentario' => $request->id_comentario,
        ]);

        return response()->json([
            'message' => 'Comentario agregado con éxito',
            'comentario' => $comentario
        ], 201);
    }
    public function buscarTodosComentariosUsuario($id)
    {
        $usuario = Usuario::find($id);
        if (!$usuario) {
            return response()->json(['error' => 'Usuario no encontrado'], 404);
        }

        $comentarios = Comentario::where('id_usuario', $id)->get();

        return response()->json([
            'usuario' => $usuario->nombre,
            'comentarios' => $comentarios
        ]);
    }
    public function buscarTodosComentariosChollo($id)
    {
        $chollo = Chollo::find($id);
        if (!$chollo) {
            return response()->json(['error' => 'Chollo no encontrado'], 404);
        }

        $comentarios = Comentario::where('id_chollo', $id)->get();

        return response()->json([
            'chollo' => $chollo->titulo,
            'comentarios' => $comentarios
        ]);
    }
}
