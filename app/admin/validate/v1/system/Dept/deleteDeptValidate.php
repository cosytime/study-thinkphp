<?php

namespace app\admin\validate\v1\system\Dept;

use think\Validate;

class deleteDeptValidate extends Validate
{

    protected $rule = [
        'dept_id' => 'require|array',
    ];

    protected $message = [
        'dept_id.require' => '部门ID列表不能为空',
        'dept_id.array' => '部门ID列表必须为数组'
    ];
}