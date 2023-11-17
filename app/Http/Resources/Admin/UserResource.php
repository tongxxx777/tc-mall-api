<?php

namespace App\Http\Resources\Admin;

use App\Http\Resources\JsonResource;

class UserResource extends JsonResource
{
    public $commons = [];

    public function __construct($request)
    {
        $this->commons = [
            'id' => $request->id,
            'username' => $request->username,
            'name' => $request->name,
            'created_at' => $request->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $request->created_at->format('Y-m-d H:i:s'),
        ];
        return parent::__construct($request);
    }

    /**
     * 获取登录账号信息
     *
     * @Author tongfei
     * @DateTime 2023-11-16
     */
    public function me()
    {
        return ['id', 'username', 'name'];
    }

    /**
     * 列表
     *
     * @Author tongfei
     * @DateTime 2023-11-16
     */
    public function index()
    {
        return ['id', 'username', 'name', 'created_at', 'updated_at'];
    }

    /**
     * 详情
     *
     * @Author tongfei
     * @DateTime 2023-11-16
     */
    public function show()
    {
        return ['id', 'username', 'name', 'created_at', 'updated_at'];
    }
}
