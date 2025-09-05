<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //  Address（1対1）
    public function address()
    {
        return $this->hasOne(Address::class);
    }

    //  Products（1対多 = 出品商品）
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    //  Orders（1対多 = 購入履歴）
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    //  Likes（1対多）
    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    //  Comments（1対多）
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    //  MyLists（1対多）
    public function mylists()
    {
        return $this->hasMany(Mylist::class);
    }

    //  Payments（1対多）
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
