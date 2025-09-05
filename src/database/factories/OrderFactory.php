<?php

namespace Database\Factories;

use App\Models\Order;

use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'quantity' => 1,
            'price'    => $this->faker->numberBetween(1000, 100000),
            'status'   => $this->faker->randomElement(['paid', 'cancelled', 'pending']),
        ];
    }
}
