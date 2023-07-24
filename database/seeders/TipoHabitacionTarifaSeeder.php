<?php

namespace Database\Seeders;

use App\Models\TipoHabitacionTarifa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoHabitacionTarifaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tarifas = [
            '1500',
            '3000'
        ];

        foreach($tarifas as $tarifa)
        {
            $t = new TipoHabitacionTarifa();
            $t->precio = $tarifa;
            $t->save();
        }
    }
}
