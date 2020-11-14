<?php

namespace app\admin\validate\v1\system\Role;

use think\Validate;

class deleteRoleValidate extends Validate
{

    protected $rule = [
        'role_id' => 'require|array',
    ];

    protected $message = [
        'role_id.require' => '角色ID列表不能为空',
        'role_id.array' => '角色ID列表必须为数组'
    ];
}