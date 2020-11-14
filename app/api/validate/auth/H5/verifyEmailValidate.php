<?php

namespace app\api\validate\auth\H5;

use think\Validate;

class verifyEmailValidate extends Validate
{
    protected $rule = [
        'token' => 'require|min:33|max:37',
    ];

    protected $message = [
        'token.require' => 'Token不能为空',
        'token.min' => 'Token最少不能低于33个字符',
        'token.max' => 'Token最多不能超过37个字符'
    ];
}