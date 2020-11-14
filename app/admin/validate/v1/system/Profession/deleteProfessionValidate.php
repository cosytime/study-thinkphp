<?php

namespace app\admin\validate\v1\system\Profession;

use think\Validate;

class deleteProfessionValidate extends Validate
{

    protected $rule = [
        'profession_id' => 'require|array',
    ];

    protected $message = [
        'profession_id.require' => '专业ID列表不能为空',
        'profession_id.array' => '专业ID列表必须为数组'
    ];
}