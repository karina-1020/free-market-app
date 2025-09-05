<?php

namespace Database\Factories;

use App\Models\Category;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $names = ['洋服', 'メンズ', 'レディース', '家電', '本', 'スポーツ', 'アウトドア', 'コスメ', '家具', 'おもちゃ'];
        return [
            'name' => $this->faker->unique()->randomElement($names),
        ];
    }
}
