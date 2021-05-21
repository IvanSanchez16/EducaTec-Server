<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
