<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Desccomentarios extends Model
{
    use HasFactory;

    protected $table = 'desccomentarios';
    protected $primaryKey = ['dcom_comentario','dcom_inc'];

    public $incrementing = false;
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'dcom_comentario',
        'dcom_inc',
        'descripcion'
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

    public function comentario(){
        return $this->belongsTo(Comentario::class,'dcom_comentario');
    }
}
