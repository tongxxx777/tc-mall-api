<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserAddress extends Model
{
    /**
     * 关联用户(一对多[反向/属于])
     * 一个地址只能属于一个用户
     *
     * @Author 佟飞
     * @DateTime 2023-11-20
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * 获取全地址
     *
     * @Author 佟飞
     * @DateTime 2023-11-20
     * @return string
     */
    public function getFullAddressAttribute()
    {
        return "{$this->province}{$this->city}{$this->district}{$this->address}";
    }
}
