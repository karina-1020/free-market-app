<?php

namespace Database\Factories;

use App\Models\Comment;

use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $this->faker = \Faker\Factory::create('ja_JP');

        return [
            'body' => $this->faker->realText(50),  // 日本語の文章になる
            'user_id' => \App\Models\User::factory(),
            'product_id' => \App\Models\Product::factory(),
        ];
    }
}
