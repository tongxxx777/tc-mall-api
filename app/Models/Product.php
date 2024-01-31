<?php

namespace App\Models;

class Product extends Model
{
    /**
     * 关联分类(一对多[反向/属于])
     * 一个商品只能属于一个分类
     *
     * @Author 佟飞
     * @DateTime 2024-01-31
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

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
