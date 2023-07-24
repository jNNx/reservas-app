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
            'habitacion_id' => $this->faker->randomElement([1, 2, 3, 4, 5]),
            'cliente_id'    => $this->faker->randomElement([1, 2, 3, 4, 5]),
            'user_id'       => $this->faker->randomElement([1, 2]),
            'metodo_pago_id'=> $this->faker->randomElement([1, 2]),
            'fecha_ingreso' => $this->faker->date('Y-m-d'),
            'hora_ingreso'  => $this->faker->time('h:i'),
            'fecha_salida'  => $this->faker->dateTime('Y-m-d'),
            'importe_final' => $this->faker->numberBetween(1000, 9999)
        ];
    }
}
