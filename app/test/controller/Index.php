<?php

namespace app\test\controller;

use app\BaseController;
use app\utils\CalculationUtil;
use app\utils\DingxiangUtil;
use app\utils\EncryptUtil;
use app\utils\SendUtil;

/**
 * 快速测试
 * Class Index
 * @package app\test\controller
 */
class Index extends BaseController
{

    /**
     * 快速测试
     */
    public function index()
    {
//        $result = SendUtil::sendCodeBySMS(13628731731, 123456);
//        $result = SendUtil::sendCodeBySMS('13628731731', '100860');
//        $result = SendUtil::sendCodeBySMSFromDCloud('13628731731', '100860');
        return returnJson($result);
    }

    /**
     * 加密解密
     */
    public function getCode()
    {
        $string = '';
        return returnJson(EncryptUtil::coding($string, 'ENCODE', '$FD18#5@2Lo74%-(&', 0));
    }

    public function demo()
    {
        $captchaResult = DingxiangUtil::Captcha(10086);
        if (!$captchaResult->result) return returnJson(null, 10008, '触发风控机制，请求已拦截');
    }
}
