@extends('layouts.app')

@section('css')
{{-- 認証ページ専用CSSを読み込み --}}
<link rel="stylesheet" href="{{ asset('css/auth.css') }}">
@endsection

@section('content')
<div class="auth-wrap">
    <div class="auth-card">
        {{-- タイトル --}}
        <h1 class="auth-title">ログイン</h1>

        {{-- フォーム本体 --}}
        <form method="POST" action="{{ route('login') }}">
            @csrf

            {{-- メールアドレス --}}
            <label for="email">メールアドレス</label>
            <input id="email" type="email" name="email" autocomplete="email">

            {{-- パスワード --}}
            <label for="password">パスワード</label>
            <input id="password" type="password" name="password" autocomplete="current-password">

            {{-- ログインボタン（auth専用デザイン） --}}
            <button type="submit" class="auth-btn">ログインする</button>
        </form>

        {{-- 下のリンク：会員登録へ --}}
        <div class="auth-sub">
            <a href="{{ route('register') }}">会員登録はこちら</a>
        </div>
    </div>
</div>
@endsection