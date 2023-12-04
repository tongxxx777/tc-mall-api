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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id')->comment('所属用户');
            $table->unsignedBigInteger('product_sku_id')->comment('商品 SKU');
            $table->unsignedInteger('amount')->comment('商品数量');

            $table->timestamps();
            $table->softDeletes();
        });
        DB::statement("ALTER TABLE `orders` comment '订单'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
