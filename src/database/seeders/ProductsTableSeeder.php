<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Product;

class ProductsTableSeeder extends Seeder
{
    public function run()
    {
        $cats = Category::all()->keyBy('name');
        $users = User::pluck('id');

        // 共通のベースURL
        $base = 'https://coachtech-matter.s3.ap-northeast-1.amazonaws.com/image/';

        $products = [
            [
                'name' => '腕時計',
                'price' => 15000,
                'brand' => 'Rolax',
                'desc' => 'スタイリッシュなデザインのメンズ腕時計',
                'img' => $base . 'Armani+Mens+Clock.jpg',
                'cond' => '良好',
                'cat'  => 'ファッション',
            ],
            [
                'name' => 'HDD',
                'price' => 5000,
                'brand' => '西芝',
                'desc' => '大容量で信頼性の高いハードディスク',
                'img' => $base . 'HDD+Hard+Disk.jpg',
                'cond' => '目立った傷や汚れなし',
                'cat'  => 'PC・スマホ',
            ],
            [
                'name' => '玉ねぎ3束',
                'price' => 300,
                'brand' => 'なし',
                'desc' => '新鮮な玉ねぎ3束のセット',
                'img' => $base . 'iLoveIMG+d.jpg',
                'cond' => 'やや傷や汚れあり',
                'cat'  => '生活雑貨',
            ],
            [
                'name' => '革靴',
                'price' => 4000,
                'brand' => 'なし',
                'desc' => 'クラシックなデザインの革靴',
                'img' => $base . 'Leather+Shoes+Product+Photo.jpg',
                'cond' => '状態が悪い',
                'cat'  => 'ファッション',
            ],
            [
                'name' => 'ノートPC',
                'price' => 45000,
                'brand' => '東雲',
                'desc' => '高性能モバイルノートパソコン',
                'img' => $base . 'Living+Room+Laptop.jpg',
                'cond' => '美品',
                'cat'  => 'PC・スマホ',
            ],
            [
                'name' => 'マイク',
                'price' => 8000,
                'brand' => 'なし',
                'desc' => '高音質のレコーディング用マイク',
                'img' => $base . 'Music+Mic+4632231.jpg',
                'cond' => '良好',
                'cat'  => 'ホビー',
            ],
            [
                'name' => 'ショルダーバッグ',
                'price' => 3500,
                'brand' => 'なし',
                'desc' => 'おしゃれなショルダーバッグ',
                'img' => $base . 'Purse+fashion+pocket.jpg',
                'cond' => '目立った傷や汚れなし',
                'cat'  => 'ファッション',
            ],
            [
                'name' => 'タンブラー',
                'price' => 500,
                'brand' => 'なし',
                'desc' => '使いやすいシンプルなタンブラー',
                'img' => $base . 'Tumbler+souvenir.jpg',
                'cond' => 'やや傷や汚れあり',
                'cat'  => '生活雑貨',
            ],
            [
                'name' => 'コーヒーミル',
                'price' => 4000,
                'brand' => 'Starbacks',
                'desc' => '手動のコーヒーミル',
                'img' => $base . 'Waitress+with+Coffee+Grinder.jpg',
                'cond' => '良好',
                'cat'  => '生活雑貨',
            ],
            [
                'name' => 'メイクセット',
                'price' => 2500,
                'brand' => 'なし',
                'desc' => '便利なメイクアップセット',
                'img' => $base . '%E5%A4%96%E5%87%BA%E3%83%A1%E3%82%A4%E3%82%AF%E3%82%A2%E3%83%83%E3%83%95%E3%82%9A%E3%82%BB%E3%83%83%E3%83%88.jpg',
                'cond' => '目立った傷や汚れなし',
                'cat'  => '生活雑貨',
            ],
        ];
        $cats = Category::all()->keyBy('name');

        foreach ($products as $product) {
            Product::firstOrCreate(
                ['name' => $product['name']], // 重複登録防止
                [
                    'user_id'     => $users->random(),
                    'category_id' => $cats->get($product['cat'])->id ?? 1, // 万が一nullならカテゴリID=1
                    'price'       => $product['price'],
                    'brand'       => $product['brand'],
                    'description' => $product['desc'],
                    'img_url'     => $product['img'],
                    'condition'   => $product['cond'],
                    'status'      => 'for_sale',
                ]
            );
        }
}
}