<?php

use think\migration\Migrator;

class SystemOperLog extends Migrator
{

    public function change()
    {
        $table = $this->table('system_oper_log', array('id' => false, 'primary_key' => ['oper_id'], 'comment' => '操作日志记录表'));
        $table
            ->addColumn('oper_id', 'biginteger', array('limit' => 20, 'identity' => true, 'signed' => false, 'comment' => '操作ID'))
            ->addColumn('title', 'string', array('limit' => 50, 'null' => false, 'comment' => '模块标题'))
            ->addColumn('business_type', 'string', array('limit' => 2, 'null' => false, 'default' => '0', 'comment' => '业务类型（0其它，1新增，2修改，3删除）'))
            ->addColumn('method', 'string', array('limit' => 100, 'null' => false, 'comment' => '方法名称'))
            ->addColumn('request_method', 'string', array('limit' => 10, 'null' => false, 'comment' => '请求方式'))
            ->addColumn('operator_type', 'string', array('limit' => 2, 'null' => false, 'default' => '0', 'comment' => '操作类别（0其它，1后台用户，2前台用户）'))
            ->addColumn('oper_name', 'string', array('limit' => 50, 'null' => false, 'comment' => '操作人员'))
            ->addColumn('oper_url', 'string', array('limit' => 255, 'null' => false, 'comment' => '请求URL'))
            ->addColumn('oper_ip', 'string', array('limit' => 50, 'null' => false, 'comment' => '主机地址'))
            ->addColumn('oper_location', 'string', array('limit' => 255, 'null' => false, 'comment' => '操作地点'))
            ->addColumn('oper_param', 'string', array('limit' => 2000, 'null' => false, 'comment' => '请求参数'))
            ->addColumn('json_result', 'string', array('limit' => 2000, 'null' => false, 'comment' => '返回参数'))
            ->addColumn('status', 'string', array('limit' => 2, 'null' => false, 'default' => '0', 'comment' => '操作状态（0正常，1异常）'))
            ->addColumn('error_msg', 'string', array('limit' => 2000, 'null' => false, 'comment' => '错误消息'))
            ->addColumn('oper_time', 'string', array('limit' => 11, 'null' => false, 'comment' => '操作时间'))
            ->create();
    }
}
