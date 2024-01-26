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
        Schema::create('product_skus', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('product_id')->comment('所属商品');
            $table->string('name')->comment('SKU 名称');
            $table->text('description')->comment('SKU 描述');
            $table->unsignedDecimal('price', 10, 2)->comment('SKU 价格');
            $table->unsignedInteger('stock')->comment('库存');

            $table->timestamps();
            $table->softDeletes();
        });
        DB::statement("ALTER TABLE `product_skus` comment '商品-SKU'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_skus');
    }
};
