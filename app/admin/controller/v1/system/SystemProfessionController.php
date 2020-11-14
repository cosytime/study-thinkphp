<?php

namespace app\admin\controller\v1\system;

use app\admin\validate\v1\system\Profession\createProfessionValidate;
use app\admin\validate\v1\system\Profession\getProfessionListValidate;
use app\admin\validate\v1\system\Profession\updateProfessionValidate;
use app\admin\validate\v1\system\Profession\deleteProfessionValidate;
use app\BaseController;
use app\models\system\SystemProfessionModel;
use think\exception\ValidateException;

/**
 * @title 专业管理
 * @desc 后台专业管理模块
 * Class SystemProfessionController
 * @package app\api\controller\system
 */
class SystemProfessionController extends BaseController
{
    /**
     * @title 获取专业列表
     * @desc 后台专业管理之获取专业列表
     * @author hangwei
     */
    public function getProfessionList()
    {
        $params = request()->param();
        try {
            validate(getProfessionListValidate::class)->batch(true)->check($params);
        } catch (ValidateException $e) {
            // 验证失败 输出错误信息
            return returnJson($e->getError(), 10006, '请求参数校验不通过');
        }
        $createWhere = CreateWhere($params, ['profession_name', 'status']);
        $where = array_merge([['delete_time', '=', NULL]], $createWhere);
        $professions = SystemProfessionModel::getProfessionList($params['page'], $params['psize'], $where, null, 'create_by,update_by,delete_time,update_time');
        return ReturnJson($professions);
    }

    /**
     * @title 更新专业
     * @desc 后台专业管理之更新专业
     * @author hangwei
     */
    public function updateProfession()
    {
        $params = request()->param();
        try {
            validate(updateProfessionValidate::class)->batch(true)->check($params);
        } catch (ValidateException $e) {
            // 验证失败 输出错误信息
            return returnJson($e->getError(), 10006, '请求参数校验不通过');
        }

        $professionInfo = SystemProfessionModel::getProfessionInfoByField(['profession_name' => $params['profession_name']], 'profession_id');
        if (isset($professionInfo->profession_id) && $professionInfo->profession_id !== $params['profession_id']) return returnJson(null, '40001', '专业已存在');

        try {
            SystemProfessionModel::updateProfession($params, $params['profession_id'], ['profession_name', 'profession_sort', 'status', 'remark']);
            return ReturnJson();
        } catch (\Exception $e) {
            return ReturnJson(null, 10007, '操作失败');
        }
    }

    /**
     * @title 新增专业
     * @desc 后台专业管理之新增专业
     * @author hangwei
     */
    public function createProfession()
    {
        $params = request()->param();
        try {
            validate(createProfessionValidate::class)->batch(true)->check($params);
        } catch (ValidateException $e) {
            // 验证失败 输出错误信息
            return returnJson($e->getError(), 10006, '请求参数校验不通过');
        }

        $professionInfo = SystemProfessionModel::getProfessionInfoByField(['profession_name' => $params['profession_name']], 'profession_id');
        if (isset($professionInfo->profession_id)) return returnJson(null, '40005', '专业已存在');

        try {
            SystemProfessionModel::createProfession($params, ['profession_name', 'profession_sort', 'status', 'remark']);
            return ReturnJson();
        } catch (\Exception $e) {
            return ReturnJson(null, 10007, '操作失败');
        }
    }

    /**
     * @title 删除专业
     * @desc 后台专业管理之删除专业
     * @author hangwei
     */
    public function deleteProfession()
    {
        $params = request()->param();
        try {
            validate(deleteProfessionValidate::class)->batch(true)->check($params);
        } catch (ValidateException $e) {
            // 验证失败 输出错误信息
            return returnJson($e->getError(), 10006, '请求参数校验不通过');
        }

        try {
            SystemProfessionModel::deleteProfession($params['profession_id']);
            return ReturnJson();
        } catch (\Exception $e) {
            return ReturnJson(null, 10007, '操作失败');
        }
    }
}
