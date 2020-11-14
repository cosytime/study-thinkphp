<?php

namespace app\admin\validate\v1\system\User;

use think\Validate;

class createUserValidate extends Validate
{

    protected $rule = [
        'user_name' => 'require|min:2|max:30',
        'nick_name' => 'require|min:2|max:50',
        'dept_id' => 'require|integer',
        'phone' => 'require|mobile',
        'email' => 'require|email',
        'sex' => 'require|in:0,1,2',
        'avatar' => 'require',
        'password' => 'require|min:6|max:20',
        'roles' => 'require|array',
        'status' => 'require|in:0,1',
        'remark' => 'max:500'
    ];

    protected $message = [
        'user_name.require' => '用户名不能为空',
        'user_name.min' => '用户名最少不能低于2个字符',
        'user_name.max' => '用户名最多不能高于30个字符',
        'nick_name.require' => '昵称不能为空',
        'nick_name.min' => '昵称最少不能低于2个字符',
        'nick_name.max' => '昵称最多不能高于30个字符',
        'dept_id.require' => '部门ID不能为空',
        'dept_id.integer' => '部门ID必须为整数',
        'phone.require' => '手机号码不能为空',
        'phone.mobile' => '手机号码格式不正确',
        'email.require' => '电子邮箱不能为空',
        'email.email' => '电子邮箱格式不正确',
        'sex.require' => '性别不能为空',
        'sex.in' => '性别值必须在[\'0\',\'1\',\'2\']中',
        'avatar.require' => '头像不能为空',
        'password.require' => '密码不能为空',
        'password.min' => '密码最少不能低于6个字符',
        'password.max' => '密码最多不能高于20个字符',
        'roles.require' => '角色列表不能为空',
        'roles.array' => '角色列表必须为数组',
        'status.require' => '用户状态不能为空',
        'status.in' => '用户状态值必须在[\'0\',\'1\',\'2\']中',
        'remark.max' => '备注最多不能高于500个字符'
    ];
}