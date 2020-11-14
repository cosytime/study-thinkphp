<?php

use think\migration\Migrator;
use think\migration\db\Column;

class SystemLogin extends Migrator
{

    public function change()
    {
        $table = $this->table('system_login', array('id' => false, 'primary_key' => ['login_id'], 'comment' => '系统登录记录表'));
        $table
            ->addColumn('login_id', 'biginteger', array('limit' => 20, 'identity' => true, 'signed' => false, 'comment' => '用户ID'))
            ->addColumn('user_id', 'biginteger', array('limit' => 20, 'null' => false, 'comment' => '用户ID'))
            ->addColumn('user_name', 'string', array('limit' => 30, 'null' => false, 'comment' => '用户账号'))
            ->addColumn('ip', 'string', array('limit' => 50, 'null' => false, 'comment' => '登录IP地址'))
            ->addColumn('location', 'string', array('limit' => 255, 'null' => true, 'comment' => '登录地点'))
            ->addColumn('browser', 'string', array('limit' => 50, 'null' => true, 'comment' => '浏览器类型'))
            ->addColumn('os', 'string', array('limit' => 50, 'null' => true, 'comment' => '操作系统'))
            ->addColumn('status', 'string', array('limit' => 2, 'default' => '0', 'null' => false, 'comment' => '登录状态（0成功，1失败）'))
            ->addColumn('msg', 'string', array('limit' => 255, 'null' => true, 'comment' => '提示消息'))
            ->addColumn('remark', 'string', array('limit' => 500, 'default' => '', 'null' => true, 'comment' => '备注'))
            ->addColumn('time', 'string', array('limit' => 11, 'null' => true, 'comment' => '登录时间'))
            ->create();
    }
}
