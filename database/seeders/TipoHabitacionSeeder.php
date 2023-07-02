<?php

namespace Database\Seeders;

use App\Models\TipoHabitacion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoHabitacionSeeder extends Seeder
{
    public function run()
    {
        $tipos = [
            'individual',
            'duplex'
        ];

        foreach($tipos as $tipo)
        {
            $t = new TipoHabitacion();
            $t->nombre = $tipo;
            $t->tarifa_id = '1';
            $t->save();
        }
    }
}
