<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarrerasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('carreras')->insert([
           [
               'car_nombre' => 'Sistemas computacionales',
               'created_at' => Carbon::now()->toDateTime(),
               'updated_at' => Carbon::now()->toDateTime()
           ]
        ]);
    }
}
