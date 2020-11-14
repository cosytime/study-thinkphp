<?php

use think\migration\Migrator;

class SystemRoleMenu extends Migrator
{

    public function change()
    {

        $table = $this->table('system_role_menu', array('id' => false, 'primary_key' => ['role_id','menu_id'], 'comment' => '角色和菜单关联表'));
        $table
            ->addColumn('role_id', 'biginteger', array('limit' => 20,'signed' => false, 'comment' => '角色ID'))
            ->addColumn('menu_id', 'biginteger', array('limit' => 20,'signed' => false, 'comment' => '菜单ID'))
            ->create();
    }
}
