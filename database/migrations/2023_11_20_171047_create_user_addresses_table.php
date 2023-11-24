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
        Schema::create('user_addresses', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id')->comment('用户');
            $table->string('contact_name')->comment('收货人');
            $table->string('contact_phone')->comment('联系方式');
            $table->string('province')->comment('省');
            $table->string('city')->comment('市');
            $table->string('district')->comment('区');
            $table->string('address')->comment('详细地址');
            $table->unsignedTinyInteger('is_default')->default(0)->comment('是否为默认地址');

            $table->timestamps();
            $table->softDeletes();
        });
        DB::statement("ALTER TABLE `user_addresses` comment '用户-收货地址'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_addresses');
    }
};
