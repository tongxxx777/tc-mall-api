<?php

namespace App\Utils;

use Symfony\Component\HttpFoundation\Response;

trait ApiResponse
{
    /**
     * 成功消息
     *
     * @Author tongfei
     * @DateTime 2023-07-14
     * @param array $data 响应数据
     * @param string $message 响应消息
     * @param int $code 响应码
     * @return json
     */
    public function success($data = [], $message = '操作成功', $code = Response::HTTP_OK)
    {
        $data = ['code' => $code, 'data' => $data, 'message' => $message];
        return $this->responseJson($data);
    }

    /**
     * 失败消息
     *
     * @Author tongfei
     * @DateTime 2023-07-14
     * @param string $message 响应消息
     * @param int $code 响应码
     * @return json
     */
    public function fail($message = '操作失败', $code = Response::HTTP_BAD_REQUEST)
    {
        $data = ['code' => $code, 'message' => $message];
        return $this->responseJson($data);
    }

    /**
     * 响应消息
     *
     * @Author tongfei
     * @DateTime 2023-07-14
     * @param array $data 相应数据
     */
    public function responseJson($data)
    {
        return response()->json($data, Response::HTTP_OK);
    }
}
