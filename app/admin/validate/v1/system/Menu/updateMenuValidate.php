<?php

namespace app\admin\validate\v1\system\Menu;

use think\Validate;

class updateMenuValidate extends Validate
{

    protected $rule = [
        'menu_id' => 'require|integer',
        'parent_id' => 'require|integer',
        'name' => 'require|min:2|max:50',
        'menu_sort' => 'require|integer',
        'menu_type' => 'require|in:G,M,C,F',
        'hidden' => 'require|in:0,1',
        'hidden_children' => 'require|in:0,1',
        'keep_alive' => 'require|in:0,1',
        'is_frame' => 'require|in:0,1',
        'path' => 'require|min:2|max: 50',
        'title' => 'require|min:2|max:50',
        'component' => 'require|min:1|max:50',
        'permission' => 'require|min:2|max:50',
        'redirect' => 'require|min:2|max:50',
        'icon' => 'require|min:1|max:50',
        'status' => 'require|in:0,1',
        'remark' => 'max:500'
    ];

    protected $message = [
        'menu_id.require' => '菜单ID不能为空',
        'menu_id.integer' => '菜单ID必须为整数',
        'parent_id.require' => '父级菜单ID不能为空',
        'parent_id.integer' => '父级菜单ID必须为整数',
        'name.require' => '路由名称不能为空',
        'name.min' => '路由名称最少不能低于2个字符',
        'name.max' => '路由名称最多不能高于50个字符',
        'menu_sort.require' => '排序不能为空',
        'menu_sort.integer' => '排序必须为整数',
        'menu_type.require' => '菜单类型不能为空',
        'menu_type.in' => '菜单类型值必须在[\'G\',\'M\',\'C\',\'F\']中',
        'hidden.require' => '菜单显隐状态不能为空',
        'hidden.in' => '菜单显隐状态值必须在[\'0\',\'1\']中',
        'hidden_children.require' => '子菜单显隐状态不能为空',
        'hidden_children.in' => '子菜单显隐状态值必须在[\'0\',\'1\']中',
        'keep_alive.require' => '缓存状态不能为空',
        'keep_alive.in' => '缓存状态值必须在[\'0\',\'1\']中',
        'is_frame.require' => '外链状态不能为空',
        'is_frame.in' => '外链状态值必须在[\'0\',\'1\']中',
        'path.require' => '路由地址不能为空',
        'path.min' => '路由地址最少不能低于2个字符',
        'path.max' => '路由地址最多不能高于50个字符',
        'title.require' => '菜单名称不能为空',
        'title.min' => '菜单名称最少不能低于2个字符',
        'title.max' => '菜单名称最多不能高于50个字符',
        'component.require' => '组件路径不能为空',
        'component.min' => '组件路径最少不能低于2个字符',
        'component.max' => '组件路径最多不能高于50个字符',
        'permission.require' => '权限标识不能为空',
        'permission.min' => '权限标识最少不能低于2个字符',
        'permission.max' => '权限标识最多不能高于50个字符',
        'redirect.require' => '重定向地址不能为空',
        'redirect.min' => '重定向地址最少不能低于2个字符',
        'redirect.max' => '重定向地址最多不能高于50个字符',
        'icon.require' => '菜单图标不能为空',
        'icon.min' => '菜单图标最少不能低于2个字符',
        'icon.max' => '菜单图标最多不能高于50个字符',
        'status.require' => '菜单状态不能为空',
        'status.in' => '菜单状态值必须在[\'0\',\'1\']中',
        'remark.max' => '备注最多不能高于500个字符',
    ];

    protected $scene = [
        'G' => ['menu_id', 'parent_id', 'name', 'menu_type', 'menu_sort', 'title', 'remark'],
        'M' => ['menu_id', 'parent_id', 'name', 'menu_type', 'menu_sort', 'hidden', 'hidden_children', 'keep_alive', 'is_frame', 'path', 'title', 'permission', 'component', 'redirect', 'icon', 'status', 'remark'],
        'C' => ['menu_id', 'parent_id', 'name', 'menu_type', 'menu_sort', 'hidden', 'hidden_children', 'keep_alive', 'is_frame', 'path', 'title', 'component', 'permission', 'icon', 'status', 'remark'],
        'F' => ['menu_id', 'parent_id', 'menu_type', 'menu_sort', 'title', 'permission', 'status', 'remark']
    ];
}