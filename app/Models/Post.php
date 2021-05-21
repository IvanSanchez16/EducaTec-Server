<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';
    protected $primaryKey = 'post_id';

    public $incrementing = true;
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'post_user',
        'post_subtitle',
        'post_materia'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];

    public function user(){
        return $this->belongsTo(User::class,'post_user');
    }

    public function descpost(){
        return $this->hasMany(Descpost::class,'dpost_post');
    }

    public function calificaciones(){
        return $this->hasMany(Calificaciones::class,'cal_id');
    }

    public function getText(){
        if ($this->post_id)
            $textosArray = Descpost::select('descripcion')->where('dpost_post',$this->post_id)->get();
        else
            $textosArray = Descpost::select('descripcion')->where('dpost_post',$this->id)->get();
        $textoCompleto = "";
        foreach ($textosArray as $texto)
            $textoCompleto = $textoCompleto.$texto->descripcion;
        return $textoCompleto;
    }

    public function Comentarios() {
        $user = Auth::user();
        $comentarios = Comentario::select([
            'com_id as id',
            'com_user as autor',
            DB::raw('(DATE_FORMAT(comentarios.created_at,"%d/%m/%Y")) as fecha')
        ])->where('com_post',$this->post_id)
            ->whereNull('com_comentario')
            ->get();

        return $this->getInfoComentarios($comentarios);
    }

    private function getComentarios(Comentario $comentario) {
        $respuestas = Comentario::select([
            'com_id as id',
            'com_user as autor',
            DB::raw('(DATE_FORMAT(comentarios.created_at,"%d/%m/%Y")) as fecha')
        ])->where('com_post',$comentario->com_post)
            ->where('com_comentario',$comentario->com_id)
            ->get();
        if (count($respuestas) == 0)
            return [];

        return $this->getInfoComentarios($respuestas);
    }

    private function getInfoComentarios($comentarios){
        $user = Auth::user();
        foreach ($comentarios as $comentario) {
            //Texto
            $textosArray = Desccomentarios::select('descripcion')->where('dcom_comentario',$comentario->id)->get();
            $textoCompleto = "";
            foreach ($textosArray as $texto)
                $textoCompleto = $textoCompleto.$texto->descripcion;
            $comentario['texto'] = $textoCompleto;

            //Votos
            $votosBuenos = Calificacion::where('cal_id',$comentario->id)->where('cal_post',0)->where('cal_calificacion',1)->count();
            $votosMalas = Calificacion::where('cal_id',$comentario->id)->where('cal_post',0)->where('cal_calificacion',0)->count();
            $votoPropio = Calificacion::where('cal_id',$comentario->id)->where('cal_post',0)->where('cal_user',$user->nocontrol)->first();
            $votoPropio = !$votoPropio ? 1 : ($votoPropio->calificacion == 1 ? 2 : 0);

            $comentario['calificaciones'] = [
                'votosBuenos' => $votosBuenos,
                'votosMalos' => $votosMalas,
                'votoPropio' => $votoPropio
            ];
            //Busqueda de respuestas de manera recursiva
            $respuestas = $this->getComentarios($comentario);
            if (count($respuestas) == 0)
                continue;
            $comentario['Respuestas'] = $respuestas;
        }
        return $comentarios;
    }
}
