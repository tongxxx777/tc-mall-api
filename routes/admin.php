<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{
    AuthController,
    UserController,
    AdminController,
    ProductController
};

/****************************** 无需登录 ******************************/
// 登录
Route::post('login', [AuthController::class, 'login']);
/****************************** 需要登录 ******************************/
Route::middleware('checkToken')->group(function () {
    // 当前登录账号
    Route::controller(AuthController::class)->group(function () {
        // 获取登录账号信息
        Route::get('me', 'me');
        // 退出
        Route::post('logout', 'logout');
    });
    // Banner

    // 分类

    // 商品
    Route::apiResource('products', ProductController::class);
    // 用户
    Route::apiResource('users', UserController::class)->except(['store']);
    /****************************** 系统 ******************************/
    // 管理员
    Route::apiResource('admins', AdminController::class);
    // 角色(v2版本加入)
    // 权限(v2版本加入)
    // 菜单(v2版本加入)
    // 操作日志(v2版本加入)
});
