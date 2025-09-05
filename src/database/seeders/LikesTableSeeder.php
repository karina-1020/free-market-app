<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Product;
use App\Models\Like;

class LikesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        Product::all()->each(function ($product) use ($users) {
            // 各商品に 0〜5 件のいいね
            $likers = $users->shuffle()->take(rand(0, 5));
            foreach ($likers as $u) {
                Like::firstOrCreate([
                    'user_id'    => $u->id,
                    'product_id' => $product->id,
                ]);
            }
        });
    }
}
