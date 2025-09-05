<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentsController extends Controller
{
    // コメント投稿処理（PG05内で使用）
    public function store(Request $request, $item)
    {
        // 後で CommentsStoreRequest を使ってバリデーション & 保存を実装
        // いまは画面遷移の確認だけ
        return back()->with('status', 'コメント送信処理（仮）');
    }
}
