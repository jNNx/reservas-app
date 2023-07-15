<?php

namespace Database\Seeders;

use App\Models\TipoUser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipoUser::create(['descripcion' => 'Administrador']);
        TipoUser::create(['descripcion' => 'Recepcionista']);  
    }
}
