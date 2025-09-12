@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/items.css') }}">
@endsection

@section('content')
<section class="items-container">
<nav class="tabs">
    <a href="{{ route('items.index') }}" class="{{ $tab==='recommend' ? 'active' : '' }}">おすすめ</a>
    <a href="{{ route('items.index', ['tab'=>'mylist']) }}" class="{{ $tab==='mylist' ? 'active' : '' }}">マイリスト</a>
</nav>

<section class="items-grid">
  @foreach ($items as $item)
    <article class="item-card">
      <a href="{{ route('items.show', $item->id) }}">
        <div class="thumb">
          {{-- ← ここでSOLD表示（is_sold列 or モデルのisSold()） --}}
          @if(isset($item->is_sold) ? $item->is_sold : $item->isSold())
            <span class="badge-sold">SOLD</span>
          @endif

          <img src="{{ $item->img_url }}" alt="{{ $item->name }}">
        </div>
        <p class="name">{{ $item->name }}</p>
      </a>
    </article>
  @endforeach
</section>