<?php

namespace app\api\validate\recruit\Lists;

use think\Validate;

class createRecruitValidate extends Validate
{
    protected $rule = [
        'name' => 'require|min:2|max:5',
        'sex' => 'require|in:0,1,2',
        'student_id' => 'require|integer|length:9,10',
        'phone' => 'require|mobile',
        'grade' => 'require|length:4',
        'email' => 'require|email',
        'math_grades' => 'require|integer|min:1|max:3',
        'english_grades' => 'require|integer|min:1|max:3',
        'complex_grades' => 'min:1|max:3',
        'student_type' => 'integer|in:1,2,3',
        'profession' => 'require|min:2|max:20',
        'class' => 'require|min:2|max:30',
        'committee' => 'require|in:0,1',
        'union' => 'require|in:0,1',
        'hoppy' => 'require|min:1|max:100',
        'code' => 'require|length:6',
        'push_code' => 'length:8',
        'desc' => 'require|max:50'
    ];

    protected $message = [
        'name.require' => '姓名不能为空',
        'name.min' => '姓名最少不能低于2个字符',
        'name.max' => '姓名最多不能高于30个字符',
        'sex.require' => '性别不能为空',
        'sex.in' => '性别值必须在[\'0\',\'1\',\'2\']中',
        'student_id.require' => '学号不能为空',
        'student_id.integer' => '学号必须为整数',
        'student_id.length' => '学号长度为9-10位',
        'phone.require' => '手机l;号码不能为空',
        'phone.mobile' => '手机号码格式不正确',
        'email.require' => '电子邮箱不能为空',
        'email.email' => '电子邮箱格式不正确',
        'math_grades.require' => '数学成绩不能为空',
        'math_grades.integer' => '数学成绩必须为整数',
        'math_grades.min' => '数学成绩最少不能低于1个字符',
        'math_grades.max' => '数学成绩最多不能高于3个字符',
        'english_grades.require' => '英语成绩不能为空',
        'english_grades.integer' => '英语成绩必须为整数',
        'english_grades.min' => '英语成绩最少不能低于1个字符',
        'english_grades.max' => '英语成绩最多不能高于3个字符',
        'complex_grades.integer' => '综合成绩必须为整数',
        'complex_grades.min' => '综合成绩最少不能低于1个字符',
        'complex_grades.max' => '综合成绩最多不能高于3个字符',
        'student_type.in' => '分科值必须在[\'1\',\'2\',\'3\']中',
        'grade.require' => '年级不能为空',
        'grade.length' => '年级长度为4位',
        'profession.require' => '专业不能为空',
        'profession.min' => '专业值最少不能低于2个字符',
        'profession.max' => '专业值最多不能高于30个字符',
        'class.require' => '班级不能为空',
        'class.min' => '班级最少不能低于2个字符',
        'class.max' => '班级最多不能高于30个字符',
        'committee.require' => '是否是班委的值不能为空',
        'committee.in' => '是否是班委的值必须在[\'0\',\'1\']中',
        'union.require' => '是否是学生会的值不能为空',
        'union.in' => '是否是学生会的值必须在[\'0\',\'1\']中',
        'hoppy.require' => '兴趣不能为空',
        'hoppy.min' => '兴趣值最少不能低于2个字符',
        'hoppy.max' => '兴趣值最多不能高于100个字符',
        'code.require' => '邀请码不能为空',
        'code.length' => '邀请码长度为6位',
        'push_code.length' => '内推码长度为8位',
        'desc.require' => '个人简介不能为空',
        'desc.max' => '个人简介最多不能高于50个字符'
    ];
}