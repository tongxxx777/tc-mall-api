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
            ['id' => 1, 'pid' => 0, 'name' => '手机', 'icon' => 'categories/icons/phone.png'],
            ['id' => 2, 'pid' => 1, 'name' => '5G手机', 'icon' => 'categories/icons/phone.png'],
            ['id' => 3, 'pid' => 1, 'name' => '游戏手机', 'icon' => 'categories/icons/phone.png'],
            ['id' => 4, 'pid' => 1, 'name' => '拍照手机', 'icon' => 'categories/icons/phone.png'],

            ['id' => 5, 'pid' => 0, 'name' => '电脑', 'icon' => 'categories/icons/computer.png'],
            ['id' => 6, 'pid' => 5, 'name' => '笔记本', 'icon' => 'categories/icons/computer.png'],
            ['id' => 7, 'pid' => 5, 'name' => '游戏本', 'icon' => 'categories/icons/computer.png'],
            ['id' => 8, 'pid' => 5, 'name' => '台式机', 'icon' => 'categories/icons/computer.png'],
            ['id' => 9, 'pid' => 5, 'name' => '平板电脑', 'icon' => 'categories/icons/computer.png'],

            ['id' => 10, 'pid' => 0, 'name' => '电视', 'icon' => 'categories/icons/tv.png'],
            ['id' => 11, 'pid' => 10, 'name' => '游戏电视', 'icon' => 'categories/icons/tv.png'],
            ['id' => 12, 'pid' => 10, 'name' => 'K歌电视', 'icon' => 'categories/icons/tv.png'],
            ['id' => 13, 'pid' => 10, 'name' => '会议电视', 'icon' => 'categories/icons/tv.png'],

            ['id' => 14, 'pid' => 0, 'name' => '家电', 'icon' => 'categories/icons/appliance.png'],
            ['id' => 15, 'pid' => 14, 'name' => '空调', 'icon' => 'categories/icons/appliance.png'],
            ['id' => 16, 'pid' => 14, 'name' => '洗衣机', 'icon' => 'categories/icons/appliance.png'],
            ['id' => 17, 'pid' => 14, 'name' => '冰箱', 'icon' => 'categories/icons/appliance.png'],

            ['id' => 18, 'pid' => 0, 'name' => '耳机', 'icon' => 'categories/icons/headset.png'],
            ['id' => 19, 'pid' => 18, 'name' => '电竞耳机', 'icon' => 'categories/icons/headset.png'],
            ['id' => 20, 'pid' => 18, 'name' => 'HIFI耳机', 'icon' => 'categories/icons/headset.png'],
            ['id' => 21, 'pid' => 18, 'name' => '降噪耳机', 'icon' => 'categories/icons/headset.png'],

            ['id' => 22, 'pid' => 0, 'name' => '路由器', 'icon' => 'categories/icons/router.png'],
            ['id' => 23, 'pid' => 22, 'name' => 'WIFI6', 'icon' => 'categories/icons/router.png'],

            ['id' => 24, 'pid' => 0, 'name' => '其它', 'icon' => 'categories/icons/other.png'],
            ['id' => 25, 'pid' => 24, 'name' => '耗材', 'icon' => 'categories/icons/other.png'],
            ['id' => 26, 'pid' => 24, 'name' => '配件', 'icon' => 'categories/icons/other.png'],
        ];
        foreach ($data as $single) {
            Category::create($single);
        }
    }
}
