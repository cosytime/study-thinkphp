<?php

namespace app\middlewares;

use app\utils\JwtUtil;
use Closure;
use think\facade\Request;

/**
 * Api应用授权信息验证中间件
 * Class AuthApiMiddleware
 * @package app\middlewares
 */
class AuthApiMiddleware
{
    /**
     * Token有效性验证并解析用户ID
     * @param object $request 请求
     * @param Closure $next 匿名函数 放行
     * @return mixed 放行 | 拒绝并返回验证失败信息
     * @author hangwei
     */
    public function handle($request, Closure $next)
    {
        // $request->uid = 11;
        // return $next($request); // 注释2条代码即可开启验证
        $token = Request::header('authorization'); // 从请求头中获取Token
        if (!$token) return json(['code' => 10004, 'msg' => '授权Token信息不存在', 'data' => null, 'url' => Request::baseUrl()]);
        $info = JwtUtil::decode($token); // 验证并解析JWT
        if ($info['code'] != 0) return json(['code' => $info['code'], 'msg' => $info['msg'], 'data' => null, 'url' => Request::baseUrl()]);
        $request->uid = $info['data']->uid;
        return $next($request);
    }
}