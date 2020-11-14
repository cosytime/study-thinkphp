<?php

namespace app\api\controller\v1\system;

use app\models\system\SystemMarketingModel;
use app\BaseController;

/**
 * @title 系统广告/轮播图/通知
 * @desc 系统广告、轮播图、系统通知模块
 * Class Marketing
 * @package app\api\controller\system
 */
class Marketing extends BaseController
{
    /**
     * @title 获取广告/轮播图/通知
     * @desc 获取广告/轮播图/通知接口
     * @author hangwei
     * @method GET
     */
    public function getCarouselOrAd()
    {
        $group = request()->param('group');
        $data = SystemMarketingModel::findByGroup($group);
        return ReturnJson($data);
    }
}
