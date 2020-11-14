<?php

namespace app\middlewares;

use think\facade\Request;
use Closure;

/**
 * 参数签名验证中间件
 * Class ParamSignMiddleware
 * @package app\middlewares
 */
class ParamSignMiddleware
{

    /**
     * 参数签名校验
     * @param Closure $next
     * @param $request
     * @return mixed 返回验证结果（失败 结束请求，成功 放行）
     * @var string $timestamp 时间戳
     * @var string $sign 参数签名
     * @author hangwei
     * @note 规则: sign不参与验签，签名有效期为1分钟
     */
    public function handle($request, \Closure $next)
    {
        return $next($request); // 注释本条代码即可开启验证
        $returnJson = json(['code' => 10000, 'msg' => '参数签名无效，非法请求', 'data' => null, 'method' => Request::method(), 'url' => Request::baseUrl()]);
        $params = request()->param();
        $sign = $params['sign'];
        $timestamp = $params['timestamp'];
        $params = self::_getSortParams($params);
        if ($sign && time() - $timestamp <= 80) { // 签名1分钟失效(20秒放宽期限)
            $SecretKey = 'f7b0bc22763b1728'; // 密钥
            $checkSign = strtoupper(md5(md5($params . $SecretKey) . 'kfzx'));
            return $sign === $checkSign ? $next($request) : $returnJson;
        } else {
            return $returnJson;
        }
    }

    /**
     * 参数排序
     * @param array $param
     * @return string
     * @author hangwei
     */
    private static function _getSortParams($param = [])
    {
        unset($param['sign']);
        ksort($param);
        $signstr = '';
        if (is_array($param)) {
            foreach ($param as $key => $value) {
                if ($value == '') continue;
                $signstr .= $key . $value;
            }
        }
        return $signstr;
    }
}
