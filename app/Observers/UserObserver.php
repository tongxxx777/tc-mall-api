<?php

namespace App\Observers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserObserver
{
    /**
     * 更新前
     *
     * @Author tongfei
     * @DateTime 2023-11-16
     */
    public function updating(User $user)
    {
        if ($user->password != $user->getOriginal('password')) {
            $user->password = bcrypt($user->password);
        }
    }
}
