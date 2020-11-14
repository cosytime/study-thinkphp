<?php

use think\migration\Migrator;

class SystemMarketing extends Migrator
{

    public function change()
    {
        $table = $this->table('system_marketing', array('id' => false, 'primary_key' => ['id'], 'comment' => '系统营销表'));
        $table
            ->addColumn('marketing_id', 'integer', array('limit' => 11, 'identity' => true, 'signed' => false, 'comment' => '营销ID'))
            ->addColumn('name', 'string', array('limit' => 255, 'null' => false, 'default' => '', 'comment' => '名称'))
            ->addColumn('content', 'text', array('limit' => 5000, 'null' => true, 'default' => NULL, 'comment' => '内容'))
            ->addColumn('resources_id', 'integer', array('limit' => 11, 'null' => true, 'comment' => '图片ID'))
            ->addColumn('url', 'string', array('limit' => 128, 'null' => true, 'comment' => 'url'))
            ->addColumn('group', 'string', array('limit' => 128, 'null' => true, 'comment' => '分组'))
            ->addColumn('sort', 'integer', array('limit' => 1, 'null' => false, 'default' => 0, 'comment' => '排序'))
            ->addColumn('status', 'string', array('limit' => 1, 'null' => false, 'default' => '0', 'comment' => '状态（0正常，1停用）'))
            ->addColumn('exp_time', 'string', array('limit' => 11, 'null' => false, 'default' => '4691404800', 'comment' => '有效期至（默认至2118年09月01日 00:00:00）'))
            ->addColumn('create_by', 'string', array('limit' => 64, 'null' => true, 'comment' => '创建者'))
            ->addColumn('update_by', 'string', array('limit' => 64, 'null' => true, 'comment' => '更新者'))
            ->addColumn('remark', 'string', array('limit' => 500, 'null' => true, 'comment' => '备注'))
            ->addColumn('create_time', 'timestamp', array('default' => 'CURRENT_TIMESTAMP', 'comment' => '创建时间'))
            ->addColumn('update_time', 'timestamp', array('default' => 'CURRENT_TIMESTAMP', 'update' => 'CURRENT_TIMESTAMP', 'comment' => '修改时间'))
            ->create();
    }
}
