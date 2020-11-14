<?php

use think\migration\Migrator;

class SystemUserRole extends Migrator
{

    public function change()
    {
        $table = $this->table('system_user_role', array('id' => false, 'primary_key' => ['user_id', 'role_id'], 'comment' => '用户和角色关联表'));
        $table
            ->addColumn('user_id', 'biginteger', array('limit' => 20, 'signed' => false, 'comment' => '用户ID'))
            ->addColumn('role_id', 'biginteger', array('limit' => 20, 'signed' => false, 'comment' => '角色ID'))
            ->create();
    }
}
