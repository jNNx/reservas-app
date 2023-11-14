<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Persona
        DB::insert("INSERT INTO reservas.personas (nombre, apellido, dni, telefono, email, created_at, updated_at) VALUES 
                    ('Juan', 'Romero', 00133700, 379456789, 'juan.r@test.com', NULL, NULL),
                    ('Alberto', 'Sosa', 00133702, 379456789, 'alberto.s@test.com', NULL, NULL)
                ");
        //User
        DB::insert("INSERT INTO reservas.users (username, tipo_user_id, persona_id, created_at, updated_at) VALUES
                    ('juan_r', 2, 1, '2022-07-05 13:37:00', '2022-07-05 13:37:00'),
                    ('alberto_s', 1, 2, '2022-07-05 13:37:00', '2022-07-05 13:37:00')
                ");

        $users = User::all();
        foreach ($users as $user)
        {
            $user->password=  Hash::make($user->username);
            $user->update();
        }
        Schema::table('users', function (Blueprint $table) {
                $table->string('password')->required()->change();
                });
    }
}
