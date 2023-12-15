<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class HabitacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert("INSERT INTO reservas.habitaciones (tipo_habitacion_id, disponible, created_at, updated_at) VALUES 
        (1, 1, NULL, NULL),
        (1, 1, NULL, NULL),
        (1, 1, NULL, NULL),
        (2, 1, NULL, NULL),
        (2, 1, NULL, NULL),
        (3, 1, NULL, NULL)
        ");
    }
}
