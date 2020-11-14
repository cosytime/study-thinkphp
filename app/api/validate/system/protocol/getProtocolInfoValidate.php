<?php

namespace app\api\validate\system\protocol;

use think\Validate;

class getProtocolInfoValidate extends Validate
{
    protected $rule = [
        'code' => 'require|alphaDash'
    ];

    protected $message = [
        'code.require' => '协议代码不能为空',
        'code.alphaDash' => '协议代码只能由为字母、数字、下划线及破折号组成'
    ];
}