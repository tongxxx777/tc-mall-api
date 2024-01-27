<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Product;
use App\Models\ProductSku;
use App\Models\UserAddress;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 生成超管账号
        $this->call([AdminSeeder::class]);
        // 生成默认轮播图
        $this->call([BannerSeeder::class]);
        // 生成默认分类
        $this->call([CategorySeeder::class]);
        // 创建用户
        $users = User::factory(10)->create();
        foreach ($users as $user) {
            // 创建用户-地址
            UserAddress::factory(3)->create(['user_id' => $user->id]);
        }
        // 创建商品
        $products = Product::factory(30)->create();
        foreach ($products as $product) {
            // 创建商品SKU
            $skus = ProductSku::factory(3)->create(['product_id' => $product->id]);
            // 找出价格最低的SKU价格,把商品价格设置为该价格
            $product->update(['price' => $skus->min('price')]);
        }
    }
}
