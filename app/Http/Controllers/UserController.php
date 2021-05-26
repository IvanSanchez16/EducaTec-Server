<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show()
    {
        $user = Auth::user();
        $userData = $user->show();
        return response()->json($userData);
    }

    public function update(UserRequest $request) {
        $user = Auth::user();
        if ($request->exists('Foto'))
            $user->cambiarFoto( $request->file('Foto') );

        $nuevoRequest = [];
        if ($request->exists('semestre'))
            $nuevoRequest['semestre'] = $request->get('semestre');

        if ($request->exists('carrera'))
            $nuevoRequest['us_carrera'] = $request->get('carrera');

        $user->update($nuevoRequest);
        $user->save();

        return response()->json([
            "Mensaje" => 'Usuario actualizado correctamente'
        ]);
    }

    public function destroy(User $user)
    {
        //
    }
}
