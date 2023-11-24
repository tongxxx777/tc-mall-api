<?php

namespace App\Models;

class ProductSku extends Model
{
    /**
     * 关联商品(一对多[反向/属于])
     * 一个SKU只能属于一个商品
     *
     * @Author 佟飞
     * @DateTime 2023-11-24
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
