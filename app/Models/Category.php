<?php

namespace App\Models;

class Category extends Model
{
    /**
     * 关联商品(一对多)
     * 一个分类品拥有多个商品
     *
     * @Author 佟飞
     * @DateTime 2024-01-31
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
