<?php

namespace app\api\validate\auth\H5;

use think\Validate;

class sendSMSCodeByAliyun extends Validate
{
    protected $rule = [
        'phone' => 'require|mobile',
        'captcha_token' => 'require'
    ];

    protected $message = [
        'phone.require' => '手机号码不能为空',
        'phone.mobile' => '手机号码格式不正确',
        'captcha_token.require' => '验证码Token不能为空'
    ];
}