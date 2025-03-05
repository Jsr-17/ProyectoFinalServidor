<?php

use App\Http\Controllers\Api\CholloController;
use App\Http\Controllers\Api\ComentarioController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\UsuarioCholloController;
use App\Http\Controllers\Api\UsuarioController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\StudentController;

Route::get("students", [StudentController::class, "index"]);
Route::get(
    "students/{id}",
    [StudentController::class, "show"]
);
Route::post("students", [StudentController::class, "store"]);
Route::put("students/{id}", [StudentController::class, "update"]);
Route::delete("students/{id}", function () {
    return "Eliminar tonto";
});

//Chollos

Route::get("chollo", [CholloController::class, "index"]);
Route::get("chollo/{id}", [CholloController::class, "buscarID"]);
Route::post("chollo", [CholloController::class, "almacenarChollo"]);
Route::put("chollo", [CholloController::class, "modificarChollo"]);
Route::delete("chollo", [CholloController::class, "borrarChollo"]);

//Usuarios
Route::get("usuario", [UsuarioController::class, "index"]);
Route::get("usuario/{id}", [UsuarioController::class, "buscarId"]);
Route::post("usuario", [UsuarioController::class, "almacenarUsuario"]);
Route::put("usuario", [UsuarioController::class, "modificarUsuario"]);
Route::delete("usuario", [UsuarioController::class, "borrarUsuario"]);


//Comentarios
Route::post('/comentario', [ComentarioController::class, 'crear']);
Route::get('/comentariosUsuario/{id}', [ComentarioController::class, 'buscarTodosComentariosUsuario']);
Route::get('/comentariosChollo/{id}', [ComentarioController::class, 'buscarTodosComentariosChollo']);
Route::get('/comentario', [ComentarioController::class, 'index']);


//Usuario-Chollos
Route::get('/usuario-chollo/{usuarioId}/chollos', [UsuarioCholloController::class, 'obtenerChollosDeUsuario']);
Route::get('/usuario-chollo/chollo/{cholloId}/usuarios', [UsuarioCholloController::class, 'obtenerUsuariosDeChollo']);
Route::post('/usuario-chollo/{usuarioId}/agregar/{cholloId}', [UsuarioCholloController::class, 'agregarCholloAlUsuario']);
Route::delete('/usuario-chollo/{usuarioId}/eliminar/{cholloId}', [UsuarioCholloController::class, 'eliminarCholloDeUsuario']);

//Login
Route::post('/login', [LoginController::class, 'login']);
