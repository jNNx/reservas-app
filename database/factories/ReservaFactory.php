<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reserva>
 */
class ReservaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'habitacion_id' => $this->faker->randomElement([1, 2, 3, 4, 5, 6]),
            'persona_id'    => $this->faker->randomElement([1, 2, 3, 4, 5, 6]),
            'metodo_pago_id'=> $this->faker->randomElement([1, 2]),
            'fecha_ingreso' => $this->faker->dateTime('Y-m-d'),
            'fecha_salida'  => $this->faker->dateTime('Y-m-d'),
            'importe_final' => $this->faker->randomFloat()
        ];
    }
}
