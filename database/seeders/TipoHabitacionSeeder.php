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
            'doble individual',
            'doble'
        ];

        foreach($tipos as $tipo)
        {
            $t = new TipoHabitacion();
            $t->nombre = $tipo;
            $t->precio = '2000';
            $t->cantidad_camas = '4';
            $t->save();
        }
    }
}
