@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/mypage.css') }}">
@endsection

@section('content')
<div class="mypage-wrap">
    <div class="mypage-card">
        <h1 class="mypage-title">プロフィール</h1>

        <div class="profile-head">
            <div class="avatar">
                @if(!empty($user->avatar_url))
                <img src="{{ $user->avatar_url }}" alt="{{ $user->name }}">
                @else
                <span class="avatar-dummy"></span>
                @endif
            </div>
            <div class="user-name">{{ $user->name ?? 'ユーザー名' }}</div>
            <a href="{{ route('mypage.profile') }}" class="btn ghost">プロフィールを編集</a>
        </div>

        <hr class="divider">

        <div class="section-title">
            購入した商品
            <a href="#" class="link-more">もっと見る</a>
        </div>
        <div class="item-grid">
            {{-- あとで商品カードを@foreachで並べる --}}
            <div class="item-card dummy">商品画像</div>
            <div class="item-card dummy">商品画像</div>
            <div class="item-card dummy">商品画像</div>
            <div class="item-card dummy">商品画像</div>
        </div>
    </div>
</div>
@endsection