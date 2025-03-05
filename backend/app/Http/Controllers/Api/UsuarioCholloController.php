<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Chollo;
use App\Models\Usuario;

class UsuarioCholloController extends Controller
{
    public function agregarCholloAlUsuario($usuarioId, $cholloId)
    {

        $usuario = Usuario::find($usuarioId);
        $chollo = Chollo::find($cholloId);


        $usuario->chollos()->attach($chollo);

        return response()->json(['message' => 'Chollo añadido a la compra del usuario.']);
    }
    public function obtenerChollosDeUsuario($usuarioId)
    {
        $usuario = Usuario::find($usuarioId);
        $chollos = $usuario->chollos;

        return response()->json($chollos);
    }
    public function obtenerUsuariosDeChollo($cholloId)
    {
        $chollo = Chollo::find($cholloId);
        $usuarios = $chollo->usuarios;
        return response()->json($usuarios);
    }
    public function eliminarCholloDeUsuario($usuarioId, $cholloId)
    {
        $usuario = Usuario::find($usuarioId);
        $usuario->chollos()->detach($cholloId);

        return response()->json(['message' => 'Chollo eliminado de la compra del usuario.']);
    }
}
