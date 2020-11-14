<?php

use think\migration\Migrator;
use think\migration\db\Column;

class SystemRoleDept extends Migrator
{

    public function change()
    {
        $table = $this->table('system_role_dept', array('id' => false, 'primary_key' => ['role_id', 'dept_id'], 'comment' => '角色和部门关联表'));
        $table
            ->addColumn('role_id', 'biginteger', array('limit' => 20, 'signed' => false, 'comment' => '角色ID'))
            ->addColumn('dept_id', 'biginteger', array('limit' => 20, 'signed' => false, 'comment' => '部门ID'))
            ->create();
    }
}
