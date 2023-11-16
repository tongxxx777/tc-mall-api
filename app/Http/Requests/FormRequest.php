<?php

namespace App\Http\Requests;

use App\Utils\ApiResponse;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest as BaseFormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class FormRequest extends BaseFormRequest
{
    use ApiResponse;

    /**
     * 是否开启验证
     *
     * @Author tongfei
     * @DateTime 2023-11-16
     */
    public function authorize()
    {
        return true;
    }

    /**
     * 覆写
     *
     * @Author tongfei
     * @DateTime 2023-11-16
     * @return array
     */
    public function rules()
    {
        // 获取路由动作名称
        $actionMethod = $this->route() ? $this->route()->getActionMethod() : '';
        // 获取验证规则(根据路由动作名称 寻找验证类中同名的验证方法并返回)
        // 未定义方法时 使用公用规则
        if (!method_exists($this, $actionMethod)) return $this->commons ?? [];
        $original = $this->container->call([$this, $actionMethod]);
        // 处理验证规则
        return compareData($original, $this->commons);
    }

    /**
     * 覆写 验证失败
     *
     * @Author tongfei
     * @DateTime 2023-11-16
     * @param Validator $validator
     */
    protected function failedValidation(Validator $validator)
    {
        throw (new HttpResponseException($this->fail($validator->errors(), 422)));
    }
}
