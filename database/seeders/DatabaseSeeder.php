<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\MetodoPagoSeeder;
use Database\Seeders\TipoHabitacionSeeder;
use Database\Seeders\TipoHabitacionTarifaSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            TipoHabitacionTarifaSeeder::class,
            TipoHabitacionSeeder::class,
            MetodoPagoSeeder::class
        ]);
    }
}
