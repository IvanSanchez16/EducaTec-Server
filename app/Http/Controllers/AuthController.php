<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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

    public function login(LoginRequest $request){
        $email = $request['matricula'].'@itculiacan.edu.mx';
        $user = User::where('email', $email)->first();

        //Check password
        if (!Hash::check($request['password'],$user->password) ){
            return response()->json([
                'mensaje' => 'La contraseña es incorrecta'
            ],401);
        }

        $token = $user->createToken('educatecToken')->plainTextToken;
        return response()->json([
            'token' => $token
        ],201);
    }

    public function logout(){
        auth()->user()->tokens()->delete();

        return response()->json([],205);
    }
}
