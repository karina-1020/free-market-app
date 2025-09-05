<?php

// app/Http/Controllers/ProfilesController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    public function profile(Request $request)
    {
        $user = $request->user();
        return view('mypage.profile', compact('user'));
    }

    public function update(Request $request)
    {
        // バリデーションは後でまとめて。今は最低限の保存だけ入れてもOK
        $user = $request->user();
        $user->name = $request->input('name', $user->name);
        $user->zipcode = $request->input('zipcode');
        $user->address = $request->input('address');
        $user->building = $request->input('building');
        $user->save();

        return redirect()->route('mypage.profile')->with('status', '更新しました');
    }
}
