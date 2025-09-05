<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use App\Actions\Fortify\CreateNewUser;

class FortifyServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        // これで CreatesNewUsers が作れない問題も解決
        $this->app->singleton(CreatesNewUsers::class, CreateNewUser::class);
    }

    public function boot(): void
    {
        // 画面
        Fortify::loginView(fn() => view('auth.login'));
        Fortify::registerView(fn() => view('auth.register'));

        // 会員登録完了後はプロフィール設定へ
        Fortify::redirects('register', '/mypage/profile');

        // ログイン完了後は一覧（マイリスト）へ
        Fortify::redirects('login', '/?tab=mylist');
    }
}