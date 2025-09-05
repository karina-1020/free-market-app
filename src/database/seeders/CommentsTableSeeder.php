<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\User;
use App\Models\Comment;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::pluck('id');

        Product::all()->each(function ($product) use ($users) {
            $n = rand(0, 3);
            for ($i = 0; $i < $n; $i++) {
                Comment::factory()->create([
                    'user_id'    => $users->random(),
                    'product_id' => $product->id,
                ]);
            }
        });
    }
}
