<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /** 商品一覧 */
    public function index(Request $request)
    {
        // /?tab=mylist のときは mylist、無ければ recommend
        $tab = $request->query('tab', 'recommend');

        // カテゴリを一緒に取得して最大12件
        $items = Product::with('category')->take(12)->get();

        return view('items.index', compact('items', 'tab'));
    }

    /** 商品詳細 */
    public function show($id)
    {
        // カテゴリ・コメント・いいねまで事前読込（必要に応じて調整）
        $product = Product::with(['category', 'comments.user', 'likes'])
            ->withCount(['likes', 'comments'])
            ->findOrFail($id);

        return view('items.show', compact('product'));
    }
}
