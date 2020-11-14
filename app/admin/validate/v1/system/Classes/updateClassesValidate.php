<?php

namespace app\admin\validate\v1\system\Classes;

use think\Validate;

class updateClassesValidate extends Validate
{

    protected $rule = [
        'class_id' => 'require|integer',
        'class_name' => 'require|min:2|max:30',
        'profession_id' => 'require|integer',
        'class_grade' => 'require|integer|length:4',
        'class_abbr' => 'require|min:2|max:20',
        'class_sort' => 'require|integer',
        'status' => 'require|in:0,1',
        'remark' => 'max:500'
    ];

    protected $message = [
        'class_id.require' => '班级ID不能为空',
        'class_id.integer' => '班级ID必须为整数',
        'class_name.require' => '班级不能为空',
        'class_name.min' => '班级最少不能低于2个字符',
        'class_name.max' => '班级最多不能高于30个字符',
        'profession_id.require' => '专业不能为空',
        'profession_id.integer' => '专业必须为整数',
        'class_grade.require' => '年级不能为空',
        'class_grade.integer' => '年级必须为整数',
        'class_grade.length' => '年级长度为4位',
        'class_abbr.require' => '班级简称不能为空',
        'class_abbr.min' => '班级简称最少不能低于2个字符',
        'class_abbr.max' => '班级简称最多不能高于20个字符',
        'class_sort.require' => '排序不能为空',
        'class_sort.integer' => '排序必须为整数',
        'status.require' => '班级状态不能为空',
        'status.in' => '班级状态值必须在[\'0\',\'1\']中',
        'remark.max' => '备注最多不能高于500个字符'
    ];
}