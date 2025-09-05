<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $buyers = User::all();

        // 商品の30%くらいをランダムに購入済みにする
        Product::inRandomOrder()
            ->take((int)(Product::count() * 0.3))
            ->get()
            ->each(function ($product) use ($buyers) {
                $buyer = $buyers->random();

                // 出品者本人の商品はスキップ
                if ($product->user_id == $buyer->id) return;

                Order::firstOrCreate(
                    [
                        'user_id' => $buyer->id,
                        'product_id' => $product->id,
                    ],
                    [
                        'price' => $product->price ?? rand(2000, 80000),
                        'status' => 'paid',
                    ]
                );
            });
    }
}