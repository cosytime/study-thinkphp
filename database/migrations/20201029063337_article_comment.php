<?php

use think\migration\Migrator;
use think\migration\db\Column;

class ArticleComment extends Migrator
{

    public function change()
    {
        $table = $this->table('article_comment', array('id' => false, 'primary_key' => ['comment_id'], 'comment' => '文章评论表'));
        $table
            ->addColumn('comment_id', 'biginteger', array('limit' => 20, 'identity' => true, 'signed' => false, 'comment' => '评论ID'))
            ->addColumn('article_id', 'biginteger', array('limit' => 20, 'null' => false, 'comment' => '文章ID'))
            ->addColumn('parent_id', 'biginteger', array('limit' => 20, 'null' => false, 'default' => '0', 'comment' => '父级ID'))
            ->addColumn('user_id', 'biginteger', array('limit' => 20, 'null' => false, 'comment' => '用户ID'))
            ->addColumn('detail', 'text', array('comment' => '评论内容'))
            ->addColumn('desc', 'string', array('limit' => 500, 'null' => true, 'comment' => '评论描述'))
            ->addColumn('status', 'string', array('limit' => 2, 'null' => false, 'default' => '0', 'comment' => '评论状态（0正常，1禁用）'))
            ->addColumn('create_by', 'string', array('limit' => 64, 'null' => true, 'comment' => '创建者'))
            ->addColumn('update_by', 'string', array('limit' => 64, 'null' => true, 'comment' => '更新者'))
            ->addColumn('delete_time', 'timestamp', array('null' => true, 'comment' => '删除时间（软删除）'))
            ->addColumn('create_time', 'timestamp', array('default' => 'CURRENT_TIMESTAMP', 'comment' => '创建时间'))
            ->addColumn('update_time', 'timestamp', array('default' => 'CURRENT_TIMESTAMP', 'update' => 'CURRENT_TIMESTAMP', 'comment' => '更新时间'))
            ->create();
    }
}
