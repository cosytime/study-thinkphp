<?php

namespace app\api\controller\v1\system;

use app\BaseController;
use app\models\system\SystemDemoCategoryModel;

/**
 * @title 案例分类
 * @desc 案例分类模块
 * Class SystemDemoCategoryController
 * @package app\api\controller\system
 */
class SystemDemoCategoryController extends BaseController
{
    /**
     * @title 获取案例分类列表
     * @desc 获取案例分类列表接口
     * @author hangwei
     */
    public function getDemoCategoryList()
    {
        $data = SystemDemoCategoryModel::getDemoCategoryList(1, 999, [['delete_time', '=', NULL], ['status', '=', 0]], 'category_id as id,category_name as name,category_color as color,category_badge as badge,icon');
        return ReturnJson($data);
    }
}
