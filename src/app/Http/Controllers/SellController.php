<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class SellController extends Controller
{
    // PG08
    public function create()
    {
        $categories = Category::orderBy('id')->get(); // 必要なら name で並び替えでもOK
        return view('sell.create', compact('categories'));
    }
}
