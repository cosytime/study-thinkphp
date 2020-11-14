<?php

use think\migration\Migrator;

class SystemClasses extends Migrator
{

    public function change()
    {
        $table = $this->table('system_classes', array('id' => false, 'primary_key' => ['class_id'], 'comment' => '班级表'));
        $table
            ->addColumn('class_id', 'biginteger', array('limit' => 20, 'identity' => true, 'signed' => false, 'comment' => '班级ID'))
            ->addColumn('class_name', 'string', array('limit' => 50, 'null' => false, 'comment' => '班级名称'))
            ->addColumn('profession_id', 'bigint', array('limit' => 20, 'null' => false, 'comment' => '所属专业'))
            ->addColumn('class_grade', 'string', array('limit' => 50, 'null' => false, 'comment' => '所属年级'))
            ->addColumn('class_abbr', 'string', array('limit' => 50, 'null' => false, 'comment' => '班级简称'))
            ->addColumn('class_sort', 'biginteger', array('limit' => 20, 'default' => 0, 'null' => false, 'comment' => '班级显示顺序'))
            ->addColumn('status', 'string', array('limit' => 2, 'null' => false, 'default' => '0', 'comment' => '班级状态（0正常，1禁用）'))
            ->addColumn('remark', 'string', array('limit' => 500, 'null' => true, 'comment' => '备注'))
            ->addColumn('create_by', 'string', array('limit' => 64, 'null' => true, 'comment' => '创建者'))
            ->addColumn('update_by', 'string', array('limit' => 64, 'null' => true, 'comment' => '更新者'))
            ->addColumn('delete_time', 'timestamp', array('null' => true, 'comment' => '删除时间（软删除）'))
            ->addColumn('create_time', 'timestamp', array('default' => 'CURRENT_TIMESTAMP', 'comment' => '创建时间'))
            ->addColumn('update_time', 'timestamp', array('default' => 'CURRENT_TIMESTAMP', 'update' => 'CURRENT_TIMESTAMP', 'comment' => '修改时间'))
            ->create();
    }
}
