<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    public function index()
    {
        $students = Students::all();

        if ($students->isEmpty()) {
            $data = [
                "message" => "No hay datos registrados",
                "status" => 404
            ];
            return response()->json($data);
        }
        $data = [
            "students" => $students,
            "status" => 200
        ];

        return response()->json($data);
    }

    public function store(Request $request)
    {
        // Validación de los datos
        $validator = Validator::make($request->all(), [
            "name" => "required",
            "email" => "required|email",
            "edad" => "required|integer",
            "telephone" => "required|string|size:9",   // personalizables las validaciones
            "language" => "required|string|in:English,Spanish"
        ]);

        if ($validator->fails()) {
            $data = [
                "message" => "Error en la validación de los datos",
                "errors" => $validator->errors(),
                "status" => 400
            ];
            return response()->json($data, 400);
        }

        // Crear el nuevo estudiante
        $student = Students::create([
            'name' => $request->name,
            'email' => $request->email,
            'edad' => $request->edad,   // Asignamos el campo 'edad'
            'telephone' => $request->telephone,  // Asignamos el campo 'telephone'
            'language' => $request->language,  // Asignamos el campo 'language'
        ]);

        // Comprobamos si se ha creado correctamente el estudiante
        if (!$student) {
            $data = [
                "message" => "Error al crear el estudiante",
                "status" => 500
            ];
            return response()->json($data, 500);
        }

        // Si la creación es exitosa
        $data = [
            "student" => $student,
            "status" => 201,
        ];
        return response()->json($data, 201);
    }


    public function show($id)
    {

        $student = Students::find($id);
        if (!$student) {
            $data = [
                "menssage" => "Estudiante no Encontrado",
                //se pone dos veces el status para informar al usuario en el mensaje del json 
                "status" => 404
            ];
            return response()->json($data, 404);
        }
        $data = [
            "menssage" => $student,
            "status" => 200
        ];
        return response()->json($data, 200);
    }

    public function update(Request $request)
    {
        if (!$request) {
            return response()->json(["message" => "Debe  enviar usuario válido"], 404);
        }
        $data = $request->all();
        //version primero buscando la id y verificando la existencia del  registro 
        $registro = Students::find($data["id"]);

        if (!$registro) {
            $data=["message"=>"El usuario no existe"];
            return response()->json($data,404);
        }
        //al ser una instancia de la clase Students se podemos usar directamente los metodos en el 
        $registro->update($data);

        return response()->json(["message" => "Usuario actualizado correctamente", "user" => $registro], 200);
    }

    public function delete(int $id){
        $registro = Students::find($id);
        if ($registro) {
            
        }
    }
}
