<?php

namespace app\admin\controller\v1\recruit;

use app\BaseController;
use app\models\recruit\RecruitConfigModel;

/**
 * @title 招新系统配置管理
 * @desc 后台招新系统配置管理模块
 * Class RecruitConfigController
 * @package app\admin\controller\v1\recruit
 */
class RecruitConfigController extends BaseController
{
    /**
     * @title 获取招新系统配置
     * @desc 后台招新管理之招新系统配置
     * @author hangwei
     */
    public function getRecruitConfig()
    {
        $data = RecruitConfigModel::getRecruitInfoByField(['type' => '1']);
        return ReturnJson($data);
    }

    /**
     * @title 更新招新系统配置
     * @desc 后台招新管理之更新招新系统配置
     * @author hangwei
     */
    public function updateRecruitConfig()
    {
        $params = request()->param();
        RecruitConfigModel::updateRecruitConfig($params, $params['id'], ['status', 'cover', 'code', 'title', 'address', 'begin_time', 'end_time', 'grade', 'class', 'func', 'contact', 'content', 'detail', 'schedule', 'close_tip', 'note']);
        return ReturnJson();
    }

}