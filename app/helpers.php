<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;

if (!function_exists('isProduction')) {
    /**
     * 判断是否为正式环境
     *
     * @Author tongfei
     * @DateTime 2023-11-16
     * @return boolean
     */
    function isProduction()
    {
        return (App::environment('product')) ? true : false;
    }
}

if (!function_exists('recordCommonError')) {
    /**
     * 记录报错
     *
     * @Author tongfei
     * @DateTime 2023-11-16
     * @param [string] $message
     * @param [Throwable] $th
     * @param array $extras 额外参数
     */
    function recordCommonError($message, $th, $extras = [])
    {
        $errors = [
            'err_msg' => $th->getMessage() ?? '',
            'file' => $th->getFile() ?? '',
            'line' => $th->getLine() ?? ''
        ];
        Log::channel('common_err')->info($message, array_merge($errors, $extras));
    }
}

if (!function_exists('compareData')) {
    /**
     * 比对数据
     * 使用场景:表单验证 和 API资源
     *
     * @Author tongfei
     * @DateTime 2023-11-16
     * @param [array] $original  原数据
     * @param [array] $commons   公用数据
     * @return array
     */
    function compareData($original, $commons)
    {
        foreach ($original as $key => $value) {
            // 覆写|新增
            if (!is_numeric($key)) {
                $data[$key] = $value;
            } else {
                // 判断是否定义了通用数据 如果已定义则复用
                if (array_key_exists($value, $commons)) {
                    $data[$value] = $commons[$value];
                }
            }
        }
        return $data ?? [];
    }
}
