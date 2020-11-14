<?php

namespace app\api\controller\v1\auth;

use app\BaseController;

/**
 * @title 微信授权、登录相关
 * @desc 微信授权、登录相关模块
 * Class Auth
 * @package app\api\controller\wechat
 */
class Auth extends BaseController
{
    /**
     * @title SayHello
     * @desc 微信授权、登录SayHello
     * @spec 无
     * @author hangwei
     * @method GET
     */
    public function index()
    {
        return ReturnJson('Api-WechatAuth!');
    }

    /**
     * @title 微信小程序登录
     * @desc 微信小程序登录接口
     * @author hangwei
     * @method POST
     */
    public function login()
    {
        return ReturnJson('微信小程序登录');
    }
}
