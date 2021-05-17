<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    use HasFactory;

    protected $table = 'materias';
    protected $primaryKey = 'mat_id';

    public $incrementing = true;
    public $timestamps = true;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'mat_nombre',
        'mat_categoria'
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

    public function categoria(){
        return $this->belongsTo(Categoria::class,'mat_categoria');
    }

    public function archivos(){
        return $this->hasMany(Archivo::class,'arch_materia');
    }
}
