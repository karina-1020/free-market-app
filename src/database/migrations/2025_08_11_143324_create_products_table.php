<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'products',
            function (Blueprint $table) {
                $table->id();
                $table->foreignId('user_id')->constrained()->onDelete('cascade'); // 出品者
                $table->foreignId('category_id')->constrained()->onDelete('cascade'); // カテゴリ
                $table->string('name');          // 商品名
                $table->integer('price');        // 価格
                $table->string('brand')->nullable(); // ブランド（なしの場合もある）
                $table->text('description')->nullable(); // 商品説明
                $table->string('img_url');       // 画像URL
                $table->string('condition');     // コンディション
                $table->string('status')->default('for_sale'); // 状態 (for_sale / sold)
                $table->timestamps();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
