<?php

namespace app\admin\controller\v1\system;

use app\admin\validate\v1\system\Dept\getDeptListValidate;
use app\admin\validate\v1\system\Dept\updateDeptValidate;
use app\admin\validate\v1\system\Dept\createDeptValidate;
use app\admin\validate\v1\system\Dept\deleteDeptValidate;
use app\BaseController;
use app\models\system\SystemDeptModel;
use Exception;
use think\exception\ValidateException;
use think\facade\Db;

/**
 * @title 部门管理
 * @desc 后台部门管理模块
 * Class SystemDeptController
 * @package app\api\controller\system
 */
class SystemDeptController extends BaseController
{
    /**
     * @title 获取部门列表
     * @desc 后台部门管理之获取部门列表
     * @author hangwei
     */
    public function getDeptList()
    {
        $params = request()->param();
        try {
            validate(getDeptListValidate::class)->batch(true)->check($params);
        } catch (ValidateException $e) {
            // 验证失败 输出错误信息
            return returnJson($e->getError(), 10006, '请求参数校验不通过');
        }
        $where = CreateWhere($params, ['dept_name', 'status']);
        $depts = SystemDeptModel::getDeptList($params['page'], $params['psize'], $where, null, 'create_by,update_by,delete_time,update_time');
        return ReturnJson($depts);
    }

    /**
     * @title 更新部门
     * @desc 后台部门管理之更新部门
     * @author hangwei
     */
    public function updateDept()
    {
        $params = request()->param();
        try {
            validate(updateDeptValidate::class)->batch(true)->check($params);
        } catch (ValidateException $e) {
            // 验证失败 输出错误信息
            return returnJson($e->getError(), 10006, '请求参数校验不通过');
        }

        $deptInfo = SystemDeptModel::getDeptInfoByField(['dept_name' => $params['dept_name']], 'dept_id');
        if (isset($deptInfo->dept_id) && $deptInfo->dept_id !== $params['dept_id']) return returnJson(null, '40003', '部门已存在');

        try {
            SystemDeptModel::updateDept($params, $params['dept_id'], ['dept_name', 'dept_sort', 'leader', 'phone', 'email', 'status', 'remark']);
            return ReturnJson();
        } catch (Exception $e) {
            return ReturnJson(null, 10007, '操作失败');
        }
    }

    /**
     * @title 新增部门
     * @desc 后台部门管理之新增部门
     * @author hangwei
     */
    public function createDept()
    {
        $params = request()->param();
        try {
            validate(createDeptValidate::class)->batch(true)->check($params);
        } catch (ValidateException $e) {
            // 验证失败 输出错误信息
            return returnJson($e->getError(), 10006, '请求参数校验不通过');
        }

        $deptInfo = SystemDeptModel::getDeptInfoByField(['dept_name' => $params['dept_name']], 'dept_id');
        if (isset($deptInfo->dept_id)) return returnJson(null, '40001', '部门已存在');

        try {
            SystemDeptModel::createDept($params, ['dept_name', 'dept_sort', 'leader', 'phone', 'email', 'status', 'remark']);
            return ReturnJson();
        } catch (Exception $e) {
            return ReturnJson(null, 10007, '操作失败');
        }
    }

    /**
     * @title 删除部门
     * @desc 后台部门管理之删除部门
     * @author hangwei
     */
    public function deleteDept()
    {
        $params = request()->param();
        try {
            validate(deleteDeptValidate::class)->batch(true)->check($params);
        } catch (ValidateException $e) {
            // 验证失败 输出错误信息
            return returnJson($e->getError(), 10006, '请求参数校验不通过');
        }

        Db::startTrans(); // 启动事务
        try {
            SystemDeptModel::deleteDept($params['dept_id']);
            Db::name('system_user')->where('dept_id', 'in', $params['dept_id'])->update(['dept_id' => 1]);
            Db::commit(); // 提交事务
            return ReturnJson();
        } catch (Exception $e) {
            Db::rollback(); // 回滚事务
            return ReturnJson(null, 10007, '操作失败');
        }
    }
}
