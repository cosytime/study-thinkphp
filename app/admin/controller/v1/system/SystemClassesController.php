<?php

namespace app\admin\controller\v1\system;

use app\admin\validate\v1\system\Classes\getClassesListValidate;
use app\admin\validate\v1\system\Classes\updateClassesValidate;
use app\admin\validate\v1\system\Classes\createClassesValidate;
use app\admin\validate\v1\system\Classes\deleteClassesValidate;
use app\BaseController;
use app\models\system\SystemClassesModel;
use Exception;
use think\exception\ValidateException;

/**
 * @title 班级管理
 * @desc 后台班级管理模块
 * Class SystemClassesController
 * @package app\api\controller\v1\system
 */
class SystemClassesController extends BaseController
{

    /**
     * @title 获取班级列表
     * @desc 后台班级管理之获取班级列表
     * @author hangwei
     */
    public function getClassesList()
    {
        $params = request()->param();
        try {
            validate(getClassesListValidate::class)->batch(true)->check($params);
        } catch (ValidateException $e) {
            // 验证失败 输出错误信息
            return returnJson($e->getError(), 10006, '请求参数校验不通过');
        }
        $createWhere = CreateWhere($params, ['class_name', 'profession_id', 'class_grade', 'status']);
        $where = array_merge([['delete_time', '=', NULL]], $createWhere);
        $class = SystemClassesModel::getClassesList($params['page'], $params['psize'], $where, null, 'create_by,update_by,delete_time,update_time');
        return ReturnJson($class);
    }

    /**
     * @title 更新班级
     * @desc 后台班级管理之更新班级
     * @author hangwei
     */
    public function updateClasses()
    {
        $params = request()->param();
        try {
            validate(updateClassesValidate::class)->batch(true)->check($params);
        } catch (ValidateException $e) {
            // 验证失败 输出错误信息
            return returnJson($e->getError(), 10006, '请求参数校验不通过');
        }

        $classInfo = SystemClassesModel::getClassesInfoByField(['class_name' => $params['class_name']], 'class_id');
        if (isset($classInfo->class_id) && $classInfo->class_id !== $params['class_id']) return returnJson(null, '40006', '班级已存在');

        try {
            SystemClassesModel::updateClasses($params, $params['class_id'], ['class_name', 'class_abbr', 'profession_id', 'class_grade', 'class_sort', 'status', 'remark']);
            return ReturnJson();
        } catch (Exception $e) {
            return ReturnJson(null, 10007, '操作失败');
        }
    }

    /**
     * @title 新增班级
     * @desc 后台班级管理之新增班级
     * @author hangwei
     */
    public function createClasses()
    {
        $params = request()->param();
        try {
            validate(createClassesValidate::class)->batch(true)->check($params);
        } catch (ValidateException $e) {
            // 验证失败 输出错误信息
            return returnJson($e->getError(), 10006, '请求参数校验不通过');
        }

        $classInfo = SystemClassesModel::getClassesInfoByField(['class_name' => $params['class_name']], 'class_id');
        if (isset($classInfo->class_id)) return returnJson(null, '40006', '班级已存在');

        try {
            SystemClassesModel::createClasses($params, ['class_name', 'class_abbr', 'profession_id', 'class_grade', 'class_sort', 'status', 'remark']);
            return ReturnJson();
        } catch (Exception $e) {
            return ReturnJson(null, 10007, '操作失败');
        }
    }

    /**
     * @title 删除班级
     * @desc 后台班级管理之删除班级
     * @author hangwei
     */
    public function deleteClasses()
    {
        $params = request()->param();
        try {
            validate(deleteClassesValidate::class)->batch(true)->check($params);
        } catch (ValidateException $e) {
            // 验证失败 输出错误信息
            return returnJson($e->getError(), 10006, '请求参数校验不通过');
        }

        try {
            SystemClassesModel::deleteClasses($params['class_id']);
            return ReturnJson();
        } catch (Exception $e) {
            return ReturnJson(null, 10007, '操作失败');
        }
    }
}
