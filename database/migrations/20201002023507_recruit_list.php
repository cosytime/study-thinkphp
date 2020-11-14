<?php

use think\migration\Migrator;

class RecruitList extends Migrator
{

    public function change()
    {
        $table = $this->table('recruit_list', array('id' => false, 'primary_key' => ['recruit_id'], 'comment' => '报名表'));
        $table
            ->addColumn('recruit_id', 'biginteger', array('limit' => 20, 'identity' => true, 'signed' => false, 'comment' => '报名ID'))
            ->addColumn('uid', 'biginteger', array('limit' => 20, 'null' => false, 'comment' => '用户ID'))
            ->addColumn('name', 'string', array('limit' => 20, 'null' => true, 'comment' => '姓名'))
            ->addColumn('sex', 'string', array('limit' => 2, 'default' => '0', 'null' => true, 'comment' => '性别（0未知，1男，2女）'))
            ->addColumn('grade', 'string', array('limit' => 20, 'null' => true, 'comment' => '年级'))
            ->addColumn('profession', 'string', array('limit' => 50, 'null' => true, 'comment' => '专业'))
            ->addColumn('class', 'string', array('limit' => 50, 'null' => true, 'comment' => '班级'))
            ->addColumn('student_id', 'string', array('limit' => 20, 'null' => true, 'comment' => '学号'))
            ->addColumn('phone', 'string', array('limit' => 11, 'null' => true, 'comment' => '联系电话'))
            ->addColumn('email', 'string', array('limit' => 50, 'null' => true, 'comment' => '电子邮箱'))
            ->addColumn('committee', 'string', array('limit' => 2, 'null' => false, 'default' => '1','comment' => '是否班委'))
            ->addColumn('union', 'string', array('limit' => 2, 'null' => false, 'default' => '1','comment' => '是否学生会'))
            ->addColumn('qq', 'string', array('limit' => 50, 'null' => true, 'comment' => 'QQ号'))
            ->addColumn('math_grades', 'integer', array('limit' => 3, 'null' => true, 'comment' => '高考数学成绩'))
            ->addColumn('english_grades', 'integer', array('limit' => 3, 'null' => true, 'comment' => '高考英语成绩'))
            ->addColumn('complex_grades', 'integer', array('limit' => 3, 'null' => true, 'comment' => '高考综合成绩（理综/文综）'))
            ->addColumn('student_type', 'string', array('limit' => 2, 'null' => true, 'comment' => '高中分科（1理科，2文科，3不分科）'))
            ->addColumn('hoppy', 'string', array('limit' => 500, 'null' => true, 'comment' => '个人爱好'))
            ->addColumn('push_code', 'string', array('limit' => 50, 'null' => true, 'comment' => '内推码'))
            ->addColumn('desc', 'string', array('limit' => 500, 'null' => true, 'comment' => '个人介绍'))
            ->addColumn('level', 'string', array('limit' => 2, 'default' => '1', 'null' => false, 'comment' => '成员状态（0正式成员，1待审核，2待考核，3考核中，4不合格（出局）'))
            ->addColumn('year', 'string', array('limit' => 5, 'null' => true, 'comment' => '招新代码（年号）'))
            ->addColumn('ip', 'string', array('limit' => 32, 'null' => false, 'default' => '0.0.0.0', 'comment' => '提交IP'))
            ->addColumn('create_by', 'string', array('limit' => 64, 'null' => true, 'comment' => '创建者'))
            ->addColumn('update_by', 'string', array('limit' => 64, 'null' => true, 'comment' => '更新者'))
            ->addColumn('remark', 'string', array('limit' => 500, 'null' => true, 'comment' => '备注'))
            ->addColumn('delete_time', 'timestamp', array('null' => true, 'comment' => '删除时间（软删除）'))
            ->addColumn('create_time', 'timestamp', array('default' => 'CURRENT_TIMESTAMP', 'comment' => '创建时间'))
            ->addColumn('update_time', 'timestamp', array('default' => 'CURRENT_TIMESTAMP', 'update' => 'CURRENT_TIMESTAMP', 'comment' => '修改时间'))
            ->create();
    }
}
