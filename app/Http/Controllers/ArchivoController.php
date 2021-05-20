<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArchivoRequest;
use App\Models\Archivo;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ArchivoController extends Controller
{

    public function index() {
        $user = Auth::user();
        $archivos = Archivo::select([
            'arch_id as id',
            'arch_nombre as nombre',
            'mat_nombre as materia',
            'arch_semestre as semestre',
            'archivos.path as path',
            DB::raw('(DATE_FORMAT(archivos.updated_at,"%d/%m/%Y")) as fecha_modificacion'),
        ])
            ->join('materias','arch_materia','=','mat_id')
            ->where('arch_user',$user->nocontrol)->get();

        $mochila = [];
        $aux = [];
        foreach ($archivos as $archivo){
            //Directorio raiz
            if ( $archivo['path'] == '/' ){
                $mochila[] = [
                    'id' => $archivo['id'],
                    'nombre' => $archivo['nombre'],
                    'materia' => $archivo['materia'],
                    'semestre' => $archivo['semestre'],
                    'fecha_modificacion' => $archivo['fecha_modificacion']
                ];
                continue;
            }
            //Directorios
        }
        return response()->json($mochila,200);
    }

    public function store(ArchivoRequest $request) {
        $user = $request->user();
        $archivo = $request->file('archivo');

        $fieldsArch = [
            'arch_nombre' => $archivo->getClientOriginalName(),
            'arch_materia' => $request->get('materia'),
            'arch_semestre' => $request->get('semestre'),
            'arch_privado' => $request->get('privado'),
            'path' => $request->get('path'),
            'arch_user' => $user->nocontrol
        ];

        $path = '/'.$user->nocontrol.$request->get('path');
        $archivo->storeAs($path,$archivo->getClientOriginalName());

        Archivo::create($fieldsArch);

        return response()->json([
            "Mensaje" => 'Archivo subido exitosamente'
        ],201);
    }


    public function show(Archivo $archivo) {
        //
    }
    public function update(Request $request, Archivo $archivo) {
        //
    }

    public function destroy(Archivo $archivo) {
        //
    }
}
