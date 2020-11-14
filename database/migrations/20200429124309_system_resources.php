<?php

use think\migration\Migrator;

class SystemResources extends Migrator
{
    public function change()
    {
        $table = $this->table('system_resources', array('id' => false, 'primary_key' => ['id'], 'comment' => '资源信息表'));
        $table
            ->addColumn('resource_id', 'integer', array('limit' => 11, 'identity' => true, 'signed' => false, 'comment' => '资源ID'))
            ->addColumn('uid', 'integer', array('limit' => 255, 'null' => false, 'comment' => '上传者ID'))
            ->addColumn('utype', 'string', array('limit' => 1, 'null' => false, 'comment' => '上传者身份（0 前台用户，1 后台管理员）'))
            ->addColumn('name', 'string', array('limit' => 128, 'null' => false, 'comment' => '资源名称'))
            ->addColumn('url', 'string', array('limit' => 128, 'null' => false, 'comment' => '所在相对路径'))
            ->addColumn('size', 'integer', array('limit' => 11, 'null' => false, 'comment' => '资源大小'))
            ->addColumn('mime', 'string', array('limit' => 20, 'null' => false, 'comment' => 'MIME信息'))
            ->addColumn('type', 'string', array('limit' => 1, 'null' => false, 'comment' => '资源类型（1 图片，2 视频，3 音乐，4 文档，5 压缩包，6 文件，7 其他）'))
            ->addColumn('width', 'integer', array('limit' => 8, 'null' => true, 'comment' => '宽度（仅视频，图片）'))
            ->addColumn('height', 'integer', array('limit' => 8, 'null' => true, 'comment' => '高度（仅视频，图片）'))
            ->addColumn('count', 'integer', array('limit' => 1, 'null' => false, 'default' => 0, 'comment' => '引用次数'))
            ->addColumn('time', 'string', array('limit' => 11, 'null' => false, 'comment' => '上传时间'))
            ->addColumn('exp_time', 'string', array('limit' => 11, 'null' => false, 'default' => '4691404800', 'comment' => '有效期至（默认至2118年09月01日 00:00:00）'))
            ->addColumn('status', 'string', array('limit' => 2, 'null' => false, 'default' => '0', 'comment' => '状态（0正常，1停用）'))
            ->addColumn('delete_time', 'timestamp', array('null' => true, 'comment' => '删除时间（软删除）'))
            ->create();
    }
}
