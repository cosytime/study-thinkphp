<?php

namespace app\admin\validate\v1\system\Role;

use think\Validate;

class createRoleValidate extends Validate
{

    protected $rule = [
        'role_name' => 'require|min:2|max:30',
        'role_key' => 'require|min:2|max:50',
        'role_sort' => 'require|integer',
        'permissions' => 'array',
        'status' => 'require|in:0,1',
        'remark' => 'max:500'
    ];

    protected $message = [
        'role_name.require' => '角色名称不能为空',
        'role_name.min' => '角色名称最少不能低于2个字符',
        'role_name.max' => '角色名称最多不能高于30个字符',
        'role_key.require' => '角色权限字符串不能为空',
        'role_key.min' => '角色权限字符串最少不能低于2个字符',
        'role_key.max' => '角色权限字符串最多不能高于50个字符',
        'role_sort.require' => '排序不能为空',
        'role_sort.integer' => '排序必须为整数',
        'permissions.array' => '菜单权限值必须为数组',
        'status.require' => '角色状态不能为空',
        'status.in' => '角色状态值必须在[\'0\',\'1\']中',
        'remark.max' => '备注最多不能高于500个字符'
    ];
}