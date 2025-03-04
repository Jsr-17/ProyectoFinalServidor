<?php

use App\Http\Controllers\Api\CholloController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\StudentController;
use Illuminate\Support\Testing\Fakes\BusFake;

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

Route::get("chollo", [CholloController::class, "index"]);

Route::get("chollo/{id}", [CholloController::class, "buscarID"]);
Route::post("chollo", [CholloController::class, "almacenarChollo"]);