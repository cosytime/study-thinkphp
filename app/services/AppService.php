<?php

namespace app\services;

use app\utils\{ConfigUtil, UploadUtil, WeChatUtil};
use think\Service;

/**
 * app全局服务类
 * Class AppService
 * @package app\services
 */
class AppService extends Service
{

    /**
     * 注册服务
     */
    public $bind = [
        'upload' => UploadUtil::class, // 上传
        'getConfig' => ConfigUtil::class, // 获取系统配置
        'wechatApi' => WeChatUtil::class, // 微信接口调用
    ];

    /**
     * 启动服务
     */
    public function boot()
    {
    }
}
