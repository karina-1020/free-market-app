{{-- resources/views/sell/create.blade.php --}}
@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/sell.css') }}">
@endsection

@section('content')
<div class="sell-wrap"><!-- ページ余白 -->

    <div class="sell-card"><!-- 中央の白カード -->
        <h1 class="sell-title">商品の出品</h1>

        <form class="sell-form" action="{{ route('sell.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            {{-- ========== 商品画像 ========== --}}
            <h2 class="sec-title">商品画像</h2>
            <div class="upload-box">
                <input id="image" name="image" type="file" accept="image/*" class="upload-input">
                <label for="image" class="upload-btn">画像を選択する</label>
                {{-- プレビューは後でJSで --}}
                @error('image') <p class="err">{{ $message }}</p> @enderror
            </div>

            <hr class="divider">

            {{-- ========== 商品の詳細 ========== --}}
            <h2 class="sec-title">商品の詳細</h2>

            {{-- カテゴリー（ピル） --}}
            <div class="field">
                <div class="field-label">カテゴリー</div>
                <div class="pills" role="group" aria-label="カテゴリー">
                    @foreach($categories as $cat)
                    <label class="pill">
                        <input type="radio" name="category_id" value="{{ $cat->id }}"
                            {{ old('category_id') == $cat->id ? 'checked' : '' }}>
                        <span>{{ $cat->name }}</span>
                    </label>
                    @endforeach
                </div>
                @error('category_id') <p class="err">{{ $message }}</p> @enderror
            </div>

            {{-- 商品の状態（まずはセレクト） --}}
            <div class="field">
                <label for="condition" class="field-label">商品の状態</label>
                <select id="condition" name="condition" class="select">
                    <option value="" hidden>選択してください</option>
                    @foreach (['良好','目立った傷や汚れなし','やや傷や汚れあり','状態が悪い'] as $c)
                    <option value="{{ $c }}" {{ old('condition')===$c ? 'selected' : '' }}>{{ $c }}</option>
                    @endforeach
                </select>
                @error('condition') <p class="err">{{ $message }}</p> @enderror
            </div>

            <hr class="divider">

            {{-- ========== 商品名と説明 ========== --}}
            <h2 class="sec-title">商品名と説明</h2>

            <div class="field">
                <label for="name" class="field-label">商品名</label>
                <input id="name" name="name" type="text" class="input"
                    value="{{ old('name') }}" placeholder="例）EMPORIO ARMANI 腕時計">
                @error('name') <p class="err">{{ $message }}</p> @enderror
            </div>

            <div class="field">
                <label for="brand" class="field-label">ブランド名</label>
                <input id="brand" name="brand" type="text" class="input"
                    value="{{ old('brand') }}" placeholder="例）ARMANI">
                @error('brand') <p class="err">{{ $message }}</p> @enderror
            </div>

            <div class="field">
                <label for="description" class="field-label">商品の説明</label>
                <textarea id="description" name="description" class="textarea" rows="4"
                    placeholder="商品の状態や付属品、注意点などを記載してください。">{{ old('description') }}</textarea>
                @error('description') <p class="err">{{ $message }}</p> @enderror
            </div>

            <div class="field">
                <label for="price" class="field-label">販売価格</label>
                <div class="price-row">
                    <span class="currency">¥</span>
                    <input id="price" name="price" type="number" inputmode="numeric" min="1" step="1"
                        class="input price" value="{{ old('price') }}" placeholder="0">
                </div>
                @error('price') <p class="err">{{ $message }}</p> @enderror
            </div>

            <div class="actions">
                <button type="submit" class="sell-btn">出品する</button>
            </div>
        </form>
    </div>

</div>
@endsection