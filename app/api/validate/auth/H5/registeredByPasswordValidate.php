<?php

namespace app\api\validate\auth\H5;

use think\Validate;

class registeredByPasswordValidate extends Validate
{
    protected $rule = [
        'username' => 'require|min:6|max:20',
        'password' => 'require|min:6|max:20',
        'code' => 'require|length:6',
        'phone' => 'require|mobile'
    ];

    protected $message = [
        'username.require' => '用户名不能为空',
        'username.min' => '用户名最少不能低于6个字符',
        'username.max' => '用户名最多不能超过20个字符',
        'password.require' => '密码不能为空',
        'password.min' => '密码最少不能低于6个字符',
        'password.max' => '密码最多不能超过20个字符',
        'code.require' => '邀请码不能为空',
        'code.length' => '邀请码必须为6个字符',
        'phone.require' => '手机号码不能为空',
        'phone.mobile' => '手机号码格式不正确'
    ];
}