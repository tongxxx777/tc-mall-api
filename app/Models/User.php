<?php

namespace App\Models;

use App\Utils\JwtTrait;
use Illuminate\Auth\Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Model implements JWTSubject, AuthenticatableContract
{
    use JwtTrait, Authenticatable;

    const DEFAULT_ID = 1;

    /**
     * 关联地址(一对多)
     * 一个用户拥有多个地址
     *
     * @Author 佟飞
     * @DateTime 2023-11-20
     */
    public function addresses(): HasMany
    {
        return $this->hasMany(UserAddress::class);
    }

    /**
     * 关联购物车商品
     *
     * @Author 佟飞
     * @DateTime 2023-11-25
     */
    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }
}
