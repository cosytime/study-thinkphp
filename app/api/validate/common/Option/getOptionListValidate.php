<?php

namespace app\api\validate\common\Option;

use think\Validate;

class getOptionListValidate extends Validate
{
    protected $rule = [
        'grade' => 'integer|length:4',
        'profession_id' => 'integer',
    ];

    protected $message = [
        'grade.integer' => '年级必须为整数',
        'grade.length' => '年级值长度为4位',
        'profession_id.integer' => '专业ID必须为整数',
    ];
}