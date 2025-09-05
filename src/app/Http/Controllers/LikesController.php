<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LikesController extends Controller
{
    // いいね追加
    public function store($item)
    {
        // 後で実装：ログイン中ユーザーが対象商品に「いいね」する
        return back()->with('status', 'いいねしました（仮）');
    }

    // いいね解除
    public function destroy($item)
    {
        // 後で実装：ログイン中ユーザーの「いいね」を削除
        return back()->with('status', 'いいね解除しました（仮）');
    }
}
