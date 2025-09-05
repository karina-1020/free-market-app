<?php

namespace Database\Factories;

use App\Models\Like;

use Illuminate\Database\Eloquent\Factories\Factory;

class LikeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            // product_id, user_id は seeder 側でセット
        ];
    }
}
