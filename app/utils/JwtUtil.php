<?php

// +----------------------------------------------------------------------
// | JWT接口认证工具
// +----------------------------------------------------------------------

namespace app\utils;

use \Firebase\JWT\JWT;

class JwtUtil
{

    /**
     * 颁发JWT
     * @param integer $uid 用户ID
     * @author hangwei
     * @return mixed 返回JWT信息
     */
    public static function encode($uid)
    {
        // 公共JWT_DATA
        $publicData = [
            "iss" => config('jwt.iss'), // 签发者
            'iat' => config('jwt.iat'), // 签发时间
            'uid' => $uid, // 用户ID
        ];
        // TOKEN
        $jwtData = $publicData;
        $key = config('jwt.key'); // JWT密钥
        $jwtData['nbf'] = config('jwt.nbf'); // TOKEN开始生效时间
        $jwtData['exp'] = config('jwt.exp'); // TOKEN过期时间
        $jwtToken = JWT::encode($jwtData, $key); // TOKEN
        return ['access_token' => $jwtToken, 'expires_in' => config('jwt.exp') - 10 * 60];
    }

    /**
     * 验证Token
     * @param string $token Token
     * @author hangwei
     * @return mixed 返回JWT解析后的信息 | 验证失败信息
     */
    public static function decode($token)
    {
        try {
            $key = config('jwt.key');
            JWT::$leeway = 60; // 当前时间减去60秒，留点余地
            return ['code' => 0, 'data' => JWT::decode($token, $key, array('HS256'))]; // HS256方式，这里要和token签发的时候对应
        } catch (\Firebase\JWT\SignatureInvalidException $e) {
            // 无效Token
            return ['code' => 10001, 'msg' => '无效Token'];
        } catch (\Firebase\JWT\BeforeValidException $e) {
            // Token在某个时间点之后才能用
            return ['code' => 10002, 'msg' => 'Token不在使用时间区间'];
        } catch (\Firebase\JWT\ExpiredException $e) {
            // Token已过期
            return ['code' => 10003, 'msg' => 'Token已过期'];
        } catch (\Exception $e) {
            // 其他错误
            return ['code' => 19999, 'msg' => '未知异常'];
        }
    }
}
