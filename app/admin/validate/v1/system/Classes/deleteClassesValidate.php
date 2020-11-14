<?php

namespace app\admin\validate\v1\system\Classes;

use think\Validate;

class deleteClassesValidate extends Validate
{

    protected $rule = [
        'class_id' => 'require|array',
    ];

    protected $message = [
        'class_id.require' => '班级ID列表不能为空',
        'class_id.array' => '班级ID列表必须为数组'
    ];
}