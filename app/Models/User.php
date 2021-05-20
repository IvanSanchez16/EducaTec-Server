<?php

namespace App\Models;

use App\Notifications\UserEmailVerification;
use App\Notifications\UserResetPassword;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\HasApiTokens;


class User extends Authenticatable implements MustVerifyEmail
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
        'matricula',
        'nombre',
        'apellido_paterno',
        'apellido_materno',
        'semestre',
        'us_tipo_usuario',
        'us_carrera',
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

    public function show(){
        $fotoURL = $this->getURLFoto();
        return [
            'NoControl' => $this->matricula,
            'Nombre' => $this->nombre.' '.$this->apellido_paterno,
            'Foto' => $fotoURL
        ];
    }

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

    public function sendPasswordResetNotification($token){
        $this->notify(new UserResetPassword($token));
    }

    private function getURLFoto(){
        $noControl = $this->matricula;
        $extensiones = ['emf','wmf','jpg','jpeg','jfif','jpe','png','bmp','dib','rle','gif','emz','wmz','tif','tiff','svg','ico','webp'];

        foreach ($extensiones as $extension)
            if (Storage::disk('public')->exists('Fotos/'.$noControl.'.'.$extension))
                return public_path('storage/Fotos/'.$noControl.'.'.$extension);

        return public_path('storage/Fotos/Default.png');
    }
}
