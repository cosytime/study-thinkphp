<?php

use think\migration\Migrator;
use think\migration\db\Column;

class SystemProtocol extends Migrator
{
    public function change()
    {
        $table = $this->table('system_protocol', array('id' => false, 'primary_key' => ['protocol_id'], 'comment' => '协议条款表'));
        $table
            ->addColumn('protocol_id', 'biginteger', array('limit' => 20, 'identity' => true, 'signed' => false, 'comment' => '协议ID'))
            ->addColumn('protocol_name', 'string', array('limit' => 50, 'null' => false, 'comment' => '协议名称'))
            ->addColumn('protocol_code', 'string', array('limit' => 50, 'null' => false, 'comment' => '协议代码'))
            ->addColumn('protocol_content', 'text', array('comment' => '协议内容'))
            ->addColumn('protocol_sort', 'biginteger', array('limit' => 20, 'default' => 0, 'null' => false, 'comment' => '协议显示顺序'))
            ->addColumn('version', 'string', array('limit' => 20, 'default' => '1.0.0', 'null' => false, 'comment' => '协议版本号'))
            ->addColumn('desc', 'string', array('limit' => 500, 'null' => true, 'comment' => '协议描述'))
            ->addColumn('status', 'string', array('limit' => 2, 'null' => false, 'default' => '0', 'comment' => '协议状态（0正常，1禁用）'))
            ->addColumn('release_time', 'string', array('limit' => 11, 'null' => false, 'default' => '0', 'comment' => '发布时间'))
            ->addColumn('effect_time', 'string', array('limit' => 11, 'null' => false, 'default' => '0', 'comment' => '生效时间'))
            ->addColumn('create_by', 'string', array('limit' => 64, 'null' => true, 'comment' => '创建者'))
            ->addColumn('update_by', 'string', array('limit' => 64, 'null' => true, 'comment' => '更新者'))
            ->addColumn('delete_time', 'timestamp', array('null' => true, 'comment' => '删除时间（软删除）'))
            ->addColumn('create_time', 'timestamp', array('default' => 'CURRENT_TIMESTAMP', 'comment' => '创建时间'))
            ->addColumn('update_time', 'timestamp', array('default' => 'CURRENT_TIMESTAMP', 'update' => 'CURRENT_TIMESTAMP', 'comment' => '更新时间'))
            ->create();
    }
}
