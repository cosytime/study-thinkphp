<?php

use think\migration\Migrator;

class SystemProfession extends Migrator
{

    public function change()
    {
        $table = $this->table('system_profession', array('id' => false, 'primary_key' => ['profession_id'], 'comment' => '专业表'));
        $table
            ->addColumn('profession_id', 'biginteger', array('limit' => 20, 'identity' => true, 'signed' => false, 'comment' => '专业ID'))
            ->addColumn('profession_name', 'string', array('limit' => 50, 'null' => false, 'comment' => '专业名称'))
            ->addColumn('profession_sort', 'biginteger', array('limit' => 20, 'default' => 0, 'null' => false, 'comment' => '专业显示顺序'))
            ->addColumn('status', 'string', array('limit' => 2, 'null' => false, 'default' => '0', 'comment' => '专业状态（0正常，1禁用）'))
            ->addColumn('remark', 'string', array('limit' => 500, 'null' => true, 'comment' => '备注'))
            ->addColumn('create_by', 'string', array('limit' => 64, 'null' => true, 'comment' => '创建者'))
            ->addColumn('update_by', 'string', array('limit' => 64, 'null' => true, 'comment' => '更新者'))
            ->addColumn('delete_time', 'timestamp', array('null' => true, 'comment' => '删除时间（软删除）'))
            ->addColumn('create_time', 'timestamp', array('default' => 'CURRENT_TIMESTAMP', 'comment' => '创建时间'))
            ->addColumn('update_time', 'timestamp', array('default' => 'CURRENT_TIMESTAMP', 'update' => 'CURRENT_TIMESTAMP', 'comment' => '修改时间'))
            ->create();
    }
}
