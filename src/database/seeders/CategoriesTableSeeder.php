<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        $names = [
            '本',
            'メンズ',
            'レディース',
            '家電',
            'スポーツ',
            'アウトドア',
            'コスメ',
            '家具',
            'おもちゃ',
            '生活雑貨',
            'PC・スマホ',
            'ホビー',
            'ファッション',
        ];

        foreach ($names as $n) {
            Category::firstOrCreate(['name' => $n]);
        }
    }
}
