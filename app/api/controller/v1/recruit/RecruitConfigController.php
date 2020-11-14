<?php

namespace app\api\controller\v1\recruit;

use app\BaseController;
use app\models\recruit\RecruitConfigModel;
use app\models\recruit\RecruitListModel;
use think\facade\Cache;

/**
 * @title 招新系统信息
 * @desc 招新系统信息模块
 * Class RecruitConfigController
 * @package app\api\controller\v1\recruit
 */
class RecruitConfigController extends BaseController
{

    /**
     * @title 获取招新系统内容
     * @desc 获取招新系统内容接口
     * @author hangwei
     */
    public function getRecruitInfo()
    {
        $data = RecruitConfigModel::getRecruitInfoByField(['type' => '1'], ['id,status,cover,code,title,address,begin_time,end_time,grade,class,func,contact,content,detail,schedule,close_tip,note']);
        if ($data['status'] === '1') {
            return ReturnJson(['close_tip' => $data['close_tip'], 'status' => $data['status']], 30009, '招新系统暂未开放');
        }
        $recruitCount = RecruitListModel::getRecruitCount();
        $data['count_recruit'] = $recruitCount;
        Cache::inc('kfzx:api:recruit:count_see');
        $data['count_see'] = Cache::remember('kfzx:api:recruit:count_see', 0);
        unset($data['close_tip']);
        return ReturnJson($data);
    }

    /**
     * @title 获取招新系统内容
     * @desc 获取招新系统内容接口
     * @author hangwei
     */
    public function getRecruitIntro()
    {
        $data = RecruitConfigModel::getRecruitInfoByField(['type' => '1'], ['cover,title,grade']);
        return ReturnJson($data);
    }

}
