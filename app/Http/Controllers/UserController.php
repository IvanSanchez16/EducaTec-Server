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
        if ($request->exists('foto'))
            $user->cambiarFoto( $request->file('foto') );

        $request = $request->all();
        $user->update($request);
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
