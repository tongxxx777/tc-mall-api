<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::truncate();
        // 创建初始账号
        Admin::create([
            'id' => Admin::DEFAULT_ID,
            'username' => 'admin',
            'password' => bcrypt(config('api.default_password')),
            'name' => '超级管理员'
        ]);
    }
}
