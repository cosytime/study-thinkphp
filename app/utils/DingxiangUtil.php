<?php

// +----------------------------------------------------------------------
// | 顶象风控工具
// +----------------------------------------------------------------------

namespace app\utils;

use DingxiangSdk\CaptchaClient;
use DingxiangSdk\CtuClient;
use DingxiangSdk\model\CtuRequest;
use Throwable;

class DingxiangUtil
{

    /**
     * 验证顶象验证码Token有效性
     * @param string $token 验证码Token
     * @return mixed 校验结果（成功 True，失败 FALSE）
     * @throws Throwable
     */
    public static function Captcha($token)
    {
        $appId = ConfigUtil::getConfig('dingxiang:appid'); // 顶象风控AppId
        $appSecret = ConfigUtil::getConfig('dingxiang:app_secret'); // 顶象风控AppSecret
        $client = new CaptchaClient($appId, $appSecret);
        $client->setTimeOut(2); // 设置超时时间
        // $client->setCaptchaUrl("http://cap.dingxiang-inc.com/api/tokenVerify"); // 特殊情况需要额外指定服务器,可以在这个指定，默认情况下不需要设置
        return $client->verifyToken($token);
    }

    /**
     * 顶象风控结果验证
     * @param array $data 具体的业务参数
     * @return mixed 风控验证结果（ACCEPT 无风险 建议放过，REVIEW 风险不确定 需要进一步审核，REJECT 有风险 建议拒绝）
     * @throws Throwable
     */
    public function Ctu($data)
    {
        $url = "http://sec.dingxiang-inc.com/ctu/event.do";
        $appId = ConfigUtil::getConfig('dingxiang:appid'); // 顶象风控AppId
        $appSecret = ConfigUtil::getConfig('dingxiang:app_secret'); // 顶象风控AppSecret
        // 时区
        ini_set('date.timezone', 'Asia/Shanghai');
        // 构造请求参数
        $request = new CtuClient($url, $appId, $appSecret);
        $reqJsonString = json_encode($request, JSON_UNESCAPED_UNICODE);
        $ctuRequest = new CtuRequest();
        // $eventCode 事件code
        $ctuRequest->eventCode = "event_code";
        $ctuRequest->flag = "activity_" . time();
        $ctuRequest->data = $data;
        // 请求超时时间,单位秒
        $timeout = 2;
        // 调用风控引擎
        $responseData = $request->checkRisk($ctuRequest, $timeout);
        // 风险引擎返回结果
        $jsonResult = json_decode($responseData, true);
        // 根据不同风险做出相关处理
        return $jsonResult['result']["riskLevel"];
    }

}