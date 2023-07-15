<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Persona>
 */
class PersonaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nombre'            => $this->faker->name(),
            'apellido'          => $this->faker->lastname(),
            'dni'               => $this->faker->unique()->numberBetween(10000000, 99999999),
            'telefono'          => $this->faker->numberBetween(1000000000, 9999999999),
            'email'             => $this->faker->unique()->safeEmail(),
            'tipo_persona_id'   => $this->faker->randomElement([1,2]),
        ];
    }
}
