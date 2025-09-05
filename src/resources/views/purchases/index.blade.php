@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/purchase.css') }}">
@endsection

@section('content')
<div class="purchase-container">

    {{-- 左：商品情報 --}}
    <div class="purchase-main">
        <div class="product-head">
            <div class="thumb">
                <img src="{{ $product->img_url }}" alt="{{ $product->name }}">
            </div>
            <div class="product-meta">
                <h2 class="title">{{ $product->name }}</h2>
                <p class="price">¥ {{ number_format($product->price) }}</p>
            </div>
        </div>

        <hr class="sep">

        <div class="field">
            <label for="payment" class="label">支払い方法</label>
            <div class="control">
                <select id="payment" name="payment_method">
                    <option value="" selected disabled>選択してください</option>
                    <option value="convenience_store">コンビニ払い</option>
                    <option value="credit_card">カード払い</option>
                </select>
            </div>
        </div>

        <hr class="sep">

        <div class="shipping">
            <div class="label">配送先</div>
            <a class="link-edit" href="{{ route('purchase.address.edit', ['product' => $product->id]) }}">変更する</a>

            @if($address)
            <p class="zip">〒 {{ $address->postcode }}</p>
            <p>{{ $address->address }} {{ $address->building }}</p>
            @else
            <p>住所が未登録です</p>
            @endif
        </div>

        <hr class="sep">
    </div><!-- /.purchase-main -->

    {{-- 右：サマリーBOX --}}
    <aside class="purchase-aside">
        <table class="summary">
            <tr>
                <th>商品代金</th>
                <td>¥ {{ number_format($product->price) }}</td>
            </tr>
            <tr>
                <th>支払い方法</th>
                <td>コンビニ払い</td>
            </tr>
        </table>

        <form method="POST" action="{{ route('purchase.store', ['product' => $product->id]) }}">
            @csrf
            <button type="submit" class="btn-buy">購入する</button>
        </form>
    </aside>

</div>
@endsection