<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    // 複数代入可能なカラムを指定
    protected $fillable = [
        'user_id',
        'product_id',
        'content',
    ];

    /**
     * コメントを投稿したユーザー
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * コメントが紐づく商品
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
