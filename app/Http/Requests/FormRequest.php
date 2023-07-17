<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest as BaseFormRequest;

class FormRequest extends BaseFormRequest
{
    // 是否开启验证
    public function authorize()
    {
        return true;
    }
}
