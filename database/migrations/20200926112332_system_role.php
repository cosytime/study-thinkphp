<?php

use think\migration\Migrator;
use think\migration\db\Column;

class SystemRole extends Migrator
{

    public function change()
    {
        $table = $this->table('system_role', array('id' => false, 'primary_key' => ['role_id'], 'comment' => '角色信息表'));
        $table
            ->addColumn('role_id', 'biginteger', array('limit' => 20, 'identity' => true, 'signed' => false, 'comment' => '角色ID'))
            ->addColumn('role_name', 'string', array('limit' => 30, 'null' => false, 'comment' => '角色名称'))
            ->addColumn('role_key', 'string', array('limit' => 100, 'null' => false, 'comment' => '角色权限字符串'))
            ->addColumn('role_sort', 'integer', array('limit' => 4, 'null' => false, 'comment' => '显示顺序'))
            ->addColumn('role_type', 'string', array('limit' => 2, 'default' => '1', 'null' => false, 'comment' => '系统内置（0是，1否）'))
            ->addColumn('status', 'string', array('limit' => 2, 'default' => '0', 'null' => false, 'comment' => '角色状态（0正常，1停用）'))
            ->addColumn('create_by', 'string', array('limit' => 64, 'null' => true, 'comment' => '创建者'))
            ->addColumn('update_by', 'string', array('limit' => 64, 'null' => true, 'comment' => '更新者'))
            ->addColumn('remark', 'string', array('limit' => 500, 'null' => true, 'comment' => '备注'))
            ->addColumn('delete_time', 'timestamp', array('null' => true, 'comment' => '删除时间（软删除）'))
            ->addColumn('create_time', 'timestamp', array('default' => 'CURRENT_TIMESTAMP', 'comment' => '创建时间'))
            ->addColumn('update_time', 'timestamp', array('default' => 'CURRENT_TIMESTAMP', 'update' => 'CURRENT_TIMESTAMP', 'comment' => '修改时间'))
            ->create();
    }
}
