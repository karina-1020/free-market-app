@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/items.css') }}">
@endsection

@section('content')
<nav class="tabs">
    <a href="{{ route('items.index') }}" class="{{ $tab==='recommend' ? 'active' : '' }}">おすすめ</a>
    <a href="{{ route('items.index', ['tab'=>'mylist']) }}" class="{{ $tab==='mylist' ? 'active' : '' }}">マイリスト</a>
</nav>

<section class="items-grid">
    @foreach ($items as $item)
    <article class="item-card">
        <a href="{{ route('items.show', $item->id) }}">
            <div class="thumb">
                <img src="{{ $item->img_url }}" alt="{{ $item->name }}">
            </div>
            <p class="name">{{ $item->name }}</p>
            <p class="brand">{{ $item->brand }}</p>
            <p class="price">¥{{ number_format($item->price) }}</p>
        </a>
    </article>
    @endforeach
</section>
@endsection