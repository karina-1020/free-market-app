<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

class PurchasesController extends Controller
{
    public function index(Product $product)
    {
        $address = auth()->user()->address ?? null; // ← これが無いと $address 未定義になる
        return view('purchases.index', compact('product', 'address'));
    }

    public function addressEdit(Product $product)
    {
        return view('purchases.address', compact('product'));
    }

    public function store(Product $product)
{
    // ① すでにSOLDなら処理しない
    if ($product->is_sold) {
        return redirect()->back()->with('error', 'この商品はすでに購入されています。');
    }

    // ② 商品を購入済みに更新
    $product->is_sold = true;
    $product->save();

    // ③ 購入履歴テーブルに保存（必要なら）
    // Purchase::create([
    //     'user_id' => auth()->id(),
    //     'product_id' => $product->id,
    //     'status' => 'paid',
    // ]);

    // ④ リダイレクト
    return redirect()
        ->route('mypage.index')
        ->with('flash', '購入が完了しました');
}
}