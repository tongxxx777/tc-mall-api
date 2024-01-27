<?php

namespace Database\Seeders;

use App\Models\Banner;
use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Banner::truncate();
        $data = [
            ['name' => '轮播图-1', 'image' => 'banners/images/1.png'],
            ['name' => '轮播图-2', 'image' => 'banners/images/2.png'],
            ['name' => '轮播图-3', 'image' => 'banners/images/3.png'],
        ];
        foreach ($data as $single) {
            Banner::create($single);
        }
    }
}
