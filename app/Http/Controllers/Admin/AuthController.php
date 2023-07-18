<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
        $admin = Admin::where('username', $credentials['username'])->first();
        if (!$admin || !Hash::check($credentials['password'], $admin->password)) {
            return $this->fail('登录失败:用户名或密码有误');
        }
        if (!$token = Auth::claims(['guard' => Auth::getDefaultDriver()])->login($admin)) {
            return $this->error('登录失败,请联系管理员');
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
        auth(Auth::getDefaultDriver())->logout();
        return $this->success([], '退出成功...');
    }
}
