<?php

namespace app\admin\validate\v1\system\Role;

use think\Validate;

class getRoleListValidate extends Validate
{

    protected $rule = [
        'role_name' => 'min:2|max:30',
        'status' => 'in:0,1',
        'page' => 'require|integer|between:1,999',
        'psize' => 'require|integer|between:1,999'
    ];

    protected $message = [
        'role_name.min' => '角色名称最少不能低于2个字符',
        'role_name.max' => '角色名称最多不能高于30个字符',
        'status.in' => '部门状态值必须在[\'0\',\'1\']中',
        'page.require' => '页码不能为空',
        'page.integer' => '页码必须为整数',
        'page.between' => '页码必须在1-999中',
        'psize.require' => '每页数量不能为空',
        'psize.integer' => '每页数量必须为整数',
        'psize.between' => '页码必须在1-999中'
    ];
}