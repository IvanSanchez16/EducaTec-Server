<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;

class AuthController extends Controller
{
    public function register(UserRequest $request){
        $user = User::create([
            'matricula' => $request['matricula'],
            'nombre' => $request['nombre'],
            'apellido_paterno' => $request['apellido_paterno'],
            'apellido_materno' => $request['apellido_materno'],
            'fecha_ingreso' => $request['fecha_de_ingreso'],
            'email' => $request['matricula'].'@itculiacan.edu.mx',
            'password' => bcrypt($request['password']),
            'us_tipo_usuario' => $request['tipo_de_usuario'],
            'us_carrera' => $request['carrera']
        ]);

        $token = $user->createToken('educatecToken')->plainTextToken;

        return response()->json([
            'token' => $token
        ],201);
    }
}
