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

            $table->string('no')->unique()->comment('订单号');
            $table->unsignedBigInteger('user_id')->comment('所属用户');
            $table->text('address')->comment('收货地址');
            $table->decimal('total_amount', 10, 2)->comment('订单总金额');
            $table->dateTime('paid_at')->nullable();
            $table->unsignedTinyInteger('payment_method')->nullable()->comment('支付方式');
            $table->string('payment_no')->nullable()->comment('支付平台订单号');
            $table->boolean('closed')->default(0)->comment('订单是否已关闭');
            $table->unsignedTinyInteger('ship_status')->default(1)->comment('物流状态');
            $table->text('ship_data')->nullable()->comment('物流数据');

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
