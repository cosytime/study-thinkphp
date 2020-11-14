<?php

namespace app\admin\controller\v1\recruit;

use app\admin\validate\v1\recruit\Listes\deleteRecruitListValidate;
use app\admin\validate\v1\recruit\Listes\ReviewRecruitListValidate;
use app\BaseController;
use app\models\recruit\RecruitListModel;
use Exception;
use think\exception\ValidateException;

/**
 * @title 招新列表管理
 * @desc 后台招新列表管理模块
 * Class RecruitListController
 * @package app\admin\controller\v1\recruit
 */
class RecruitListController extends BaseController
{
    /**
     * @title 获取报名信息列表
     * @desc 后台招新管理之报名信息列表
     * @author hangwei
     */
    public function getRecruitList()
    {
        $params = request()->param();
        $createWhere = CreateWhere($params, ['name', 'profession', 'grade', 'class', 'sex', 'student_id', 'status']);
        $where = array_merge([['delete_time', '=', NULL]], $createWhere);
        $list = RecruitListModel::getRecruitList($params['page'], $params['psize'], $where, null, 'create_by,update_by,delete_time,update_time');
        return ReturnJson($list);
    }

    /**
     * @title 删除报名信息
     * @desc 后台招新管理之删除报名信息
     * @author hangwei
     */
    public function deleteRecruitList()
    {
        $params = request()->param();
        try {
            validate(deleteRecruitListValidate::class)->batch(true)->check($params);
        } catch (ValidateException $e) {
            // 验证失败 输出错误信息
            return returnJson($e->getError(), 10006, '请求参数校验不通过');
        }

        RecruitListModel::deleteRecruitList([['recruit_id', 'in', $params['recruit_id']]]);
        return ReturnJson();
    }

    /**
     * @title 审核报名信息
     * @desc 后台招新管理之审核报名信息
     * @param string $type 类型（pass 通过，reject 拒绝）
     * @return string|string[]
     * @author hangwei
     */
    public function reviewRecruitList($type)
    {
        $params = request()->param();
        try {
            validate(ReviewRecruitListValidate::class)->batch(true)->check($params);
        } catch (ValidateException $e) {
            // 验证失败 输出错误信息
            return returnJson($e->getError(), 10006, '请求参数校验不通过');
        }
        if ($type === 'pass') {
            $level = '2';
        } else if ($type === 'reject') {
            $level = '4';
        } else {
            return ReturnJson(null, 10009, '非法请求');
        }

        RecruitListModel::updateRecruitListByBatch([['recruit_id', 'in', $params['recruit_id']]], ['level' => $level]);
        return ReturnJson();
    }
}