<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // 複数代入を許可するカラム
    protected $fillable = [
        'user_id',
        'category_id',
        'name',
        'price',
        'brand',
        'description',
        'img_url',
        'condition',
        'status',
    ];

    /* ==========================
     * リレーション
     * ========================== */

    // 出品者（ユーザー）
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    // カテゴリー
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // コメント
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // いいね
    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    // 注文
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    // マイリスト
    public function mylists()
    {
        return $this->hasMany(Mylist::class);
    
}
}