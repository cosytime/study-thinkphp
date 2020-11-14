<?php

namespace app\admin\validate\v1\system\User;

use think\Validate;

class deleteUserValidate extends Validate
{

    protected $rule = [
        'user_id' => 'require|array',
    ];

    protected $message = [
        'user_id.require' => '用户列表不能为空',
        'user_id.array' => '用户ID列表必须为数组'
    ];
}