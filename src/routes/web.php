<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\PurchasesController;
use App\Http\Controllers\PurchaseAddressController;
use App\Http\Controllers\SellController;
use App\Http\Controllers\MyPagesController;
use App\Http\Controllers\ProfilesController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\LikesController;
use App\Models\Product;

// PG01 商品一覧（トップ）
// PG02 マイリスト（/?tab=mylist）
Route::get('/', [ProductsController::class, 'index'])->name('items.index');

// PG05 商品詳細
Route::get('/item/{item}', [ProductsController::class, 'show'])->name('items.show');

Route::middleware('auth')->group(function () {
    // 購入確認画面
    Route::get('/purchase/{product}', [PurchasesController::class, 'index'])
        ->name('purchase.index');

    // 住所変更
    Route::get('/purchase/address/{product}', [PurchaseAddressController::class, 'edit'])
        ->name('purchase.address.edit');
    Route::post('/purchase/address/{product}', [PurchaseAddressController::class, 'update'])
        ->name('purchase.address.update');

    // 購入確定
    Route::post('/purchase/{product}', [PurchasesController::class, 'store'])
        ->name('purchase.store');
});

// PG08 出品
Route::get('/sell', [SellController::class, 'create'])->name('sell.create');
Route::post('/sell', [SellController::class, 'create'])->name('sell.store');

Route::middleware('auth')->group(function () {
    // PG09 マイページ（トップ）
    Route::get('/mypage', [MyPagesController::class, 'index'])
        ->name('mypage.index');

    // PG10 プロフィール編集（設定）
    Route::get('/mypage/profile', [ProfilesController::class, 'profile'])
        ->name('mypage.profile');
    Route::post('/mypage/profile', [ProfilesController::class, 'update'])
        ->name('mypage.profile.update');
});

// コメント投稿（PG05内）
Route::post('/item/{item}/comment', [CommentsController::class, 'store'])
    ->name('comments.store');

// いいね追加・解除（PG05内）
Route::post('/item/{item}/like', [LikesController::class, 'store'])
    ->name('likes.store');

Route::delete('/item/{item}/like', [LikesController::class, 'destroy'])
    ->name('likes.destroy');
