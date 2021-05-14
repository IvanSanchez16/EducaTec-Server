<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categorias')->insert([
           [
               'cat_nombre' => 'Matemáticas', //1
               'created_at' => Carbon::now()->toDateTime(),
               'updated_at' => Carbon::now()->toDateTime()
           ],
            [
                'cat_nombre' => 'Programación', //2
                'created_at' => Carbon::now()->toDateTime(),
                'updated_at' => Carbon::now()->toDateTime()
            ],
            [
                'cat_nombre' => 'Ciencias básicas', //3
                'created_at' => Carbon::now()->toDateTime(),
                'updated_at' => Carbon::now()->toDateTime()
            ],
            [
                'cat_nombre' => 'Investigación', //4
                'created_at' => Carbon::now()->toDateTime(),
                'updated_at' => Carbon::now()->toDateTime()
            ],
            [
                'cat_nombre' => 'Administración', //5
                'created_at' => Carbon::now()->toDateTime(),
                'updated_at' => Carbon::now()->toDateTime()
            ],
            [
                'cat_nombre' => 'Bases de datos', //6
                'created_at' => Carbon::now()->toDateTime(),
                'updated_at' => Carbon::now()->toDateTime()
            ],
            [
                'cat_nombre' => 'Ingeniería de software', //7
                'created_at' => Carbon::now()->toDateTime(),
                'updated_at' => Carbon::now()->toDateTime()
            ],
            [
                'cat_nombre' => 'IA', //8
                'created_at' => Carbon::now()->toDateTime(),
                'updated_at' => Carbon::now()->toDateTime()
            ],
            [
                'cat_nombre' => 'Sistemas operativos y hardware', //9
                'created_at' => Carbon::now()->toDateTime(),
                'updated_at' => Carbon::now()->toDateTime()
            ],
            [
                'cat_nombre' => 'Redes', //10
                'created_at' => Carbon::now()->toDateTime(),
                'updated_at' => Carbon::now()->toDateTime()
            ],
            [
                'cat_nombre' => 'Otros', //11
                'created_at' => Carbon::now()->toDateTime(),
                'updated_at' => Carbon::now()->toDateTime()
            ]
        ]);
    }
}
