<?php

namespace Database\Factories;

use App\Models\Address;

use Illuminate\Database\Eloquent\Factories\Factory;

class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create('ja_JP'); 

        return [
            'postal_code' => $faker->postcode,
            'address'     => $faker->prefecture . $faker->city . $faker->streetAddress,
            'building'    => $faker->secondaryAddress, // 任意項目
        ];
    }
}
