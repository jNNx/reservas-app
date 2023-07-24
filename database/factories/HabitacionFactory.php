<?php

namespace Database\Factories;

use App\Models\TipoPersona;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Habitacion>
 */
class HabitacionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'tipo_habitacion_id'    => $this->faker->randomElement([1, 2]),
            //'descripcion'           => $this->faker->sentence(),
            'disponible'            => $this->faker->boolean()
        ];
    }
}
