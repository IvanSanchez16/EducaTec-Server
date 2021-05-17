<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/registro',[AuthController::class,'register']);

Route::middleware(['auth:sanctum'])->group(function (){
    Route::apiResource('archivo',\App\Http\Controllers\ArchivoController::class);
    Route::apiResource('carrera',\App\Http\Controllers\CarreraController::class);
    Route::apiResource('comentario',\App\Http\Controllers\ComentarioController::class);
    Route::apiResource('materia',\App\Http\Controllers\MateriaController::class);
    Route::apiResource('post',\App\Http\Controllers\PostController::class);
    Route::apiResource('tipoUsuario',\App\Http\Controllers\TipoUsuarioController::class);
    Route::apiResource('user',\App\Http\Controllers\UserController::class);
});


