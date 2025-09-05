@extends('layouts.app')

@section('css')
{{-- 認証ページ専用CSSを読み込み --}}
<link rel="stylesheet" href="{{ asset('css/auth.css') }}">
@endsection

@section('content')
<div class="auth-wrap">
    <div class="auth-card">
        {{-- タイトル --}}
        <h1 class="auth-title">会員登録</h1>

        {{-- フォーム本体 --}}
        <form method="POST" action="{{ route('register') }}">
            @csrf

            {{-- ユーザー名 --}}
            <label for="name">ユーザー名</label>
            <input id="name" type="text" name="name" autocomplete="name">

            {{-- メールアドレス --}}
            <label for="email">メールアドレス</label>
            <input id="email" type="email" name="email" autocomplete="email">

            {{-- パスワード --}}
            <label for="password">パスワード</label>
            <input id="password" type="password" name="password" autocomplete="new-password">

            {{-- 確認用パスワード --}}
            <label for="password_confirmation">確認用パスワード</label>
            <input id="password_confirmation" type="password" name="password_confirmation" autocomplete="new-password">

            {{-- 登録ボタン（auth専用デザイン） --}}
            <button type="submit" class="auth-btn">登録する</button>
        </form>

        {{-- 下のリンク：ログインへ --}}
        <div class="auth-sub">
            <a href="{{ route('login') }}">ログインはこちら</a>
        </div>
    </div>
</div>
@endsection