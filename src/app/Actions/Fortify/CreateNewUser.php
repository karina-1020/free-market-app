<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use App\Http\Requests\RegisterRequest; 
use App\Http\Requests\LoginRequest; 

class CreateNewUser implements CreatesNewUsers
{
    public function create(array $input)
    {
        // RegisterRequest のルールとメッセージを利用
        $req = app(RegisterRequest::class);

        Validator::make(
            $input,
            $req->rules(),
            $req->messages(),     // ← 日本語エラーメッセージ
            method_exists($req, 'attributes') ? $req->attributes() : []
        )->validate();

        return User::create([
            'name'     => $input['name'],
            'email'    => $input['email'],
            'password' => Hash::make($input['password']),
        ]);
    }
}