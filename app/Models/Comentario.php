<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;

    protected $table = 'comentarios';
    protected $primaryKey = 'com_id';

    public $incrementing = true;
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'com_user',
        'com_post',
        'com_comentario'
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
        return $this->belongsTo(User::class,'com_user');
    }

    public function post(){
        return $this->belongsTo(Post::class,'com_post');
    }

    public function desccomentarios(){
        return $this->hasMany(Desccomentarios::class,'dcom_comentario');
    }

    public function calificaciones(){
        return $this->hasMany(Calificaciones::class,'cal_id');
    }

}
