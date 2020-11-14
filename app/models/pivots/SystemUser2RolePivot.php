<?php

namespace app\models\pivots;

use think\model\Pivot;

/**
 * 后台用户角色关联 Pivot
 * Class SystemUser2RolePivot
 * @package app\models\pivots
 */
class SystemUser2RolePivot extends Pivot
{

    protected $table = 'system_user_role'; // 设置当前模型对应的完整数据表名称
    protected $schema = [   // 设置字段信息
        'user_id' => 'bigint', // 用户ID
        'role_id' => 'bigint', // 角色ID
    ];

}
