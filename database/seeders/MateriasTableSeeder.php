<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MateriasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('materias')->insert([
            [
                'mat_nombre' => 'Cálculo diferencial',
                'mat_categoria' => 1,
                'created_at' => Carbon::now()->toDateTime(),
                'updated_at' => Carbon::now()->toDateTime()
            ],
            [
                'mat_nombre' => 'Fundamentos de programación',
                'mat_categoria' => 2,
                'created_at' => Carbon::now()->toDateTime(),
                'updated_at' => Carbon::now()->toDateTime()
            ],
            [
                'mat_nombre' => 'Taller de ética',
                'mat_categoria' => 11,
                'created_at' => Carbon::now()->toDateTime(),
                'updated_at' => Carbon::now()->toDateTime()
            ],
            [
                'mat_nombre' => 'Matemáticas discretas',
                'mat_categoria' => 1,
                'created_at' => Carbon::now()->toDateTime(),
                'updated_at' => Carbon::now()->toDateTime()
            ],
            [
                'mat_nombre' => 'Taller de administración',
                'mat_categoria' => 5,
                'created_at' => Carbon::now()->toDateTime(),
                'updated_at' => Carbon::now()->toDateTime()
            ],
            [
                'mat_nombre' => 'Fundamentos de investigación',
                'mat_categoria' => 4,
                'created_at' => Carbon::now()->toDateTime(),
                'updated_at' => Carbon::now()->toDateTime()
            ],
            [
                'mat_nombre' => 'Cálculo integral',
                'mat_categoria' => 1,
                'created_at' => Carbon::now()->toDateTime(),
                'updated_at' => Carbon::now()->toDateTime()
            ],
            [
                'mat_nombre' => 'Programación orientada a objetos',
                'mat_categoria' => 2,
                'created_at' => Carbon::now()->toDateTime(),
                'updated_at' => Carbon::now()->toDateTime()
            ],
            [
                'mat_nombre' => 'Contabilidad financiera',
                'mat_categoria' => 5,
                'created_at' => Carbon::now()->toDateTime(),
                'updated_at' => Carbon::now()->toDateTime()
            ],
            [
                'mat_nombre' => 'Química',
                'mat_categoria' => 3,
                'created_at' => Carbon::now()->toDateTime(),
                'updated_at' => Carbon::now()->toDateTime()
            ],
            [
                'mat_nombre' => 'Álgebra lineal',
                'mat_categoria' => 1,
                'created_at' => Carbon::now()->toDateTime(),
                'updated_at' => Carbon::now()->toDateTime()
            ],
            [
                'mat_nombre' => 'Probabilidad y estadística',
                'mat_categoria' => 1,
                'created_at' => Carbon::now()->toDateTime(),
                'updated_at' => Carbon::now()->toDateTime()
            ],
            [
                'mat_nombre' => 'Cálculo vectorial',
                'mat_categoria' => 1,
                'created_at' => Carbon::now()->toDateTime(),
                'updated_at' => Carbon::now()->toDateTime()
            ],
            [
                'mat_nombre' => 'Estructura de datos',
                'mat_categoria' => 2,
                'created_at' => Carbon::now()->toDateTime(),
                'updated_at' => Carbon::now()->toDateTime()
            ],
            [
                'mat_nombre' => 'Cultura empresarial',
                'mat_categoria' => 5,
                'created_at' => Carbon::now()->toDateTime(),
                'updated_at' => Carbon::now()->toDateTime()
            ],
            [
                'mat_nombre' => 'Investigación de operaciones',
                'mat_categoria' => 5,
                'created_at' => Carbon::now()->toDateTime(),
                'updated_at' => Carbon::now()->toDateTime()
            ],
            [
                'mat_nombre' => 'Desarrollo sustentable',
                'mat_categoria' => 11,
                'created_at' => Carbon::now()->toDateTime(),
                'updated_at' => Carbon::now()->toDateTime()
            ],
            [
                'mat_nombre' => 'Física general',
                'mat_categoria' => 3,
                'created_at' => Carbon::now()->toDateTime(),
                'updated_at' => Carbon::now()->toDateTime()
            ],
            [
                'mat_nombre' => 'Ecuaciones diferenciales',
                'mat_categoria' => 1,
                'created_at' => Carbon::now()->toDateTime(),
                'updated_at' => Carbon::now()->toDateTime()
            ],
            [
                'mat_nombre' => 'Métodos numéricos',
                'mat_categoria' => 1,
                'created_at' => Carbon::now()->toDateTime(),
                'updated_at' => Carbon::now()->toDateTime()
            ],
            [
                'mat_nombre' => 'Tópicos avanzados de programación',
                'mat_categoria' => 2,
                'created_at' => Carbon::now()->toDateTime(),
                'updated_at' => Carbon::now()->toDateTime()
            ],
            [
                'mat_nombre' => 'Fundamentos de base de datos',
                'mat_categoria' => 6,
                'created_at' => Carbon::now()->toDateTime(),
                'updated_at' => Carbon::now()->toDateTime()
            ],
            [
                'mat_nombre' => 'Simulación',
                'mat_categoria' => 2,
                'created_at' => Carbon::now()->toDateTime(),
                'updated_at' => Carbon::now()->toDateTime()
            ],
            [
                'mat_nombre' => 'Principios eléctricos y aplicaciones digitales',
                'mat_categoria' => 9,
                'created_at' => Carbon::now()->toDateTime(),
                'updated_at' => Carbon::now()->toDateTime()
            ],
            [
                'mat_nombre' => 'Graficación',
                'mat_categoria' => 11,
                'created_at' => Carbon::now()->toDateTime(),
                'updated_at' => Carbon::now()->toDateTime()
            ],
            [
                'mat_nombre' => 'Fundamentos de telecomunicaciones',
                'mat_categoria' => 10,
                'created_at' => Carbon::now()->toDateTime(),
                'updated_at' => Carbon::now()->toDateTime()
            ],
            [
                'mat_nombre' => 'Sistemas operativos',
                'mat_categoria' => 9,
                'created_at' => Carbon::now()->toDateTime(),
                'updated_at' => Carbon::now()->toDateTime()
            ],
            [
                'mat_nombre' => 'Taller de base de datos',
                'mat_categoria' => 6,
                'created_at' => Carbon::now()->toDateTime(),
                'updated_at' => Carbon::now()->toDateTime()
            ],
            [
                'mat_nombre' => 'Fundamentos de ingeniería de software',
                'mat_categoria' => 7,
                'created_at' => Carbon::now()->toDateTime(),
                'updated_at' => Carbon::now()->toDateTime()
            ],
            [
                'mat_nombre' => 'Arquitectura de computadoras',
                'mat_categoria' => 9,
                'created_at' => Carbon::now()->toDateTime(),
                'updated_at' => Carbon::now()->toDateTime()
            ],
            [
                'mat_nombre' => 'Lenguajes y autómatas 1',
                'mat_categoria' => 2,
                'created_at' => Carbon::now()->toDateTime(),
                'updated_at' => Carbon::now()->toDateTime()
            ],
            [
                'mat_nombre' => 'Redes de computadoras',
                'mat_categoria' => 10,
                'created_at' => Carbon::now()->toDateTime(),
                'updated_at' => Carbon::now()->toDateTime()
            ],
            [
                'mat_nombre' => 'Taller de sistemas operativos',
                'mat_categoria' => 9,
                'created_at' => Carbon::now()->toDateTime(),
                'updated_at' => Carbon::now()->toDateTime()
            ],
            [
                'mat_nombre' => 'Administración de base de datos',
                'mat_categoria' => 6,
                'created_at' => Carbon::now()->toDateTime(),
                'updated_at' => Carbon::now()->toDateTime()
            ],
            [
                'mat_nombre' => 'Ingeniería de software',
                'mat_categoria' => 7,
                'created_at' => Carbon::now()->toDateTime(),
                'updated_at' => Carbon::now()->toDateTime()
            ],
            [
                'mat_nombre' => 'Lenguajez de interfaz',
                'mat_categoria' => 9,
                'created_at' => Carbon::now()->toDateTime(),
                'updated_at' => Carbon::now()->toDateTime()
            ],
            [
                'mat_nombre' => 'Temas selectos de base de datos',
                'mat_categoria' => 6,
                'created_at' => Carbon::now()->toDateTime(),
                'updated_at' => Carbon::now()->toDateTime()
            ],
            [
                'mat_nombre' => 'Lenguajes y autómatas 2',
                'mat_categoria' => 2,
                'created_at' => Carbon::now()->toDateTime(),
                'updated_at' => Carbon::now()->toDateTime()
            ],
            [
                'mat_nombre' => 'Conmutación y enrutamiento de redes de datos',
                'mat_categoria' => 10,
                'created_at' => Carbon::now()->toDateTime(),
                'updated_at' => Carbon::now()->toDateTime()
            ],
            [
                'mat_nombre' => 'Taller de investigación 1',
                'mat_categoria' => 4,
                'created_at' => Carbon::now()->toDateTime(),
                'updated_at' => Carbon::now()->toDateTime()
            ],
            [
                'mat_nombre' => 'Pruebas de software',
                'mat_categoria' => 7,
                'created_at' => Carbon::now()->toDateTime(),
                'updated_at' => Carbon::now()->toDateTime()
            ],
            [
                'mat_nombre' => 'Gestión de proyectos de software',
                'mat_categoria' => 7,
                'created_at' => Carbon::now()->toDateTime(),
                'updated_at' => Carbon::now()->toDateTime()
            ],
            [
                'mat_nombre' => 'Sistemas programables',
                'mat_categoria' => 9,
                'created_at' => Carbon::now()->toDateTime(),
                'updated_at' => Carbon::now()->toDateTime()
            ],
            [
                'mat_nombre' => 'Programación lógica y funcional',
                'mat_categoria' => 8,
                'created_at' => Carbon::now()->toDateTime(),
                'updated_at' => Carbon::now()->toDateTime()
            ],
            [
                'mat_nombre' => 'Administración de redes',
                'mat_categoria' => 10,
                'created_at' => Carbon::now()->toDateTime(),
                'updated_at' => Carbon::now()->toDateTime()
            ],
            [
                'mat_nombre' => 'Programación web',
                'mat_categoria' => 2,
                'created_at' => Carbon::now()->toDateTime(),
                'updated_at' => Carbon::now()->toDateTime()
            ],
            [
                'mat_nombre' => 'Métodos ágiles',
                'mat_categoria' => 7,
                'created_at' => Carbon::now()->toDateTime(),
                'updated_at' => Carbon::now()->toDateTime()
            ],
            [
                'mat_nombre' => 'Arquitectura de software',
                'mat_categoria' => 2,
                'created_at' => Carbon::now()->toDateTime(),
                'updated_at' => Carbon::now()->toDateTime()
            ],
            [
                'mat_nombre' => 'Mantenimiento de software',
                'mat_categoria' => 2,
                'created_at' => Carbon::now()->toDateTime(),
                'updated_at' => Carbon::now()->toDateTime()
            ],
            [
                'mat_nombre' => 'Inteligencía artificial',
                'mat_categoria' => 8,
                'created_at' => Carbon::now()->toDateTime(),
                'updated_at' => Carbon::now()->toDateTime()
            ],
            [
                'mat_nombre' => 'Ingeniería web',
                'mat_categoria' => 2,
                'created_at' => Carbon::now()->toDateTime(),
                'updated_at' => Carbon::now()->toDateTime()
            ],
            [
                'mat_nombre' => 'Proyecto integrador de ingeniería de software',
                'mat_categoria' => 7,
                'created_at' => Carbon::now()->toDateTime(),
                'updated_at' => Carbon::now()->toDateTime()
            ]
        ]);
    }
}
