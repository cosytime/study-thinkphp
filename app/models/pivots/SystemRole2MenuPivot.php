<?php

namespace app\models\pivots;

use think\model\Pivot;

/**
 * 后台角色菜单关联 Pivot
 * Class SystemRole2MenuPivot
 * @package app\models\pivots
 */
class SystemRole2MenuPivot extends Pivot
{

    protected $table = 'system_role_menu'; // 设置当前模型对应的完整数据表名称
    protected $schema = [   // 设置字段信息
        'role_id' => 'bigint', // 角色ID
        'menu_id' => 'bigint', // 菜单ID
    ];

}
