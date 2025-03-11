<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Chollo;
use Illuminate\Http\Request;;

use App\Models\Comentario;
use App\Models\Usuario;

class ComentarioController extends Controller
{
    //esta funcion retorna todos los comentarios 
    public function index()
    {
        $data = Comentario::all();
        if ($data->isEmpty()) {
            return response()->json("No hay datos", 404);
        }
        return response()->json(["message" => $data], 200);
    }
    // esta funcion se encarga de primer lugar validar la peticion post y luego crear el registro en la base de datos
    public function crear(Request $request)
    {
        //interesante mencionar que para crear las validaciones hacemos uso de un json donde en primer lugar ponemos la clve de la base de datos 
        //y en segundo lugar ponemos las restricciones
        $request->validate([
            'mensaje' => 'required|string|max:500',
            'id_usuario' => 'required|exists:usuario,id',
            'id_chollo' => 'required|exists:chollo,id',
            'id_comentario' => 'nullable|exists:comentario,id',

        ]);

        //crea un registro en la base de datos 
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

    //esta funcion se encarga de buscar todos los comentarios que ha realizado un usuario 
    public function buscarTodosComentariosUsuario($id)
    {
        //busqueda del usuario
        $usuario = Usuario::find($id);
        if (!$usuario) {
            return response()->json(['error' => 'Usuario no encontrado'], 404);
        }
        // busqueda en la base de datos de los comentarios buscando la id del usuario
        $comentarios = Comentario::where('id_usuario', $id)->get();

        return response()->json([
            'usuario' => $usuario->nombre,
            'comentarios' => $comentarios
        ]);
    }
    //esta funcion se encarga de hacer una busqueda de todos los comentarios que tiene un chollo en concreto 
    public function buscarTodosComentariosChollo($id)
    {
        $chollo = Chollo::find($id);
        if (!$chollo) {
            return response()->json(['error' => 'Chollo no encontrado'], 404);
        }
        //En este caso hacemos una busqueda por el id del chollo 
        $comentarios = Comentario::where('id_chollo', $id)->get();

        return response()->json([
            'chollo' => $chollo->titulo,
            'comentarios' => $comentarios
        ]);
    }
}
