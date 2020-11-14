<?php

use think\migration\Migrator;
use think\migration\db\Column;

class SystemDept extends Migrator
{

    public function change()
    {
        $table = $this->table('system_dept', array('id' => false, 'primary_key' => ['dept_id'], 'comment' => '部门表'));
        $table
            ->addColumn('dept_id', 'biginteger', array('limit' => 20, 'identity' => true, 'signed' => false, 'comment' => '部门ID'))
            ->addColumn('parent_id', 'biginteger', array('limit' => 20, 'default' => 0, 'null' => true, 'comment' => '父级部门ID'))
            ->addColumn('ancestors', 'biginteger', array('limit' => 50, 'null' => true, 'comment' => '祖级列表'))
            ->addColumn('dept_name', 'string', array('limit' => 30, 'null' => false, 'comment' => '部门名称'))
            ->addColumn('dept_sort', 'biginteger', array('limit' => 20, 'default' => 0, 'null' => false, 'comment' => '显示顺序'))
            ->addColumn('leader', 'string', array('limit' => 20, 'null' => true, 'comment' => '负责人'))
            ->addColumn('phone', 'string', array('limit' => 11, 'null' => true, 'comment' => '联系电话'))
            ->addColumn('email', 'string', array('limit' => 50, 'null' => true, 'comment' => '邮箱'))
            ->addColumn('status', 'string', array('limit' => 2, 'default' => '0', 'null' => false, 'comment' => '部门状态（0正常，1停用）'))
            ->addColumn('dept_type', 'string', array('limit' => 2, 'default' => '1', 'null' => false, 'comment' => '系统内置（0是，1否）'))
            ->addColumn('create_by', 'string', array('limit' => 64, 'null' => true, 'comment' => '创建者'))
            ->addColumn('update_by', 'string', array('limit' => 64, 'null' => true, 'comment' => '更新者'))
            ->addColumn('remark', 'string', array('limit' => 500, 'null' => true, 'comment' => '备注'))
            ->addColumn('delete_time', 'timestamp', array('null' => true, 'comment' => '删除时间（软删除）'))
            ->addColumn('create_time', 'timestamp', array('default' => 'CURRENT_TIMESTAMP', 'comment' => '创建时间'))
            ->addColumn('update_time', 'timestamp', array('default' => 'CURRENT_TIMESTAMP', 'update' => 'CURRENT_TIMESTAMP', 'comment' => '修改时间'))
            ->create();
    }
}
