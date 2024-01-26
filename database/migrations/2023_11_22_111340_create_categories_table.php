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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();

            $table->string('title')->comment('名称');
            $table->unsignedBigInteger('parent_id')->default(0)->comment('父级');
            $table->unsignedTinyInteger('level')->default(1)->comment('层级');
            $table->unsignedInteger('sort')->default(0)->comment('顺序');

            $table->timestamps();
            $table->softDeletes();
        });
        DB::statement("ALTER TABLE `banners` comment '分类'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
