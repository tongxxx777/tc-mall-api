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

            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('product_sku_id')->comment('商品 SKU');
            $table->unsignedInteger('amount')->comment('商品数量');

            $table->string('no')->unique()->comment('订单号');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->text('address');
            $table->decimal('total_amount', 10, 2);
            $table->text('remark')->nullable();
            $table->dateTime('paid_at')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('payment_no')->nullable();
            $table->string('refund_status');
            $table->string('refund_no')->unique()->nullable();
            $table->boolean('closed')->default(false);
            $table->boolean('reviewed')->default(false);
            $table->string('ship_status');
            $table->text('ship_data')->nullable();
            $table->text('extra')->nullable();

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
