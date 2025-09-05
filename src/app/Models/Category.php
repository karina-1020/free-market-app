<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // 複数代入の保護を外す場合
    protected $fillable = ['name'];

    /**
     * このカテゴリーに属する商品 (Product) を取得
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
