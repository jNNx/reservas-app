<?php

namespace Database\Seeders;

use App\Models\MetodoPago;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MetodoPagoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $metodos = [
            'efectivo',
            'tarjeta',
            'transferencia'
        ];

        foreach($metodos as $metodo)
        {
            $t = new MetodoPago();
            $t->descripcion = $metodo;
            $t->save();
        }
    }
}
