<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::truncate();
        $data = [
            ['id' => 1, 'pid' => 0, 'level' => 1, 'name' => '手机', 'icon' => 'categories/icons/1.png'],
            ['id' => 2, 'pid' => 1, 'level' => 2, 'name' => '5G手机', 'icon' => 'categories/icons/1-1.png'],
            ['id' => 3, 'pid' => 1, 'level' => 2, 'name' => '游戏手机', 'icon' => 'categories/icons/1-2.png'],
            ['id' => 4, 'pid' => 1, 'level' => 2, 'name' => '拍照手机', 'icon' => 'categories/icons/1-3.png'],

            ['id' => 5, 'pid' => 0, 'level' => 1, 'name' => '电脑', 'icon' => 'categories/icons/2.png'],
            ['id' => 6, 'pid' => 5, 'level' => 2, 'name' => '笔记本', 'icon' => 'categories/icons/2-1.png'],
            ['id' => 7, 'pid' => 5, 'level' => 2, 'name' => '游戏本', 'icon' => 'categories/icons/2-2.png'],
            ['id' => 8, 'pid' => 5, 'level' => 2, 'name' => '台式机', 'icon' => 'categories/icons/2-3.png'],
            ['id' => 9, 'pid' => 5, 'level' => 2, 'name' => '平板电脑', 'icon' => 'categories/icons/2-4.png'],

            ['id' => 10, 'pid' => 0, 'level' => 1, 'name' => '电视', 'icon' => 'categories/icons/3.png'],
            ['id' => 11, 'pid' => 10, 'level' => 2, 'name' => '游戏电视', 'icon' => 'categories/icons/3-1.png'],
            ['id' => 12, 'pid' => 10, 'level' => 2, 'name' => 'K歌电视', 'icon' => 'categories/icons/3-2.png'],
            ['id' => 13, 'pid' => 10, 'level' => 2, 'name' => '会议电视', 'icon' => 'categories/icons/3-3.png'],

            ['id' => 14, 'pid' => 0, 'level' => 1,  'name' => '家电', 'icon' => 'categories/icons/4.png'],
            ['id' => 15, 'pid' => 14, 'level' => 2, 'name' => '空调', 'icon' => 'categories/icons/4-1.png'],
            ['id' => 16, 'pid' => 14, 'level' => 2, 'name' => '洗衣机', 'icon' => 'categories/icons/4-2.png'],
            ['id' => 17, 'pid' => 14, 'level' => 2, 'name' => '冰箱', 'icon' => 'categories/icons/4-3.png'],

            ['id' => 18, 'pid' => 0, 'level' => 1, 'name' => '耳机', 'icon' => 'categories/icons/5.png'],
            ['id' => 19, 'pid' => 18, 'level' => 2, 'name' => '电竞耳机', 'icon' => 'categories/icons/5-1.png'],
            ['id' => 20, 'pid' => 18, 'level' => 2, 'name' => 'HIFI耳机', 'icon' => 'categories/icons/5-2.png'],
            ['id' => 21, 'pid' => 18, 'level' => 2, 'name' => '降噪耳机', 'icon' => 'categories/icons/5-3.png'],

            ['id' => 22, 'pid' => 0, 'level' => 1, 'name' => '路由器', 'icon' => 'categories/icons/6.png'],
            ['id' => 23, 'pid' => 22, 'level' => 2, 'name' => 'WIFI6', 'icon' => 'categories/icons/6-1.png'],

            ['id' => 24, 'pid' => 0, 'level' => 1, 'name' => '游戏机', 'icon' => 'categories/icons/7.png'],
            ['id' => 25, 'pid' => 24, 'level' => 2, 'name' => 'XBOX', 'icon' => 'categories/icons/7-1.png'],
            ['id' => 26, 'pid' => 24, 'level' => 2, 'name' => 'PS5', 'icon' => 'categories/icons/7-2.png'],

            ['id' => 27, 'pid' => 0, 'level' => 1, 'name' => '其它', 'icon' => 'categories/icons/8.png'],
            ['id' => 28, 'pid' => 24, 'level' => 2, 'name' => '耗材', 'icon' => 'categories/icons/8-1.png'],
            ['id' => 29, 'pid' => 24, 'level' => 2, 'name' => '配件', 'icon' => 'categories/icons/8-2.png'],
        ];
        foreach ($data as $single) {
            Category::create($single);
        }
    }
}
