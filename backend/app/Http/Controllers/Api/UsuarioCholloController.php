<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Chollo;
use App\Models\Usuario;

class UsuarioCholloController extends Controller
{
    //funcion encargada de crear un chollo a un usuario
    public function agregarCholloAlUsuario($usuarioId, $cholloId)
    {
        //busqueda de los registros en las tablas
        $usuario = Usuario::find($usuarioId);
        $chollo = Chollo::find($cholloId);

        //accede al metodo que relaciona las dos tablas el cual crea una tabla temporal donde relaciona los datos en la tabla 
        $usuario->chollos()->attach($chollo);

        return response()->json(['message' => 'Chollo añadido a la compra del usuario.']);
    }
    public function obtenerChollosDeUsuario($usuarioId)
    {
        //busca el ususario y retorna los chollos que tiene asignados
        $usuario = Usuario::find($usuarioId);
        $chollos = $usuario->chollos;

        return response()->json($chollos);
    }
    //retorna los usuarios que poseen un chollo en concreto 
    public function obtenerUsuariosDeChollo($cholloId)
    {
        $chollo = Chollo::find($cholloId);
        $usuarios = $chollo->usuarios;
        return response()->json($usuarios);
    }
    //funcion que se encarga de eliminar un chollo de un usuario 
    public function eliminarCholloDeUsuario($usuarioId, $cholloId)
    {
        $usuario = Usuario::find($usuarioId);
        //en este caso recurre a la relacion pero para eliminar el registro 
        $usuario->chollos()->detach($cholloId);

        return response()->json(['message' => 'Chollo eliminado de la compra del usuario.']);
    }
}
