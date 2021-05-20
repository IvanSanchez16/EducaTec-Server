<?php

use App\Http\Controllers\ArchivoController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\MateriaController;
use App\Http\Controllers\MochilaController;
use App\Http\Controllers\UserController;
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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

//Login
Route::post('/registro',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);

//Auth
Route::get('/email/verify/{id}/{hash}',[VerificationController::class,'verify'])->name('verification.verify');
Route::post('/password/email',[ForgotPasswordController::class,'sendResetEmail'])->name('password.email');
Route::post('/password/reset',[ForgotPasswordController::class,'reset'])->name('password.update');

Route::middleware(['auth:sanctum'])->group(function (){
    //Login
    Route::get('/user',[UserController::class,'show']);

    //Perfil
    Route::post('/user',[UserController::class,'update']);

    //REST
    Route::apiResource('materias',MateriaController::class);

    //Mochila
    Route::get('/mochila',[ArchivoController::class,'index']);
    Route::post('/mochila/archivo',[ArchivoController::class,'store']);

    //Auth
    Route::get('/email/resend',[VerificationController::class,'resend'])->name('verification.resend');
    Route::post('/logout',[AuthController::class,'logout']);
});


