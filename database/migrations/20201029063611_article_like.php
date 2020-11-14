<?php

use think\migration\Migrator;

class ArticleLike extends Migrator
{

    public function change()
    {
        $table = $this->table('article_like', array('id' => false, 'primary_key' => ['like_id'], 'comment' => '文章操作记录表'));
        $table
            ->addColumn('like_id', 'biginteger', array('limit' => 20, 'identity' => true, 'signed' => false, 'comment' => '操作ID'))
            ->addColumn('article_id', 'biginteger', array('limit' => 20, 'null' => true, 'comment' => '文章ID'))
            ->addColumn('comment_id', 'biginteger', array('limit' => 20, 'null' => true, 'comment' => '评论ID'))
            ->addColumn('user_id', 'biginteger', array('limit' => 20, 'null' => false, 'comment' => '用户ID'))
            ->addColumn('type', 'string', array('limit' => 500, 'null' => true, 'comment' => '操作类型（1 文章收藏，2 文章点赞，3 评论点赞）'))
            ->addColumn('desc', 'string', array('limit' => 500, 'null' => true, 'comment' => '操作描述'))
            ->addColumn('status', 'string', array('limit' => 2, 'null' => false, 'default' => '0', 'comment' => '操作状态（0正常，1禁用）'))
            ->addColumn('create_by', 'string', array('limit' => 64, 'null' => true, 'comment' => '创建者'))
            ->addColumn('update_by', 'string', array('limit' => 64, 'null' => true, 'comment' => '更新者'))
            ->addColumn('delete_time', 'timestamp', array('null' => true, 'comment' => '删除时间（软删除）'))
            ->addColumn('create_time', 'timestamp', array('default' => 'CURRENT_TIMESTAMP', 'comment' => '创建时间'))
            ->addColumn('update_time', 'timestamp', array('default' => 'CURRENT_TIMESTAMP', 'update' => 'CURRENT_TIMESTAMP', 'comment' => '更新时间'))
            ->create();
    }
}
