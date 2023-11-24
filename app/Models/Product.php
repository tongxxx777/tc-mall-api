<?php

namespace App\Models;

class Product extends Model
{
    /**
     * 关联SKU(一对多)
     * 一个商品拥有多个SKU
     *
     * @Author 佟飞
     * @DateTime 2023-11-24
     */
    public function skus()
    {
        return $this->hasMany(ProductSku::class);
    }
}
