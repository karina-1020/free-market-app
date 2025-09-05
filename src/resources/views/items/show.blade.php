@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/items.css') }}">
@endsection

@section('content')
<div class="container">
    <section class="item-detail">
        {{-- 左：商品画像 --}}
        <div class="detail-left">
            <div class="photo">
                <img src="{{ $product->img_url }}" alt="{{ $product->name }}">
            </div>
        </div>

        {{-- 右：商品詳細 --}}
        <div class="detail-right">
            <h1 class="detail-title">{{ $product->name }}</h1>
            <p class="detail-brand">{{ $product->brand }}</p>
            <p class="detail-price">¥{{ number_format($product->price) }} <small>（税込）</small></p>

            <!-- いいね/コメント数（実装前は0でもOK） -->
            <div class="detail-meta">
                <span><i class="fa-regular fa-star"></i> {{ $product->likes_count ?? ($product->likes->count() ?? 0) }}</span>
                <span><i class="fa-regular fa-comment"></i> {{ $product->comments_count ?? ($product->comments->count() ?? 0) }}</span>
            </div>

            <a href="{{ route('purchase.index', ['product' => $product->id]) }}" class="buy-btn">
                購入手続きへ
            </a>

            <h2 class="sec-title">商品説明</h2>
            <p>{{ $product->description }}</p>

            <h2 class="sec-title">商品の情報</h2>
            <div class="pills">
                <p><strong>カテゴリー</strong>
                    < class="pill">{{ $product->category->name ?? '未設定' }}
                </p>
                <p><strong>商品の状態</strong> {{ $product->condition ?? '未設定' }}</p>
            </div>


            {{-- ここからコメント --}}
            <h2 class="sec-title">コメント（{{ $product->comments->count() ?? 0 }}）</h2>

            <div class="comment-list">
                @forelse($product->comments as $comment)
                <div class="comment">
                    <div class="comment-avatar"></div>
                    <div class="comment-body">
                        <div class="comment-name">{{ $comment->user->name ?? 'admin' }}</div>
                        <div class="comment-bubble">{{ $comment->body }}</div>
                    </div>
                </div>
                @empty
                <p class="comment-empty">まだコメントはありません</p>
                @endforelse
            </div>

            <h3 class="sec-title">商品へのコメント</h3>
            <form action="#" method="post" class="comment-form">
                @csrf
                <textarea name="body" placeholder="こちらにコメントを入力してください"></textarea>
                <button type="submit" class="detail-btn">コメントを送信する</button>
            </form>
            {{-- コメントここまで --}}
        </div>
    </section>
</div>
@endsection