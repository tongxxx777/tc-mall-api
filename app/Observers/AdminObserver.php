<?php

namespace App\Observers;

use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminObserver
{
    /**
     * 创建前
     *
     * @Author tongfei
     * @DateTime 2023-11-16
     */
    public function creating(Admin $admin)
    {
        // 未填写密码时 设置默认密码
        if (empty($admin->password)) {
            $admin->password = bcrypt(config('api.default_password'));
        }
    }

    /**
     * 更新前
     *
     * @Author tongfei
     * @DateTime 2023-11-16
     */
    public function updating(Admin $admin)
    {
        if ($admin->isDirty('password')) {
            $admin->password = bcrypt($admin->password);
        }
    }
}
