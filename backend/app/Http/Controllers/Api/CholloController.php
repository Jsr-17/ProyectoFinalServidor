<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Chollo;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class CholloController extends Controller
{
    //esta ruta de la api devuelve todos los chollos de la base de datos
    public function index()
    {
        //devuelve todos los registros
        $chollos = Chollo::all();

        if ($chollos->isEmpty()) {
            $data = [
                "chollos" => "No hay ningun registro de chollos",
                "status" => 404
            ];
            return response()->json($data, 404);
        }



        return response()->json(["message" => $chollos, "status" => 200]);
    }

    //esta ruta devuelve un chollo en concreto 
    public function buscarId($id)
    {
        // find hace la busqueda en la base de datos de la id del chollo 
        $chollo = Chollo::find($id);
        if (!$chollo) {
            $data = [
                "response" => "No existe ningun Chollo con esa Id",
                "status" => 404
            ];
            return response()->json(["message" => $data, "status" => 404]);
        }

        return response()->json(["message" => $chollo, "status" => 200]);
    }
    //Ruta la cual almacena un chollo en la base de datos a partir de una peticion post 
    public function almacenarChollo(Request $request)
    {
        //validacion de los datos que manda el cliente 
        $validator = Validator::make($request->all(), [
            "titulo" => "required",
            "descripcion" => "required",
            "categoria" => "required",
            "precio" => "required|numeric",
            "url" => "required|url",
            "puntuacion" => "required|integer|min:0|max:5",
            "precio_descuento" => "nullable|numeric",
            "disponible" => "required|boolean"
        ]);
        //en caso de que la validacion aroje cualquier tipo de error 
        if ($validator->fails()) {
            return response()->json([
                "message" => "Error en la validación de los datos",
                "errors" => $validator->errors(),
                "status" => 400
            ], 400);
        }

        // funcion encargada de hacer la busqueda por columna especificada con el valor especificado en la segunda parte del parametro y 
        //retornar si ya esta hecha
        $cholloExistente = Chollo::where('titulo', $request->titulo)

            ->exists();

        if ($cholloExistente) {
            return response()->json([
                "message" => "Este chollo ya existe en la base de datos",
                "status" => 409
            ], 409);
        }

        // Crear el nuevo Chollo
        try {
            //esta funcoin ya crea el chollo con todos los datos de la peticion una vez validados los datos 
            $chollo = Chollo::create($request->all());

            return response()->json([
                "message" => "Chollo creado exitosamente",
                "chollo" => $chollo,
                "status" => 201
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                "message" => "Error al crear el Chollo",
                "error" => $e->getMessage(),
                "status" => 500
            ], 500);
        }
    }
    //modifica el chollo 
    public function modificarChollo(Request $request)
    {
        if (!$request) {
            return response()->json(["message" => "Debe enviar usuario válido"], 404);
        }

        $data = $request->all();

        //busqueda por id del chollo 
        $registro = Chollo::find($data["id"]);

        if (!$registro) {
            $data = ["message" => "El chollo no existe"];
            return response()->json($data, 404);
        }
        $registro->update($data);
        return response()->json(["message" => "Chollo actualizado correctamente", "chollo" => $registro], 200);
    }
    //elimina por id el chollo de la base de datos 
    public function borrarChollo(int $id)
    {
        //primero hace la busqueda 
        $registro = Chollo::find($id);
        if (!$registro) {
            return response()->json(["message" => "El chollo no existe"], 404);
        }
        //una vez encontrado el chollo es eliminado 
        $registro->delete();

        return response()->json(["message" => "Chollo eliminado correctamente"], 200);
    }
}
