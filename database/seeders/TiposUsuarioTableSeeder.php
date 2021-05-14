<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TiposUsuarioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tiposusuarios')->insert([
           [
               'tuNombre' => 'Administrador',
               'created_at' => Carbon::now()->toDateTime(),
               'updated_at' => Carbon::now()->toDateTime()
           ],
            [
                'tuNombre' => 'Moderador',
                'created_at' => Carbon::now()->toDateTime(),
                'updated_at' => Carbon::now()->toDateTime()
            ],
            [
                'tuNombre' => 'Estudiante',
                'created_at' => Carbon::now()->toDateTime(),
                'updated_at' => Carbon::now()->toDateTime()
            ]
        ]);
    }
}
