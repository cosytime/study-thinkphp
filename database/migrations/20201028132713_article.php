<?php

use think\migration\Migrator;

class Article extends Migrator
{

    public function change()
    {
        $table = $this->table('article', array('id' => false, 'primary_key' => ['article_id'], 'comment' => '文章表'));
        $table
            ->addColumn('article_id', 'biginteger', array('limit' => 20, 'identity' => true, 'signed' => false, 'comment' => '文章ID'))
            ->addColumn('category_id', 'biginteger', array('limit' => 20, 'null' => false, 'comment' => '分类ID'))
            ->addColumn('user_id', 'biginteger', array('limit' => 20, 'null' => false, 'comment' => '作者用户ID'))
            ->addColumn('article_title', 'string', array('limit' => 500, 'null' => false, 'comment' => '文章标题'))
            ->addColumn('article_cover', 'string', array('limit' => 500, 'null' => false, 'comment' => '文章封面'))
            ->addColumn('article_type', 'string', array('limit' => 2, 'null' => false, 'default' => '1', 'comment' => '文章类型（1 图文，2 视图）'))
            ->addColumn('article_imgs', 'string', array('limit' => 500, 'null' => false, 'comment' => '文章图片列表'))
            ->addColumn('is_source', 'string', array('limit' => 2, 'null' => false, 'default' => '1','comment' => '原创类型（1 原创，2 转载）'))
            ->addColumn('source', 'string', array('limit' => 500, 'null' => true, 'comment' => '文章来源'))
            ->addColumn('is_top', 'string', array('limit' => 2, 'default' => '1', 'null' => false, 'comment' => '是否置顶（0 置顶，1 不置顶）'))
            ->addColumn('video_time', 'string', array('limit' => 11, 'null' => true, 'comment' => '视频时长'))
            ->addColumn('keyword', 'string', array('limit' => 500, 'null' => true, 'comment' => '关键词'))
            ->addColumn('detail', 'text', array('comment' => '文章内容'))
            ->addColumn('see_count', 'biginteger', array('limit' => 20, 'default' => 0, 'null' => false, 'comment' => '文章浏览次数'))
            ->addColumn('desc', 'string', array('limit' => 500, 'null' => true, 'comment' => '文章描述'))
            ->addColumn('status', 'string', array('limit' => 2, 'null' => false, 'default' => '0', 'comment' => '文章状态（0正常，1禁用）'))
            ->addColumn('create_by', 'string', array('limit' => 64, 'null' => true, 'comment' => '创建者'))
            ->addColumn('update_by', 'string', array('limit' => 64, 'null' => true, 'comment' => '更新者'))
            ->addColumn('delete_time', 'timestamp', array('null' => true, 'comment' => '删除时间（软删除）'))
            ->addColumn('create_time', 'timestamp', array('default' => 'CURRENT_TIMESTAMP', 'comment' => '创建时间'))
            ->addColumn('update_time', 'timestamp', array('default' => 'CURRENT_TIMESTAMP', 'update' => 'CURRENT_TIMESTAMP', 'comment' => '更新时间'))
            ->create();
    }
}
