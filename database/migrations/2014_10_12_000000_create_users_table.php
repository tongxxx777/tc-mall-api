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
        Schema::create('users', function (Blueprint $table) {
            $table->id();

            $table->string('username', 32)->comment('用户名');
            $table->string('password', 100)->comment('密码');
            $table->string('name', 32)->comment('姓名');

            $table->timestamps();
            $table->softDeletes();
        });
        DB::statement("ALTER TABLE `users` comment '用户'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
