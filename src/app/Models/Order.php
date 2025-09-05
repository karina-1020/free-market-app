<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    // 一括代入を許可するカラム
    protected $fillable = [
        'user_id',
        'product_id',
        'price',
        'status',
    ];

    /**
     * リレーション
     */

    // 注文はユーザーに属する
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // 注文は商品に属する
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // 注文は1つの支払いを持つ
    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
}
