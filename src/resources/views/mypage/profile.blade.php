{{-- resources/views/mypage/profile.blade.php --}}
@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/mypage.css') }}">
@endsection

@section('content')
<div class="mypage-wrap">
    <div class="mypage-card">
        <h1 class="mypage-title">プロフィール設定</h1>

        <form class="profile-form" action="{{ route('mypage.profile.update') }}" method="post" enctype="multipart/form-data">
            @csrf
            {{-- アイコンアップロード --}}
            <div class="upload-box">
                <input id="avatar" class="upload-input" type="file" name="avatar" accept="image/*">
                <label for="avatar" class="btn ghost small">画像を選択する</label>
            </div>

            <label class="field-label" for="name">ユーザー名</label>
            <input id="name" name="name" type="text" class="input" value="{{ old('name', $user->name ?? '') }}">

            <label class="field-label" for="zip">郵便番号</label>
            <input id="zip" name="zip" type="text" class="input" value="{{ old('zip', $user->zip ?? '') }}" placeholder="123-4567">

            <label class="field-label" for="address">住所</label>
            <input id="address" name="address" type="text" class="input" value="{{ old('address', $user->address ?? '') }}">

            <label class="field-label" for="building">建物名</label>
            <input id="building" name="building" type="text" class="input" value="{{ old('building', $user->building ?? '') }}">

            <button type="submit" class="btn primary">更新する</button>
        </form>
    </div>
</div>
@endsection