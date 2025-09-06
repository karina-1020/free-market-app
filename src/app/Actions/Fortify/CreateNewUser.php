<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use App\Http\Requests\RegisterRequest; 

class CreateNewUser implements CreatesNewUsers
{
    public function create(array $input)
{
    $req = app(RegisterRequest::class);

    Validator::make(
        $input,
        $req->rules(),
        $req->messages(),
        method_exists($req, 'attributes') ? $req->attributes() : []
    )->validate();

    return User::create([
        'name'     => $input['name'],
        'email'    => $input['email'],
        'password' => Hash::make($input['password']),
    ]);
}
}