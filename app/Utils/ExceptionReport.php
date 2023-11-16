<?php

namespace App\Utils;

use Throwable;
use App\Utils\ApiResponse;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Auth\Access\AuthorizationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;

class ExceptionReport
{
    use ApiResponse;

    private $report;
    private $reports = [
        NotFoundHttpException::class => ['没有找到该页面', Response::HTTP_NOT_FOUND],
        MethodNotAllowedHttpException::class => ['访问方式不正确', REsponse::HTTP_METHOD_NOT_ALLOWED],
        AuthorizationException::class => ['无操作权限', REsponse::HTTP_FORBIDDEN]
    ];

    /**
     * 拦截异常
     *
     * @Author tongfei
     * @DateTime 2023-11-16
     * @param Throwable $th
     * @return boolean
     */
    public function intercept(Throwable $th)
    {
        foreach (array_keys($this->reports) as $report) {
            if ($th instanceof $report) {
                $this->report = $report;
                return true;
            }
        }
        return false;
    }

    /**
     * 报告异常
     *
     * @Author tongfei
     * @DateTime 2023-11-16
     * @return json
     */
    public function report()
    {
        $message = $this->reports[$this->report];
        return $this->fail($message[0], $message[1]);
    }

    /**
     * 报告异常(关闭 DEBUG)
     *
     * @Author tongfei
     * @DateTime 2023-11-16
     * @return json
     */
    public function closeDebugReport()
    {
        return $this->fail('服务器错误', Response::HTTP_INTERNAL_SERVER_ERROR);
    }
}
