<?php

namespace app\api\validate\user\Info;

use think\Validate;

class updateUserInfoValidate extends Validate
{
    protected $rule = [
        'nickname' => 'min:1|max:30',
        'sex' => 'in:0,1,2',
        'birthday' => 'date',
        'desc' => 'max:200',
    ];

    protected $message = [
        'nickname.min' => '昵称最少不能低于1个字符',
        'nickname.max' => '昵称最多不能超过30个字符',
        'sex.in' => '性别值必须在[\'0\',\'1\',\'2\']中',
        'birthday.date' => '生日格式不正确',
        'desc.max' => '备注最多不能超过200个字符',
    ];
}