<?php

namespace app\api\validate\auth\H5;

use think\Validate;

class sendEmailCodeValidate extends Validate
{
    protected $rule = [
        'email' => 'require|email',
        'captcha_token' => 'require'
    ];

    protected $message = [
        'email.require' => '电子邮箱不能为空',
        'email.email' => '电子邮箱格式不正确',
        'captcha_token.require' => '验证码Token不能为空'
    ];
}