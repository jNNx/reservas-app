<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Personas
        DB::insert("INSERT INTO reservas.personas (nombre, apellido, dni, telefono, email, created_at, updated_at) VALUES 
        ('Aldo', ' Raine', 111222333, 379456780, 'aldo.r@test.com', NULL, NULL),
        ('Hans', ' Landa', 111222334, 379456781, 'hans.l@test.com', NULL, NULL),
        ('Shosanna', ' Dreyfus', 111222335, 379456782, 'shosanna.d@test.com', NULL, NULL),
        ('Bridget', ' von Hammersmark', 111222335, 379456782, 'bridget.vh@test.com', NULL, NULL)
        ");

        //Clientes
        DB::insert("INSERT INTO reservas.clientes (persona_id, created_at, updated_at, deleted_at) VALUES
        (3, '2023-12-16 13:37:00', '2023-12-16 13:37:00', NULL),
        (4, '2023-12-16 13:37:00', '2023-12-16 13:37:00', NULL),
        (5, '2023-12-16 13:37:00', '2023-12-16 13:37:00', NULL),
        (6, '2023-12-16 13:37:00', '2023-12-16 13:37:00', NULL)
        ");
    }
}
