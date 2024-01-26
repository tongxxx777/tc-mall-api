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
        Schema::create('banners', function (Blueprint $table) {
            $table->id();

            $table->string('name')->comment('名称');
            $table->unsignedBigInteger('category_id')->comment('所属分类');
            $table->string('image')->comment('图片');

            $table->timestamps();
            $table->softDeletes();
        });
        DB::statement("ALTER TABLE `banners` comment '轮播图'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banners');
    }
};
