<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Product;
use App\Models\Mylist;

class MylistsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productIds = Product::pluck('id');

        User::all()->each(function ($user) use ($productIds) {
            // 各ユーザーに 3〜10 件のマイリストを付与
            $pick = $productIds->shuffle()->take(rand(3, 10));
            foreach ($pick as $pid) {
                Mylist::firstOrCreate([
                    'user_id'    => $user->id,
                    'product_id' => $pid,
                ]);
            }
        });
    }
}
