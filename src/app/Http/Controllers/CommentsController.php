<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function store(Request $request, \App\Models\Product $product)
{
    $data = $request->validate([
        'body' => ['required','string','max:500'],
    ]);

    $product->comments()->create([
        'body' => $data['content'],
        'user_id' => auth()->id(), 
    ]);

    return back()->with('status', 'コメントを追加しました。');
}
}