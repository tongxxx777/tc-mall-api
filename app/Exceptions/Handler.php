<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use App\Utils\ExceptionReport;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $th)
    {
        $reporter = new ExceptionReport();
        // 关闭 DEBUG 时不展示详细报错
        if (!env('APP_DEBUG')) {
            return $reporter->closeDebugReport();
        }
        // 常见异常自定义处理
        if ($reporter->intercept($th)) {
            return $reporter->report();
        }
        return parent::render($request, $th);
    }
}
