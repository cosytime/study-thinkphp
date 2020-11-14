<?php

namespace app\api\controller\v1\system;

use app\BaseController;
use app\models\system\SystemDemoCategoryModel;
use app\models\system\SystemDemoModel;
use think\db\exception\DataNotFoundException;
use think\db\exception\DbException;
use think\db\exception\ModelNotFoundException;

/**
 * @title 案例
 * @desc 案例模块
 * Class SystemDemoController
 * @package app\api\controller\system
 */
class SystemDemoController extends BaseController
{
    /**
     * @title 获取案例列表
     * @desc 获取案例列表
     * @author hangwei
     */
    public function getDemoList()
    {
        $params = request()->param();
        if (isset($params['category_ids'])) {
            $params['category_ids'] = json_decode($params['category_ids']);
        }
        $where = [['delete_time', '=', NULL], ['status', '=', 0]];
        if (isset($params['demo_status'])) {
            array_push($where, ['demo_status', 'in', json_decode($params['demo_status'])]);
        }
        $whereOr = [];
        if (isset($params['search_key'])) {
            array_push($whereOr, ['demo_name', '=', $params['search_key']]);
            $categorys = SystemDemoCategoryModel::getDemoCategoryList(1, 999, [['category_name', 'like', '%' . $params['search_key'] . '%']], 'category_id');
            $category_idList = [];
            foreach ($categorys as $category) {
                array_push($category_idList, $category['category_id']);
            }
            if (isset($params['category_ids'])) {
                array_push($category_idList, $params['category_ids']);
            }
            array_push($whereOr, ['category_id', 'in', $category_idList]);
        }
        $data = SystemDemoModel::getDemoList(1, 10, $where, $whereOr, 'demo_id,category_id,demo_name,demo_cover,demo_images,demo_status,author,multi,keyword,detail,other,start_time,end_time,exp_start_time,exp_end_time');
        return ReturnJson($data);
    }

    /**
     * @title 获取最新指定条数案例列表
     * @desc 获取最新指定条数案例列表
     * @param integer $limit 条数
     * @return string|string[]
     * @throws DataNotFoundException
     * @throws DbException
     * @throws ModelNotFoundException
     * @author hangwei
     */
    public function getDemoListByLimit($limit)
    {
        $data = SystemDemoModel::getDemoListByLimit([['delete_time', '=', NULL], ['status', '=', 0]], $limit, 'demo_id,category_id,demo_name,demo_cover,author');
        return ReturnJson($data);
    }

    /**
     * @title 获取案例
     * @desc 获取案例
     * @author hangwei
     */
    public function getDemo()
    {
        $params = request()->param();
        $data = SystemDemoModel::getDemoByField(['demo_id' => $params['demo_id']], 'demo_id,category_id,demo_name,demo_cover,demo_images,demo_status,author,work,multi,keyword,detail,other,start_time,end_time,exp_start_time,exp_end_time');
        return ReturnJson($data);
    }

    /**
     * @title 获取案例关键词
     * @desc 获取案例关键词
     * @author hangwei
     */
    public function getDemoKeyWord()
    {
        $params = request()->param();
        $data = SystemDemoModel::getDemoListByLike([['demo_name', 'like', '%' . $params['keyword'] . '%'], ['keyword', 'like', '%' . $params['keyword'] . '%'], ['other', 'like', '%' . $params['keyword'] . '%']], 'demo_id,category_id,demo_name,keyword');
        return ReturnJson($data);
    }
}
