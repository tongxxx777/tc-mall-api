<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use App\Utils\ApiResponse;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;

class CheckToken extends BaseMiddleware
{
    use ApiResponse;

    public function handle(Request $request, Closure $next)
    {
        try {
            // 检查请求中携带令牌
            $this->checkForToken($request);
        } catch (\Throwable $th) {
            return $this->fail('未提供令牌', 401);
        }
        // 获取当前令牌
        $token = Auth::getToken();
        // 获取令牌的载荷信息
        $payload = Auth::manager()->getJWTProvider()->decode($token->get());
        // 判断是否为当前守卫的令牌
        $guard = Auth::getDefaultDriver();
        if (empty($payload['guard']) || $payload['guard'] != $guard) {
            return $this->fail('无效的令牌', 401);
        }
        try {
            // 检测用户的登录状态 如果正常则通过
            if ($this->auth->parseToken()->authenticate()) {
                return $next($request);
            }
            return $this->fail('未登录', 401);
        } catch (TokenExpiredException $e) {
            // 令牌过期异常
            try {
                // 刷新令牌并进行一次性登录
                $token = $this->auth->refresh();
                Auth::onceUsingId($this->auth->manager()->getPayloadFactory()->buildClaimsCollection()->toPlainArray()['sub']);
            } catch (JWTException $exception) {
                // 超过最大刷新时间 重新登录
                return $this->fail('令牌过期', 401);
            }
        } catch (TokenInvalidException $exception) {
            return $this->fail('令牌无效', 401);
        }
        return $this->setAuthenticationHeader($next($request), $token);
    }
}
