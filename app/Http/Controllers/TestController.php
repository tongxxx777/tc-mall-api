<?php

namespace App\Http\Controllers;

class TestController extends Controller
{
    public function index()
    {
        $data = ['foo' => 'bar'];
        return $this->success($data);
    }
}
