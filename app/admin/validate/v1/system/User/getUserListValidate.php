<?php

namespace app\admin\validate\v1\system\User;

use think\Validate;

class getUserListValidate extends Validate
{

    protected $rule = [
        'user_name' => 'min:2|max:30',
        'nick_name' => 'min:2|max:30',
        'dept_id' => 'integer',
        'email' => 'email',
        'phone' => 'mobile',
        'status' => 'in:0,1',
        'page' => 'require|integer|between:1,999',
        'psize' => 'require|integer|between:1,999'
    ];

    protected $message = [
        'user_name.min' => '用户昵称最少不能低于2个字符',
        'user_name.max' => '用户昵称最多不能高于30个字符',
        'nick_name.min' => '用户名称最少不能低于2个字符',
        'nick_name.max' => '用户名称最多不能高于30个字符',
        'email.email' => '邮箱格式不正确',
        'phone.mobile' => '手机号码格式不正确',
        'dept_id.integer' => '部门ID必须为整数',
        'status.in' => '用户状态值必须在[\'0\',\'1\']中',
        'page.require' => '页码不能为空',
        'page.integer' => '页码必须为整数',
        'page.between' => '页码必须在1-999中',
        'psize.require' => '每页数量不能为空',
        'psize.integer' => '每页数量必须为整数',
        'psize.between' => '页码必须在1-999中'
    ];
}