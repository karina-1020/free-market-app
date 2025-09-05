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
        // 購入確定処理（ダミーでOK）
        return redirect()->route('mypage.index')->with('flash', '購入が完了しました');
    }
}