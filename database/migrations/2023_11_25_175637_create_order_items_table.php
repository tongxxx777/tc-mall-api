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
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('order_id')->comment('所属订单');
            $table->unsignedBigInteger('product_id')->comment('对应商品');
            $table->unsignedBigInteger('product_sku_id')->comment('对应商品 SKU ID');
            $table->unsignedInteger('amount')->comment('数量');
            $table->decimal('price', 10, 2)->comment('单价');

            $table->timestamps();
            $table->softDeletes();
        });
        DB::statement("ALTER TABLE `order_items` comment '订单-商品'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
