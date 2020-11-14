<?php

use think\migration\Migrator;

class SystemDemo extends Migrator
{

    public function change()
    {
        $table = $this->table('system_demo', array('id' => false, 'primary_key' => ['demo_id'], 'comment' => '案例表'));
        $table
            ->addColumn('demo_id', 'biginteger', array('limit' => 20, 'identity' => true, 'signed' => false, 'comment' => '案例ID'))
            ->addColumn('category_id', 'biginteger', array('limit' => 20, 'null' => false, 'comment' => '分类ID'))
            ->addColumn('demo_name', 'string', array('limit' => 128, 'null' => false, 'comment' => '案例名称'))
            ->addColumn('demo_cover', 'string', array('limit' => 500, 'null' => false, 'comment' => '案例封面'))
            ->addColumn('demo_images', 'string', array('limit' => 500, 'null' => false, 'comment' => '案例轮播图'))
            ->addColumn('demo_sort', 'biginteger', array('limit' => 20, 'default' => 0, 'null' => false, 'comment' => '案例显示顺序'))
            ->addColumn('demo_status', 'string', array('limit' => 2, 'default' => '1', 'null' => false, 'comment' => '开发状态（1 即将开始，2 开发中，3 已完成，4 等待处理）'))
            ->addColumn('author', 'string', array('limit' => 500, 'null' => true, 'comment' => '案例开发者'))
            ->addColumn('work', 'string', array('limit' => 500, 'null' => true, 'comment' => '分工'))
            ->addColumn('multi', 'string', array('limit' => 128, 'null' => true, 'comment' => '多端'))
            ->addColumn('keyword', 'string', array('limit' => 500, 'null' => true, 'comment' => '关键词'))
            ->addColumn('detail', 'text', array('comment' => '案例详情内容'))
            ->addColumn('other', 'text', array('comment' => '案例其他说明'))
            ->addColumn('start_time', 'string', array('limit' => 11, 'null' => false, 'comment' => '开始时间'))
            ->addColumn('end_time', 'string', array('limit' => 11, 'null' => false, 'comment' => '完成时间'))
            ->addColumn('exp_start_time', 'string', array('limit' => 11, 'null' => false, 'comment' => '预计开始时间'))
            ->addColumn('exp_end_time', 'string', array('limit' => 11, 'null' => false, 'comment' => '预计完成时间'))
            ->addColumn('desc', 'string', array('limit' => 500, 'null' => true, 'comment' => '案例描述'))
            ->addColumn('status', 'string', array('limit' => 2, 'null' => false, 'default' => '0', 'comment' => '案例状态（0正常，1禁用）'))
            ->addColumn('create_by', 'string', array('limit' => 64, 'null' => true, 'comment' => '创建者'))
            ->addColumn('update_by', 'string', array('limit' => 64, 'null' => true, 'comment' => '更新者'))
            ->addColumn('delete_time', 'timestamp', array('null' => true, 'comment' => '删除时间（软删除）'))
            ->addColumn('create_time', 'timestamp', array('default' => 'CURRENT_TIMESTAMP', 'comment' => '创建时间'))
            ->addColumn('update_time', 'timestamp', array('default' => 'CURRENT_TIMESTAMP', 'update' => 'CURRENT_TIMESTAMP', 'comment' => '更新时间'))
            ->create();
    }
}
