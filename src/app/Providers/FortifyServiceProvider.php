<?php

namespace App\Providers;

use Laravel\Fortify\Contracts\CreatesNewUsers;
use App\Actions\Fortify\CreateNewUser;
use App\Models\User;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;   
use Illuminate\Cache\RateLimiting\Limit;      
use Illuminate\Http\Request;                  
use App\Http\Requests\LoginRequest;

class FortifyServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(CreatesNewUsers::class, CreateNewUser::class);
    }

    public function boot(): void
    {
        // 画面の指定
        Fortify::loginView(fn () => view('auth.login'));
        Fortify::registerView(fn () => view('auth.register'));

        // ★ログインのレート制限
    RateLimiter::for('login', function (Request $request) {
        return Limit::perMinute(30)->by($request->email.$request->ip());
    });

        // ★ここがポイント：ログイン時のバリデーションに LoginRequest を使う
        Fortify::authenticateUsing(function ($request) {
            // LoginRequest の rules()/messages() を適用
            $req = app(LoginRequest::class);
            $validated = app('validator')->make(
                $request->all(),
                $req->rules(),
                $req->messages()
            )->validate();

            // 認証処理
            $user = User::where('email', $validated['email'])->first();
            if ($user && Auth::validate([
                'email' => $validated['email'],
                'password' => $validated['password'],
            ])) {
                return $user;
            }
            return null;
        });
    }
}