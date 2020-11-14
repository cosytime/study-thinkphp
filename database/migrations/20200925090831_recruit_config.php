<?php

use think\migration\Migrator;

class RecruitConfig extends Migrator
{
    public function change()
    {
        $table = $this->table('recruit_config', array('id' => false, 'primary_key' => ['id'], 'comment' => '招新系统配置表'));
        $table
            ->addColumn('id', 'biginteger', array('limit' => 20, 'identity' => true, 'signed' => false, 'comment' => '配置ID'))
            ->addColumn('status', 'string', array('limit' => 2, 'null' => false, 'default' => '1', 'comment' => '系统状态（0开放，1关闭）'))
            ->addColumn('cover', 'string', array('limit' => 255, 'null' => false, 'comment' => '封面'))
            ->addColumn('title', 'string', array('limit' => 255, 'null' => false, 'comment' => '标题'))
            ->addColumn('address', 'string', array('limit' => 120, 'null' => false, 'comment' => '地点'))
            ->addColumn('begin_time', 'string', array('limit' => 11, 'null' => true, 'comment' => '起始时间'))
            ->addColumn('end_time', 'string', array('limit' => 11, 'null' => true, 'comment' => '截止时间'))
            ->addColumn('grade', 'string', array('limit' => 128, 'null' => false, 'comment' => '开放年级'))
            ->addColumn('class', 'string', array('limit' => 128, 'null' => false, 'comment' => '开放班级'))
            ->addColumn('func', 'string', array('limit' => 2, 'null' => false, 'default' => '1', 'comment' => '活动方式（1线上，2线下，3线上&线下）'))
            ->addColumn('contact', 'string', array('limit' => 40, 'null' => false, 'comment' => '联系方式'))
            ->addColumn('content', 'string', array('limit' => 800, 'null' => false, 'comment' => '内容简介'))
            ->addColumn('detail', 'text', array('comment' => '图文介绍（详情信息）'))
            ->addColumn('schedule', 'text', array('comment' => '活动日程'))
            ->addColumn('close_tip', 'text', array('comment' => '未开放提示'))
            ->addColumn('note', 'text', array('comment' => '注意事项'))
            ->addColumn('type', 'string', array('limit' => 2, 'null' => true, 'comment' => '类型（0默认配置，1现有配置）'))
            ->addColumn('create_time', 'timestamp', array('default' => 'CURRENT_TIMESTAMP', 'comment' => '创建时间'))
            ->addColumn('update_time', 'timestamp', array('default' => 'CURRENT_TIMESTAMP', 'update' => 'CURRENT_TIMESTAMP', 'comment' => '修改时间'))
            ->create();
    }
}
