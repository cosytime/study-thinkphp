<?php

namespace app\api\controller\v1\system;

use app\models\system\SystemConfigModel;
use app\BaseController;

/**
 * @title 系统配置
 * @desc 系统配置模块
 * Class Config
 * @package app\api\controller\system
 */
class Config extends BaseController
{
    /**
     * @title 获取系统配置
     * @desc 获取系统配置接口
     * @author hangwei
     */
    public function getConfig()
    {
        $config_field = request()->param('config_field');
        $data = SystemConfigModel::findByConfigField($config_field);
        return ReturnJson($data);
    }
}
