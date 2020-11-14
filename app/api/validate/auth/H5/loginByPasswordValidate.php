<?php

namespace app\api\validate\auth\H5;

use think\Validate;

class loginByPasswordValidate extends Validate
{
    protected $rule = [
        'username' => 'require|min:6|max:20',
        'password' => 'require|min:6|max:20',
        'captcha_token' => 'require'
    ];

    protected $message = [
        'username.require' => '用户名不能为空',
        'username.min' => '用户名最少不能低于6个字符',
        'username.max' => '用户名最多不能超过20个字符',
        'password.require' => '密码不能为空',
        'password.min' => '密码最少不能低于6个字符',
        'password.max' => '密码最多不能超过20个字符',
        'captcha_token.require' => '验证码Token不能为空'
    ];
}