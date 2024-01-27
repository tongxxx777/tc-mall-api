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
            ['name' => '手机', 'icon' => 'categories/icons/phone.png'],
            ['name' => '电脑', 'icon' => 'categories/icons/computer.png'],
            ['name' => '电视', 'icon' => 'categories/icons/tv.png'],
            ['name' => '家电', 'icon' => 'categories/icons/appliance.png'],
            ['name' => '耳机', 'icon' => 'categories/icons/headset.png'],
            ['name' => '路由器', 'icon' => 'categories/icons/router.png'],
            ['name' => '其它', 'icon' => 'categories/icons/other.png'],
        ];
        foreach ($data as $single) {
            Category::create($single);
        }
    }
}
