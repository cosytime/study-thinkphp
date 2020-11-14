<?php

use think\migration\Migrator;
use think\migration\db\Column;

class SystemDictType extends Migrator
{

    public function change()
    {
        $table = $this->table('system_dict_type', array('id' => false, 'primary_key' => ['dict_id'], 'comment' => '字典类型表'));
        $table
            ->addColumn('dict_id', 'biginteger', array('limit' => 20, 'identity' => true, 'signed' => false, 'comment' => '字典ID'))
            ->addColumn('dict_name', 'string', array('limit' => 100, 'null' => false, 'comment' => '字典名称'))
            ->addColumn('dict_type', 'string', array('limit' => 100, 'null' => true, 'comment' => '字典类型'))
            ->addColumn('status', 'string', array('limit' => 2, 'default' => '0', 'null' => false, 'comment' => '状态（0正常，1停用）'))
            ->addColumn('create_by', 'string', array('limit' => 64, 'null' => true, 'comment' => '创建者'))
            ->addColumn('update_by', 'string', array('limit' => 64, 'null' => true, 'comment' => '更新者'))
            ->addColumn('remark', 'string', array('limit' => 500, 'null' => true, 'comment' => '备注'))
            ->addColumn('create_time', 'timestamp', array('default' => 'CURRENT_TIMESTAMP', 'comment' => '创建时间'))
            ->addColumn('update_time', 'timestamp', array('default' => 'CURRENT_TIMESTAMP', 'update' => 'CURRENT_TIMESTAMP', 'comment' => '修改时间'))
            ->create();
    }
}
