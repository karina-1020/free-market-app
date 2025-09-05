<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyPagesController extends Controller
{
    public function index(Request $request)
    {
        // TODO: 出品/購入のタブ切替は後で
        return view('mypage.index');
    }
}
