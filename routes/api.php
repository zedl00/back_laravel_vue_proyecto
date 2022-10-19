<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuariosController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// EndPoints : Auth
Route::group(["prefix" => "v1/auth"], function () {
    Route::post("login", [AuthController::class, "ingresar"]);
    Route::post("registro", [AuthController::class, "registrar"]);

    Route::group(["middleware" => "auth:sanctum"], function (){
        Route::get("perfil", [AuthController::class, "perfil"]);
        Route::post("salir", [AuthController::class, "logout"]);
    });
});

// Otras Rutas

Route::group(["middelware" => "auth:sanctum"], function () {
    Route::apiResource("usuario", UsuariosController::class);
});

