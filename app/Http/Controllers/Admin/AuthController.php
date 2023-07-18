<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * 登录
     *
     * @Author tongfei
     * @DateTime 2023-07-17
     * @param Request $request
     * @return json
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        if (!$token = Auth::claims(['guard' => Auth::getDefaultDriver()])->attempt($credentials)) {
            return $this->fail('登录失败:用户名或密码有误');
        }
        return $this->success(['token' => 'Bearer ' . $token], '登录成功');
    }

    /**
     * 获取登录账号信息
     *
     * @Author tongfei
     * @DateTime 2023-07-17
     * @return json
     */
    public function me(Request $request)
    {
        $admin = $request->user();
        return $this->success([
            'id' => $admin->id,
            'username' => $admin->username,
            'name' => $admin->username,
        ]);
    }

    /**
     * 退出
     *
     * @Author tongfei
     * @DateTime 2023-07-17
     * @return json
     */
    public function logout()
    {
        auth(Auth::getDefaultDriver())->logout(true);
        return $this->success([], '退出成功...');
    }
}
