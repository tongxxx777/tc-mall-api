<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Models\Banner;
use App\Models\Product;
use App\Models\Category;

class IndexController extends Controller
{
    /**
     * 首页
     *
     * @Author 佟飞
     * @DateTime 2024-01-31
     * @return json
     */
    public function index()
    {
        // 获取分类
        $categories = Category::where('level', 1)
            ->select('id', 'name', 'icon')
            ->orderByDesc('sort')
            ->limit(8)
            ->get();
        // 获取轮播图
        $banners = Banner::select('id', 'name', 'image')
            ->orderByDesc('sort')
            ->get();
        // 获取热销商品
        $products = Product::where('is_on_sale', 1)
            ->select('id', 'name', 'description', 'cover', 'price', 'sold_count')
            ->orderByDesc('sold_count')
            ->limit(10)
            ->get();
        return $this->success([
            'categories' => $categories,
            'banners' => $banners,
            'products' => $products,
        ]);
    }
}
