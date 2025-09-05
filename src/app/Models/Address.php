<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    // 複数代入を許可するカラム
    protected $fillable = [
        'postal_code',
        'address',
        'building',
        'user_id',
    ];

    /**
     * ユーザーとのリレーション (Address belongsTo User)
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
