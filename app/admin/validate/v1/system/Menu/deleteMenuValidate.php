<?php

namespace app\admin\validate\v1\system\Menu;

use think\Validate;

class deleteMenuValidate extends Validate
{

    protected $rule = [
        'menu_id' => 'require|array',
    ];

    protected $message = [
        'menu_id.require' => '菜单ID列表不能为空',
        'menu_id.array' => '菜单ID列表必须为数组'
    ];
}