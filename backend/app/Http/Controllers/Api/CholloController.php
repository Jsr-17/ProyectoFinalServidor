<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Chollo;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class CholloController extends Controller
{
    public function index()
    {
        $chollos = Chollo::all();

        if ($chollos->isEmpty()) {
            $data = [
                "chollos" => "No hay ningun registro de chollos",
                "status" => 404
            ];
            return response()->json($data, 404);
        }

        $data = [
            "chollos" => $chollos,
            "status" => 200
        ];

        return response()->json(["message" => $data, "status" => 200]);
    }
    public function buscarId($id)
    {
        $chollo = Chollo::find($id);
        if (!$chollo) {
            $data = [
                "response" => "No existe ningun Chollo con esa Id",
                "status" => 404
            ];
            return response()->json(["message" => $data, "status" => 404]);
        }
        $data = [
            "response" => $chollo,
            "status" => 200
        ];
        return response()->json(["message" => $data, "status" => 200]);
    }
    public function almacenarChollo(Request $request)
    {
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

        if ($validator->fails()) {
            return response()->json([
                "message" => "Error en la validación de los datos",
                "errors" => $validator->errors(),
                "status" => 400
            ], 400);
        }


        $cholloExistente = Chollo::where('titulo', $request->titulo)
            ->where('descripcion', $request->descripcion)
            ->where('categoria', $request->categoria)
            ->where('precio', $request->precio)
            ->where('url', $request->url)
            ->exists();

        if ($cholloExistente) {
            return response()->json([
                "message" => "Este chollo ya existe en la base de datos",
                "status" => 409
            ], 409);
        }

        // Crear el nuevo Chollo
        try {
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
    public function modificarChollo(Request $request)
    {
        if (!$request) {
            return response()->json(["message" => "Debe enviar usuario válido"], 404);
        }
        $data = $request->all();
        $registro = Chollo::find($data["id"]);
        if (!$registro) {
            $data = ["message" => "El chollo no existe"];
            return response()->json($data, 404);
        }
        $registro->update($data);
        return response()->json(["message" => "Chollo actualizado correctamente", "chollo" => $registro], 200);
    }
    public function borrarChollo(int $id)
    {
        $registro = Chollo::find($id);
        if (!$registro) {
            return response()->json(["message" => "El chollo no existe"], 404);
        }

        $registro->delete();

        return response()->json(["message" => "Chollo eliminado correctamente"], 200);
    }
}
