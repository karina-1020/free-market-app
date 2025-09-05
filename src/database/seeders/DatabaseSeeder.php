<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UsersTableSeeder::class,
            AddressesTableSeeder::class,
            CategoriesTableSeeder::class,
            ProductsTableSeeder::class,
            CommentsTableSeeder::class,
            LikesTableSeeder::class,
            OrdersTableSeeder::class,
            MylistsTableSeeder::class,
        ]);
    }
}
