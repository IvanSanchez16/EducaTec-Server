<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calificacion extends Model
{
    use HasFactory;

    protected $table = 'calificaciones';
    protected $primaryKey = ['cal_id','cal_post'];

    public $incrementing = true;
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cal_post',
        'cal_user',
        'cal_calificacion'
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
        return $this->belongsTo(User::class,'cal_user');
    }

    public function post(){
        return $this->belongsTo(Post::class,'cal_id');
    }

    public function comentario(){
        return $this->belongsTo(Comentario::class,'cal_id');
    }
}
