<?php

use think\migration\Migrator;

class ArticleCategory extends Migrator
{

    public function change()
    {
        $table = $this->table('article_category', array('id' => false, 'primary_key' => ['category_id'], 'comment' => '文章类别表'));
        $table
            ->addColumn('category_id', 'biginteger', array('limit' => 20, 'identity' => true, 'signed' => false, 'comment' => '类别ID'))
            ->addColumn('parent_id', 'biginteger', array('limit' => 20, 'null' => true,'default' => '0', 'comment' => '父级ID'))
            ->addColumn('category_name', 'string', array('limit' => 255, 'null' => true, 'comment' => '类别名称'))
            ->addColumn('category_sort', 'biginteger', array('limit' => 20, 'default' => 0, 'null' => false, 'comment' => '分类显示顺序'))
            ->addColumn('category_type', 'string', array('limit' => 2, 'default' => '1', 'null' => false, 'comment' => '系统内置（0是，1否）'))
            ->addColumn('desc', 'string', array('limit' => 500, 'null' => true, 'comment' => '类别描述'))
            ->addColumn('status', 'string', array('limit' => 2, 'null' => false, 'default' => '0', 'comment' => '类别状态（0正常，1禁用）'))
            ->addColumn('create_by', 'string', array('limit' => 64, 'null' => true, 'comment' => '创建者'))
            ->addColumn('update_by', 'string', array('limit' => 64, 'null' => true, 'comment' => '更新者'))
            ->addColumn('delete_time', 'timestamp', array('null' => true, 'comment' => '删除时间（软删除）'))
            ->addColumn('create_time', 'timestamp', array('default' => 'CURRENT_TIMESTAMP', 'comment' => '创建时间'))
            ->addColumn('update_time', 'timestamp', array('default' => 'CURRENT_TIMESTAMP', 'update' => 'CURRENT_TIMESTAMP', 'comment' => '更新时间'))
            ->create();
    }
}
