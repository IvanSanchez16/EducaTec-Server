<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArchivoRequest;
use App\Models\Archivo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MochilaController extends Controller
{
    public function index(){

    }

    public function store(ArchivoRequest $request){
        $user = $request->user();
        $archivo = $request->file('archivo');

        $fieldsArch = [
            'arch_nombre' => $archivo->getClientOriginalName(),
            'arch_materia' => $request->get('materia'),
            'arch_semestre' => $request->get('semestre'),
            'arch_privado' => $request->get('privado'),
            'path' => $request->get('path'),
            'arch_user' => $user->matricula
        ];

        $path = '/'.$user->matricula.$request->get('path');
        $archivo->storeAs($path,$archivo->getClientOriginalName());

        Archivo::create($fieldsArch);

        return response()->json([
            "Mensaje" => 'Archivo subido exitosamente'
        ],201);
    }
}
