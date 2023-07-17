<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AuthController;

/****************************** 无需登录 ******************************/
// 登录
Route::post('login', [AuthController::class, 'login']);
/****************************** 需要登录 ******************************/
Route::middleware('auth:sanctum')->group(function () {
    // 当前登录账号
    Route::controller(AuthController::class)->group(function () {
        // 获取登录账号信息
        Route::get('me', 'me');
        // 退出
        Route::post('logout', 'logout');
    });
});
