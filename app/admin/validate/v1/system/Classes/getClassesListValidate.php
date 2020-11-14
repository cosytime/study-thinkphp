<?php

namespace app\admin\validate\v1\system\Classes;

use think\Validate;

class getClassesListValidate extends Validate
{

    protected $rule = [
        'class_name' => 'min:2|max:30',
        'class_grade' => 'integer|length:4',
        'profession_id' => 'integer',
        'status' => 'in:0,1',
        'page' => 'require|integer|between:1,999',
        'psize' => 'require|integer|between:1,999'
    ];

    protected $message = [
        'class_name.min' => '班级名称最少不能低于2个字符',
        'class_name.max' => '班级名称最多不能高于30个字符',
        'class_grade.integer' => '年级必须为整数',
        'class_grade.length' => '年级长度必须为4位',
        'profession_id.integer' => '所属专业ID必须为整数',
        'status.in' => '班级状态值必须在[\'0\',\'1\']中',
        'page.require' => '页码不能为空',
        'page.integer' => '页码必须为整数',
        'page.between' => '页码必须在1-999中',
        'psize.require' => '每页数量不能为空',
        'psize.integer' => '每页数量必须为整数',
        'psize.between' => '页码必须在1-999中'
    ];
}