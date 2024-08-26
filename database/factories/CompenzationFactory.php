<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CompenzationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'              => $this->faker->numerify('Kompenzacija-####'),
            'year'              => 2022,
            'amount'            => $this->faker->randomFloat(4, 1000, 10000),
            'vat'               => 22,
            'commission'        => $this->faker->randomFloat(4, 10, 1000),
            'date_finished'     => $this->faker->date() . ' ' . $this->faker->time(),
            'date_payed'        => $this->faker->date() . ' ' . $this->faker->time(),
            'storno'            => false,
            'finished'          => false,
            'with_ddv'          => $this->faker->boolean(),
        ];
    }
}
