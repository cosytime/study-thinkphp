<?php

namespace app\admin\validate\v1\system\Profession;

use think\Validate;

class createProfessionValidate extends Validate
{

    protected $rule = [
        'profession_name' => 'require|min:2|max:30',
        'profession_sort' => 'require|integer',
        'status' => 'require|in:0,1',
        'remark' => 'max:500'
    ];

    protected $message = [
        'profession_name.require' => '专业名称不能为空',
        'profession_name.min' => '专业名称最少不能低于2个字符',
        'profession_name.max' => '专业名称最多不能高于30个字符',
        'profession_sort.require' => '排序不能为空',
        'profession_sort.integer' => '排序必须为整数',
        'status.require' => '角色状态不能为空',
        'status.in' => '角色状态值必须在[\'0\',\'1\']中',
        'remark.max' => '备注最多不能高于500个字符'
    ];
}