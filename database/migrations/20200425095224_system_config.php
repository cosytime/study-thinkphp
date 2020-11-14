<?php

use think\migration\Migrator;

class SystemConfig extends Migrator
{

    public function change()
    {
        $table = $this->table('system_config', array('id' => false, 'primary_key' => ['config_id'], 'comment' => '参数配置表'));
        $table
            ->addColumn('config_id', 'integer', array('limit' => 11, 'identity' => true, 'signed' => false, 'comment' => '参数配置ID'))
            ->addColumn('config_name', 'string', array('limit' => 100, 'null' => true, 'default' => '', 'comment' => '参数名称'))
            ->addColumn('config_key', 'string', array('limit' => 100, 'null' => true, 'default' => '', 'comment' => '参数键名'))
            ->addColumn('config_value', 'string', array('limit' => 500, 'null' => true, 'default' => NULL, 'comment' => '参数键值'))
            ->addColumn('config_type', 'string', array('limit' => 2, 'null' => true, 'default' => 'N','comment' => '系统内置（Y是 N否）'))
            ->addColumn('encrypt', 'string', array('limit' => 2, 'null' => true, 'default' => '1', 'comment' => '参数加密（0加密，1不加密）'))
            ->addColumn('status', 'string', array('limit' => 2, 'null' => true, 'default' => '0', 'comment' => '参数状态（0正常，1停用）'))
            ->addColumn('create_by', 'string', array('limit' => 64, 'null' => true, 'comment' => '创建者'))
            ->addColumn('update_by', 'string', array('limit' => 64, 'null' => true, 'comment' => '更新者'))
            ->addColumn('remark', 'string', array('limit' => 500, 'null' => true, 'comment' => '备注'))
            ->addColumn('create_time', 'timestamp', array('default' => 'CURRENT_TIMESTAMP', 'comment' => '创建时间'))
            ->addColumn('update_time', 'timestamp', array('default' => 'CURRENT_TIMESTAMP', 'update' => 'CURRENT_TIMESTAMP', 'comment' => '修改时间'))
            ->create();
    }
}
