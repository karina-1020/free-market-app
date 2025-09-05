@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/purchase.css') }}">
@endsection

@section('content')
<div class="purchase-container narrow">
    <div class="address-card">
        <h1 class="address-title">住所の変更</h1>

        <form method="POST" action="{{ route('purchase.address.update', ['product' => $product->id]) }}">
            @csrf

            <div class="field">
                <label class="label">郵便番号</label>
                <input class="input" type="text" name="postcode" value="{{ old('postcode', $address->postcode ?? '') }}">
            </div>

            <div class="field">
                <label class="label">住所</label>
                <input class="input" type="text" name="address" value="{{ old('address', $address->address ?? '') }}">
            </div>

            <div class="field">
                <label class="label">建物名</label>
                <input class="input" type="text" name="building" value="{{ old('building', $address->building ?? '') }}">
            </div>

            <button type="submit" class="btn-buy">更新する</button>
        </form>
    </div>
</div>
@endsection