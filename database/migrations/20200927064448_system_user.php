<?php

use think\migration\Migrator;

class SystemUser extends Migrator
{

    public function change()
    {
        $table = $this->table('system_user', array('id' => false, 'primary_key' => ['user_id'], 'comment' => '后台用户信息表'));
        $table
            ->addColumn('user_id', 'biginteger', array('limit' => 20, 'identity' => true, 'signed' => false, 'comment' => '用户ID'))
            ->addColumn('dept_id', 'biginteger', array('limit' => 20, 'null' => false, 'comment' => '部门ID'))
            ->addColumn('user_name', 'string', array('limit' => 30, 'null' => false, 'comment' => '用户账号'))
            ->addColumn('nick_name', 'string', array('limit' => 30, 'null' => false, 'comment' => '用户昵称'))
            ->addColumn('signature', 'string', array('limit' => 100, 'null' => true, 'comment' => '个性签名'))
            ->addColumn('user_type', 'string', array('limit' => 2, 'default' => '1', 'null' => false, 'comment' => '系统内置（0是，1否）'))
            ->addColumn('email', 'string', array('limit' => 50, 'null' => true, 'comment' => '用户邮箱'))
            ->addColumn('phone', 'string', array('limit' => 11, 'null' => true, 'comment' => '手机号码'))
            ->addColumn('sex', 'string', array('limit' => 1, 'null' => true, 'comment' => '用户性别（0未知，1男，2女）'))
            ->addColumn('avatar', 'string', array('limit' => 100, 'null' => true, 'comment' => '头像地址'))
            ->addColumn('password', 'string', array('limit' => 100, 'null' => false, 'comment' => '密码'))
            ->addColumn('status', 'string', array('limit' => 2, 'default' => '0', 'null' => true, 'comment' => '帐号状态（0正常，1停用）'))
            ->addColumn('login_ip', 'string', array('limit' => 50, 'null' => true, 'comment' => '最后登录IP'))
            ->addColumn('login_date', 'string', array('limit' => 11, 'null' => true, 'comment' => '最后登录时间'))
            ->addColumn('create_by', 'string', array('limit' => 64, 'default' => '', 'null' => true, 'comment' => '创建者'))
            ->addColumn('update_by', 'string', array('limit' => 64, 'default' => '', 'null' => true, 'comment' => '更新者'))
            ->addColumn('remark', 'string', array('limit' => 500, 'default' => '', 'null' => true, 'comment' => '备注'))
            ->addColumn('delete_time', 'timestamp', array('null' => true, 'comment' => '删除时间（软删除）'))
            ->addColumn('create_time', 'timestamp', array('default' => 'CURRENT_TIMESTAMP', 'comment' => '创建时间'))
            ->addColumn('update_time', 'timestamp', array('default' => 'CURRENT_TIMESTAMP', 'update' => 'CURRENT_TIMESTAMP', 'comment' => '修改时间'))
            ->create();
    }
}
