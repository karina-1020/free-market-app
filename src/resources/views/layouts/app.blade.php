<!DOCTYPE html>

<html lang="ja">

<head>
    {{-- ページのメタ情報（文字コード、タイトルなど） --}}

    {{-- 日本語が文字化けしないようにUTF-8を指定 --}}
    <meta charset="UTF-8">

    {{-- ブラウザのタブに表示されるタイトル --}}
    <title>フリマアプリ</title>

    {{-- 全ページ共通のCSSを読み込む --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Font Awesome CDN 読み込み -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
   
        {{-- ページごとのCSSを差し込む場所 --}}
    @yield('css')
</head>

<body>
    {{-- ページ本文の開始 --}}

    <header class="site-header">
        <div class="container header-inner">
            <a href="{{ url('/') }}" class="brand">
                <img src="{{ asset('images/logo/logo.svg') }}" alt="COACHTECH" class="site-logo">
            </a>

            {{-- 画面ごとのヘッダー差分を入れる場所（検索ボックスなど） --}}
            @hasSection('header-extra')
            @yield('header-extra')
            @else
            {{-- auth系(ログイン/登録/メール認証)のときは何も出さない --}}
            @if (!Request::is('login') && !Request::is('register') && !Request::is('email/verification*'))
            {{-- 左：検索ボックス --}}
            <form action="{{ route('items.index') }}" method="get" class="header-search" style="flex:1;max-width:520px;">
                <input type="text" name="q" placeholder="なにをお探しですか？" class="search-input">
            </form>

            {{-- 右：メニュー --}}
            <nav class="header-nav">
                @auth
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    ログアウト
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="post" style="display:none;">
                    @csrf
                </form>
                <a href="{{ route('mypage.index') }}">マイページ</a>
                <a href="{{ route('sell.create') }}" class="btn-sell">出品</a>
                @endauth

                @guest
                <a href="{{ route('login') }}">ログイン</a>
                {{-- 未ログインでも表示。クリック時はログインへ誘導（ルート側でガード） --}}
                <a href="{{ route('mypage.index') }}">マイページ</a>
                <a href="{{ route('sell.create') }}">出品</a>
                {{-- 会員登録リンクも出したければ下行を有効化 --}}
                {{-- <a href="{{ route('register') }}">会員登録</a> --}}
                @endguest
            </nav>
            @endif
            @endif
        </div>
    </header>

    <main class="container">
        {{-- ページごとのメインコンテンツを差し込む場所 --}}
        @yield('content')
    </main>
</body>


</html>