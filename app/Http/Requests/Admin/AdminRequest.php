<?php

namespace App\Http\Requests\Admin;

use App\Models\Admin;
use App\Http\Requests\FormRequest;

class AdminRequest extends FormRequest
{
    public $commons = [];

    public function __construct()
    {
        $this->commons = [
            'username' => 'between:6,20|alpha_dash:ascii',
            'password' => 'min:6',
            'name' => 'between:2,20|regex:/^[\x{4e00}-\x{9fa5}A-Za-z0-9_\-]+$/u',
        ];
        return parent::__construct();
    }

    /**
     * 创建
     *
     * @Author tongfei
     * @DateTime 2023-11-16
     */
    public function store()
    {
        $tableName = (new Admin)->getTable();
        $uniques = implode(',', [$tableName, 'username', 'NULL', 'id', 'deleted_at', 'NULL']);
        return [
            'username' => 'required|' . $this->commons['username'] . '|unique:' . $uniques,
            'name' => 'required|' . $this->commons['name']
        ];
    }

    /**
     * 更新
     *
     * @Author tongfei
     * @DateTime 2023-11-16
     */
    public function update()
    {
        return [
            'password' => 'filled|' . $this->commons['password'],
            'name' => 'required|' . $this->commons['name']
        ];
    }

    /**
     * 字段属性
     *
     * @Author tongfei
     * @DateTime 2023-11-16
     * @return array
     */
    public function attributes()
    {
        return [
            'username' => '用户名',
            'password' => '密码',
            'name' => '姓名',
        ];
    }

    public function messages()
    {
        return [
            'name.regex' => '姓名 只能由中文、字母、数字、短划线(-)和下划线(_)组成.'
        ];
    }
}
