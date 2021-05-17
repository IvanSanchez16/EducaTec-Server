<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    protected $table = 'users';
    protected $primaryKey = 'matricula';

    public $incrementing = false;
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function archivos(){
        return $this->hasMany(Archivo::class,'arch_user');
    }

    public function posts(){
        return $this->hasMany(Post::class,'post_user');
    }

    public function comentarios(){
        return $this->hasMany(Comentario::class,'com_user');
    }

    public function calificaciones(){
        return $this->hasMany(Calificacion::class,'cal_user');
    }

    public function tipoUsuario(){
        return $this->belongsTo(TipoDeUsuario::class,'us_tipo_usuario');
    }

    public function carrera(){
        return $this->belongsTo(Carrera::class,'us_carrera');
    }
}
