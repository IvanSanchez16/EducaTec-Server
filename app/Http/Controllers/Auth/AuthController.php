<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    public function register(UserRequest $request){
        $apellidos = explode(' ',$request['apellidos']);
        $user = User::create([
            'nocontrol' => substr($request['email'],0,8),
            'nombre' => $request['nombre'],
            'apellido_paterno' => $apellidos[0],
            'apellido_materno' => $apellidos[1],
            'semestre' => $request['semestre'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
            'us_tipo_usuario' => 3,
            'us_carrera' => $request['carrera']
        ]);

        $token = $user->createToken('educatecToken')->plainTextToken;

        Storage::makeDirectory($user->matricula);
        $user->sendEmailVerificationNotification();

        return response()->json([
            'token' => $token
        ],201);
    }

    public function login(LoginRequest $request){
        $user = User::find($request['nocontrol']);

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
