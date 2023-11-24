<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->string('title')->comment('商品名称');
            $table->text('description')->comment('商品详情');
            $table->string('cover')->comment('封面图');
            $table->unsignedDecimal('price', 10, 2)->comment('最低价');
            $table->unsignedInteger('sold_count')->default(0)->comment('销量');
            $table->unsignedTinyInteger('is_on_sale')->default(0)->comment('是否上架');

            $table->timestamps();
            $table->softDeletes();
        });
        DB::statement("ALTER TABLE `products` comment '商品'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
