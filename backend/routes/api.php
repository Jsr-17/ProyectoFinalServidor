<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controller\Api\StudentController;

Route::get("students", [StudentController::class, "index"]);

Route::get("students/{id}", );


Route::post("students", function () {
    return "crear tonto ";
});

Route::put("students/{id}", function () {
    return "actualizar tonto";
});
Route::delete("students/{id}", function () {
    return "Eliminar tonto";
});
