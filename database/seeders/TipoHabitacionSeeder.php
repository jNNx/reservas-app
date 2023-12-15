<?php

namespace Database\Seeders;

use App\Models\TipoHabitacion;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TipoHabitacionSeeder extends Seeder
{
    public function run()
    {
        DB::insert("INSERT INTO reservas.tipo_habitaciones (nombre, precio, cantidad_camas, created_at, updated_at) VALUES 
        ('Individual', 1500, 4, NULL, NULL),
        ('Doble individual', 2000, 2, NULL, NULL),
        ('Doble', 3000, 1, NULL, NULL)
        ");
    }
}
