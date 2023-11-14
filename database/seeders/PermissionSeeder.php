<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permiso = Permission::create(['name' => 'AGREGAR USUARIO']);
        $permiso = Permission::create(['name' => 'ELIMINAR USUARIO']);
        $permiso = Permission::create(['name' => 'LISTAR RESERVAS (TODAS)']);
        $permiso = Permission::create(['name' => 'AGREGAR RESERVA']);
        $permiso = Permission::create(['name' => 'VER RESERVA']);
        $permiso = Permission::create(['name' => 'ELIMINAR RESERVA']);
    }
}
