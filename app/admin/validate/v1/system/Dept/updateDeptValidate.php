<?php

namespace app\admin\validate\v1\system\Dept;

use think\Validate;

class updateDeptValidate extends Validate
{

    protected $rule = [
        'dept_id' => 'require|integer',
        'dept_name' => 'require|min:2|max:30',
        'dept_sort' => 'require|integer',
        'leader' => 'require|min:2|max:20',
        'phone' => 'require|mobile',
        'email' => 'require|email',
        'status' => 'require|in:0,1',
        'remark' => 'max:500'
    ];

    protected $message = [
        'dept_id.require' => '部门ID不能为空',
        'dept_id.integer' => '部门ID必须为整数',
        'dept_name.require' => '部门名称不能为空',
        'dept_name.min' => '部门名称最少不能低于2个字符',
        'dept_name.max' => '部门名称最多不能高于30个字符',
        'dept_sort.require' => '排序不能为空',
        'dept_sort.integer' => '排序必须为整数',
        'leader.require' => '负责人名不能为空',
        'leader.min' => '负责人名最少不能低于2个字符',
        'leader.max' => '负责人名最多不能高于30个字符',
        'phone.require' => '负责人电话号码不能为空',
        'phone.mobile' => '负责人电话号码格式不正确',
        'email.require' => '负责人电子邮箱不能为空',
        'email.email' => '负责人电子邮箱格式不正确',
        'status.require' => '角色状态不能为空',
        'status.in' => '角色状态值必须在[\'0\',\'1\']中',
        'remark.max' => '备注最多不能高于500个字符'
    ];
}