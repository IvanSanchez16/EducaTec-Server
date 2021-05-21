<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Archivo;
use App\Models\Calificacion;
use App\Models\Comentario;
use App\Models\Descpost;
use App\Models\MaterialPost;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{

    public function index() {
        $user = Auth::user();
        $posts = Post::select([
            'post_id as id',
            DB::raw('(CONCAT(users.nombre," ",users.apellido_paterno)) as nombre'),
            'post_subtitle as subtitulo',
            'mat_nombre as materia',
            DB::raw('(DATE_FORMAT(posts.created_at,"%d/%m/%Y")) as fecha')
        ])
            ->join('users','nocontrol','=','post_user')
            ->join('materias','mat_id','=','post_materia')
            ->where('post_user',$user->nocontrol)
            ->get();

        foreach ($posts as $post){
            //Texto
            $textosArray = Descpost::select('descripcion')->where('dpost_post',$post->id)->get();
            $textoCompleto = "";
            foreach ($textosArray as $texto)
                $textoCompleto = $textoCompleto.$texto->descripcion;
            $post['texto'] = $textoCompleto;

            //Comentarios
            $numComentarios = Comentario::where('com_post',$post->post_id)->count();
            $post['numComentarios'] = $numComentarios;

            //Calificacion
            $votosBuenos = Calificacion::where('cal_post',$post->id)->where('cal_calificacion',1)->count();
            $votosMalas = Calificacion::where('cal_post',$post->id)->where('cal_calificacion',0)->count();

            $post['calificaciones'] = [
                'votosBuenos' => $votosBuenos,
                'votosMalos' => $votosMalas
            ];

            //Archivos
            $archivos = Archivo::select('arch_id as id','arch_nombre as nombre')->join('materialposts','mat_arch','=','arch_id')->where('mat_post',$post->id)->get();
            $post['archivos'] = $archivos;
        }

        return response()->json($posts);
    }

    public function store(PostRequest $request) {
        $user = Auth::user();
        $post = Post::create([
           'post_user' => $user->nocontrol,
           'post_subtitle' => $request->get('subtitulo'),
            'post_materia' => $request->get('materia')
        ]);

        $texto = $request->get('texto');
        if (strlen($texto) <= 255)
            Descpost::create([
                'dpost_post' => $post->post_id,
                'dpost_inc' => 1,
                'descripcion' => $texto
            ]);
        else {
            $inc = 1;
            do {
                $largo = strlen($texto) >= 255 ? 255 : strlen($texto);
                $textoAux = substr($texto,0,$largo);
                Descpost::create([
                    'dpost_post' => $post->post_id,
                    'dpost_inc' => $inc++,
                    'descripcion' => $textoAux
                ]);
                $texto = substr($texto,$largo);
            }while( strlen($texto)>0 );
        }

        $archivos = $request->get('archivos');
        foreach ($archivos as $archivo)
            MaterialPost::create([
                'mat_post' => $post->post_id,
                'mat_arch' => $archivo
            ]);

        return response()->json([
            'Mensaje' => 'Post creado correctamente'
        ],201);
    }


    public function show(Post $post) {
        //
    }

    public function update(Request $request, Post $post) {
        //
    }

    public function destroy(Post $post) {
        //
    }
}
