<?php

use think\migration\Migrator;

class  WxUser extends Migrator
{

    public function change()
    {
        $table = $this->table('wx_user', array('id' => false, 'primary_key' => ['id'], 'comment' => '微信用户表'));
        $table
            ->addColumn('wx_id', 'integer', array('limit' => 10, 'identity' => true, 'signed' => false, 'comment' => '微信用户ID'))
            ->addColumn('openid', 'string', array('limit' => 30, 'null' => false, 'default' => NULL, 'comment' => '用户的标识，对当前公众号唯一'))
            ->addColumn('nickname', 'string', array('limit' => 64, 'null' => false, 'default' => '', 'comment' => '用户昵称'))
            ->addColumn('sex', 'integer', array('limit' => 1, 'null' => false, 'default' => 0, 'comment' => '用户性别(0 未知，1 男，2 女)'))
            ->addColumn('language', 'string', array('limit' => 64, 'null' => false, 'default' => 'ZH_CN', 'comment' => '用户的语言，简体中文为ZH_CN'))
            ->addColumn('city', 'string', array('limit' => 64, 'null' => true, 'default' => '', 'comment' => '用户所在城市'))
            ->addColumn('province', 'string', array('limit' => 64, 'null' => true, 'default' => '', 'comment' => '用户所在省份'))
            ->addColumn('country', 'string', array('limit' => 64, 'null' => true, 'default' => '', 'comment' => '用户所在国家'))
            ->addColumn('headimgurl', 'text', array('null' => true, 'comment' => '用户头像'))
            ->addColumn('subscribe_time', 'integer', array('limit' => 10, 'null' => true, 'default' => NULL, 'comment' => '关注公众号时间'))
            ->addColumn('unionid', 'string', array('limit' => 30, 'null' => true, 'default' => NULL, 'comment' => '只有在用户将公众号绑定到微信开放平台帐号后，才会出现该字段'))
            ->addColumn('remark', 'string', array('limit' => 256, 'null' => true, 'default' => NULL, 'comment' => '公众号运营者对粉丝的备注，公众号运营者可在微信公众平台用户管理界面对粉丝添加备注'))
            ->addColumn('groupid', 'integer', array('limit' => 5, 'null' => true, 'default' => 0, 'comment' => '用户所在的分组ID（兼容旧的用户分组接口）'))
            ->addColumn('tagid_list', 'string', array('limit' => 256, 'null' => true, 'default' => NULL, 'comment' => '用户被打上的标签ID列表'))
            ->addColumn('subscribe_scene', 'string', array('limit' => 64, 'null' => true, 'comment' => '返回用户关注的渠道来源，ADD_SCENE_SEARCH 公众号搜索，ADD_SCENE_ACCOUNT_MIGRATION 公众号迁移，ADD_SCENE_PROFILE_CARD 名片分享，ADD_SCENE_QR_CODE 扫描二维码，ADD_SCENE_PROFILE_LINK 图文页内名称点击，ADD_SCENE_PROFILE_ITEM 图文页右上角菜单，ADD_SCENE_PAID 支付后关注，ADD_SCENE_WECHAT_ADVERTISEMENT 微信广告，ADD_SCENE_OTHERS 其他'))
            ->addColumn('qr_scene', 'integer', array('limit' => 64, 'null' => true, 'comment' => '二维码扫码场景（开发者自定义）'))
            ->addColumn('qr_scene_str', 'integer', array('limit' => 64, 'null' => true, 'comment' => '二维码扫码场景描述（开发者自定义）'))
            ->addColumn('create_time', 'timestamp', array('default' => 'CURRENT_TIMESTAMP', 'comment' => '创建时间'))
            ->addColumn('update_time', 'timestamp', array('default' => 'CURRENT_TIMESTAMP', 'update' => 'CURRENT_TIMESTAMP', 'comment' => '修改时间'))
            ->create();
    }
}
