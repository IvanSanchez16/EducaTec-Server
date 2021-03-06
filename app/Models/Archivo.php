<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Archivo extends Model
{
    use HasFactory;

    protected $table = 'archivos';
    protected $primaryKey = 'arch_id';

    public $incrementing = true;
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'arch_nombre',
        'arch_materia',
        'arch_semestre',
        'arch_privado',
        'path',
        'arch_user'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];

    public function materia(){
        return $this->belongsTo(Materia::class,'arch_materia');
    }

    public function user(){
        return $this->belongsTo(User::class,'arch_user');
    }

    public function posts(){
        return $this->belongsToMany(Post::class,'materialposts','mat_arch','mat_post');
    }

    public function show() {
        $materia = Materia::select('mat_nombre')->where('mat_id',$this->arch_materia)->first();
        $date = date_create($this->updated_at);

        return [
            'id' => $this->arch_id,
            'nombre' => $this->arch_nombre,
            'materia' => $materia->mat_nombre,
            'semestre' => $this->arch_semestre,
            'fecha_modificacion' => date_format($date,'d/m/Y'),
            'privado' => $this->arch_privado,
            'path' => $this->path
        ];
    }
}
