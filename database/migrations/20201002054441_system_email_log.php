<?php

use think\migration\Migrator;
use think\migration\db\Column;

class SystemEmailLog extends Migrator
{

    public function change()
    {
        $table = $this->table('system_email_log', array('id' => false, 'primary_key' => ['email_id'], 'comment' => '邮件发送日志记录表'));
        $table
            ->addColumn('email_id', 'biginteger', array('limit' => 20, 'identity' => true, 'signed' => false, 'comment' => '邮件ID'))
            ->addColumn('title', 'string', array('limit' => 500, 'null' => true, 'comment' => '邮件标题'))
            ->addColumn('oper_id', 'biginteger', array('limit' => 20, 'null' => true, 'comment' => '操作人员ID'))
            ->addColumn('from_email', 'string', array('limit' => 50, 'null' => true, 'comment' => '发送人）'))
            ->addColumn('to_email', 'string', array('limit' => 50, 'null' => true, 'comment' => '收件人'))
            ->addColumn('addcc_email', 'string', array('limit' => 50, 'null' => true, 'comment' => '抄送人'))
            ->addColumn('addbcc_email', 'string', array('limit' => 50, 'null' => true, 'comment' => '秘密抄送人'))
            ->addColumn('body', 'text', array('null' => true, 'comment' => '邮件正文'))
            ->addColumn('oper_name', 'string', array('limit' => 50, 'null' => true, 'comment' => '操作人员'))
            ->addColumn('status', 'string', array('limit' => 2, 'null' => false, 'default' => '0', 'comment' => '邮件发送状态（0正常，1异常）'))
            ->addColumn('errinfo', 'string', array('limit' => 2000, 'null' => false, 'comment' => '错误信息'))
            ->addColumn('oper_time', 'string', array('limit' => 11, 'null' => false, 'comment' => '操作时间'))
            ->create();
    }
}
