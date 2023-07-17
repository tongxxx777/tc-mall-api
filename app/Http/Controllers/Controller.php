<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use App\Utils\ApiResponse;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    // 通用 API 响应消息
    use ApiResponse;
}
