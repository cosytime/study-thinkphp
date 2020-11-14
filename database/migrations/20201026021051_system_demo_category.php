<?php

use think\migration\Migrator;

class SystemDemoCategory extends Migrator
{

    public function change()
    {
        $table = $this->table('system_demo_category', array('id' => false, 'primary_key' => ['category_id'], 'comment' => '案例分类表'));
        $table
            ->addColumn('category_id', 'biginteger', array('limit' => 20, 'identity' => true, 'signed' => false, 'comment' => '分类ID'))
            ->addColumn('category_name', 'string', array('limit' => 50, 'null' => false, 'comment' => '分类名称'))
            ->addColumn('category_color', 'string', array('limit' => 50, 'null' => true, 'comment' => '分类标记颜色'))
            ->addColumn('category_badge', 'string', array('limit' => 50, 'null' => true, 'comment' => '分类标记'))
            ->addColumn('parent_id', 'biginteger', array('limit' => 20, 'null' => false, 'default' => 0, 'comment' => '上级分类ID'))
            ->addColumn('icon', 'string', array('limit' => 128, 'null' => false, 'comment' => '分类图标'))
            ->addColumn('category_sort', 'biginteger', array('limit' => 20, 'default' => 0, 'null' => false, 'comment' => '分类显示顺序'))
            ->addColumn('desc', 'string', array('limit' => 500, 'null' => true, 'comment' => '分类描述'))
            ->addColumn('status', 'string', array('limit' => 2, 'null' => false, 'default' => '0', 'comment' => '分类状态（0正常，1禁用）'))
            ->addColumn('create_by', 'string', array('limit' => 64, 'null' => true, 'comment' => '创建者'))
            ->addColumn('update_by', 'string', array('limit' => 64, 'null' => true, 'comment' => '更新者'))
            ->addColumn('delete_time', 'timestamp', array('null' => true, 'comment' => '删除时间（软删除）'))
            ->addColumn('create_time', 'timestamp', array('default' => 'CURRENT_TIMESTAMP', 'comment' => '创建时间'))
            ->addColumn('update_time', 'timestamp', array('default' => 'CURRENT_TIMESTAMP', 'update' => 'CURRENT_TIMESTAMP', 'comment' => '更新时间'))
            ->create();
    }
}
