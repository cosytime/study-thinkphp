<?php

namespace app\admin\validate\v1\recruit\Listes;

use think\Validate;

class deleteRecruitListValidate extends Validate
{

    protected $rule = [
        'recruit_id' => 'require|array',
    ];

    protected $message = [
        'recruit_id.require' => '报名信息ID列表不能为空',
        'recruit_id.array' => '报名信息ID列表必须为数组'
    ];
}