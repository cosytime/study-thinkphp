<?php

use think\migration\Migrator;

class User extends Migrator
{

    public function change()
    {
        $table = $this->table('user', array('id' => false, 'primary_key' => ['uid'], 'comment' => '用户表'));
        $table
            ->addColumn('uid', 'biginteger', array('limit' => 20, 'identity' => true, 'signed' => false, 'comment' => '用户ID'))
            ->addColumn('username', 'string', array('limit' => 50, 'null' => false, 'comment' => '用户名'))
            ->addColumn('nickname', 'string', array('limit' => 60, 'null' => true, 'comment' => '用户昵称'))
            ->addColumn('password', 'string', array('limit' => 100, 'null' => false, 'comment' => '密码'))
            ->addColumn('name', 'string', array('limit' => 20, 'null' => true, 'comment' => '姓名'))
            ->addColumn('sex', 'string', array('limit' => 2, 'default' => '0', 'null' => true, 'comment' => '性别（0未知，1男，2女）'))
            ->addColumn('grade', 'string', array('limit' => 20, 'null' => true, 'comment' => '年级'))
            ->addColumn('profession', 'string', array('limit' => 50, 'null' => true, 'comment' => '专业'))
            ->addColumn('class', 'string', array('limit' => 50, 'null' => true, 'comment' => '班级'))
            ->addColumn('committee', 'string', array('limit' => 2, 'null' => false, 'default' => '1','comment' => '是否班委'))
            ->addColumn('union', 'string', array('limit' => 2, 'null' => false, 'default' => '1','comment' => '是否学生会'))
            ->addColumn('student_id', 'string', array('limit' => 20, 'null' => true, 'comment' => '学号'))
            ->addColumn('phone', 'string', array('limit' => 11, 'null' => true, 'comment' => '联系电话'))
            ->addColumn('email', 'string', array('limit' => 50, 'null' => true, 'comment' => '电子邮箱'))
            ->addColumn('birthday', 'string', array('limit' => 128, 'null' => true, 'default' => NULL, 'comment' => '生日'))
            ->addColumn('qq', 'string', array('limit' => 50, 'null' => true, 'comment' => 'QQ号'))
            ->addColumn('hoppy', 'string', array('limit' => 500, 'null' => true, 'comment' => '个人爱好'))
            ->addColumn('code', 'string', array('limit' => 50, 'null' => true, 'comment' => '邀请码'))
            ->addColumn('push_code', 'string', array('limit' => 50, 'null' => true, 'comment' => '内推码'))
            ->addColumn('desc', 'string', array('limit' => 500, 'null' => true, 'comment' => '个人介绍'))
            ->addColumn('user_status', 'string', array('limit' => 2, 'default' => '1', 'null' => false, 'comment' => '成员状态（0正式成员，1未报名，2待考核，3考核中，4不合格（出局）'))
            ->addColumn('verify_email', 'string', array('limit' => 2, 'default' => '1', 'null' => false, 'comment' => '邮箱验证状态（0已验证，1未验证）'))
            ->addColumn('verify_phone', 'string', array('limit' => 2, 'default' => '1', 'null' => false, 'comment' => '手机号验证状态（0已验证，1未验证）'))
            ->addColumn('status', 'string', array('limit' => 2, 'default' => '0', 'null' => false, 'comment' => '用户状态（0正常，1停用）'))
            ->addColumn('create_by', 'string', array('limit' => 64, 'null' => true, 'comment' => '创建者'))
            ->addColumn('update_by', 'string', array('limit' => 64, 'null' => true, 'comment' => '更新者'))
            ->addColumn('remark', 'string', array('limit' => 500, 'null' => true, 'comment' => '备注'))
            ->addColumn('delete_time', 'timestamp', array('null' => true, 'comment' => '删除时间（软删除）'))
            ->addColumn('create_time', 'timestamp', array('default' => 'CURRENT_TIMESTAMP', 'comment' => '创建时间'))
            ->addColumn('update_time', 'timestamp', array('default' => 'CURRENT_TIMESTAMP', 'update' => 'CURRENT_TIMESTAMP', 'comment' => '修改时间'))
            ->create();
    }
}
