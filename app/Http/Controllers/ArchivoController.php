<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArchivoRequest;
use App\Models\Archivo;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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
            'arch_privado as privado',
            DB::raw('(DATE_FORMAT(archivos.updated_at,"%d/%m/%Y")) as fecha_modificacion'),
        ])
            ->join('materias','arch_materia','=','mat_id')
            ->where('arch_user',$user->nocontrol)
            ->orderBy('path','desc')
            ->get();

        $mochila = [];
        foreach ($archivos as $archivo){
            $mochila[] = [
                'id' => $archivo['id'],
                'nombre' => $archivo['nombre'],
                'materia' => $archivo['materia'],
                'semestre' => $archivo['semestre'],
                'fecha_modificacion' => $archivo['fecha_modificacion'],
                'privado' => $archivo['privado'] == 1,
                'path' => $archivo['path']
            ];
        }
        return response()->json($mochila,200);
    }

    public function indexPublicos() {
        $user = Auth::user();
        $archivos = Archivo::select([
            'arch_id as id',
            'arch_nombre as nombre',
        ])
            ->join('materias','arch_materia','=','mat_id')
            ->where('arch_user',$user->nocontrol)
            ->where('arch_privado',0)
            ->get();

        return response()->json($archivos);
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
    public function update(ArchivoRequest $request, Archivo $archivo) {
        $user = Auth::user();
        if ($archivo->arch_user != $user->nocontrol)
            return response()->json([
                "Error" => 'El archivo no es de tu propiedad'
            ],401);
        $nuevoRequest = [];

        if ( $request->exists('nombre') ){
            $nuevoRequest['arch_nombre'] = $request->get('nombre');

            $oldPath = '/'.$user->nocontrol.$archivo->path.$archivo->arch_nombre;
            if ( $request->exists('path') ){
                $newPath = '/'.$user->nocontrol.$request->get('path').$request->get('nombre');
                $nuevoRequest['path'] = $request->get('path');
            }else
                $newPath = '/'.$user->nocontrol.$archivo->path.$request->get('nombre');

            Storage::move($oldPath,$newPath);
        }

        if ( $request->exists('materia') )
            $nuevoRequest['arch_materia'] = $request->get('materia');

        if ( $request->exists('semestre') )
            $nuevoRequest['arch_semestre'] = $request->get('semestre');

        if ( $request->exists('privado') )
            $nuevoRequest['arch_privado'] = $request->get('privado');

        $archivo->update($nuevoRequest);
        $archivo->save();

        return response()->json([
            'Mensaje' => 'Archivo actualizado correctamente'
        ]);
    }

    public function destroy(Archivo $archivo) {
        $user = Auth::user();
        if ($archivo->arch_user != $user->nocontrol)
            return response()->json([
                "Error" => 'El archivo no es de tu propiedad'
            ],401);

        try {
            $archivo->delete();
        } catch (\Exception $e) {
            return response()->json([
                "Error" => 'El archivo se encuentra activo dentro de un post, no es posible eliminarlo'
            ],409);
        }
        $path = '/' . $user->nocontrol . $archivo->path . $archivo->arch_nombre;
        Storage::delete($path);

        return response()->json([],204);
    }

    public function descargar(Archivo $archivo){
        $path = '/'.$archivo->arch_user.$archivo->path.$archivo->arch_nombre;
        return Storage::download($path);
    }
}
