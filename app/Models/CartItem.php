<?php

namespace App\Models;

class CartItem extends Model
{
    /**
     * 关联用户(一对多[反向/属于])
     * 购物车物品只能属于一个用户
     *
     * @Author 佟飞
     * @DateTime 2023-11-20
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * 关联商品SKU(一对多[反向/属于])
     * 购物车物品只能属于一个商品SKU
     *
     * @Author 佟飞
     * @DateTime 2023-11-20
     */
    public function productSku()
    {
        return $this->belongsTo(ProductSku::class);
    }
}
