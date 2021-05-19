<?php

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

Route::post('/registro',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);

Route::get('/email/verify/{id}/{hash}',[VerificationController::class,'verify'])->name('verification.verify');
Route::post('/password/email',[ForgotPasswordController::class,'sendResetEmail'])->name('password.email');
Route::post('/password/reset',[ForgotPasswordController::class,'reset'])->name('password.update');

Route::middleware(['auth:sanctum'])->group(function (){
    Route::apiResource('materias',MateriaController::class);

    Route::get('/mochila',[MochilaController::class,'index']);
    Route::post('/mochila/archivo',[MochilaController::class,'store']);

    Route::get('/email/resend',[VerificationController::class,'resend'])->name('verification.resend');
    Route::post('/logout',[AuthController::class,'logout']);
});


