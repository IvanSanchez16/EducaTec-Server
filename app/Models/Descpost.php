<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Descpost extends Model
{
    use HasFactory;

    protected $table = 'descposts';
    protected $primaryKey = ['dpost_post','dpost_inc'];

    public $incrementing = false;
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'dpost_post',
        'dpost_inc',
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

    public function post(){
        return $this->belongsTo(Post::class,'dpost_post');
    }
}
