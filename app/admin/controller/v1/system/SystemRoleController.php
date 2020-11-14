<?php

namespace app\admin\controller\v1\system;

use app\admin\validate\v1\system\Role\createRoleValidate;
use app\admin\validate\v1\system\Role\deleteRoleValidate;
use app\admin\validate\v1\system\Role\getRoleListValidate;
use app\admin\validate\v1\system\Role\updateRoleValidate;
use app\BaseController;
use app\models\system\SystemRoleModel;
use think\exception\ValidateException;
use think\facade\Db;

/**
 * @title 角色管理
 * @desc 后台角色管理模块
 * Class SystemRoleController
 * @package app\api\controller\system
 */
class SystemRoleController extends BaseController
{
    /**
     * @title 获取角色列表
     * @desc 后台角色管理之获取角色列表
     * @author hangwei
     */
    public function getRoleList()
    {
        $params = request()->param();
        try {
            validate(getRoleListValidate::class)->batch(true)->check($params);
        } catch (ValidateException $e) {
            // 验证失败 输出错误信息
            return returnJson($e->getError(), 10006, '请求参数校验不通过');
        }
        $where = CreateWhere($params, ['role_name', 'status']);
        $roles = SystemRoleModel::getRoleList($params['page'], $params['psize'], $where, null, 'create_by,update_by,delete_time,update_time');
        foreach ($roles as $roleKey => $role) {
            $menuItem = [];
            foreach ($role->permissions as $permissionKey => $permission) {
                array_push($menuItem, $permission['menu_id']);
            }
            unset($roles[$roleKey]['permissions']);
            $roles[$roleKey]['permissions'] = $menuItem;
        }
        return ReturnJson($roles);
    }

    /**
     * @title 更新角色
     * @desc 后台角色管理之更新角色
     * @author hangwei
     */
    public function updateRole()
    {
        $params = request()->param();
        try {
            validate(updateRoleValidate::class)->batch(true)->check($params);
        } catch (ValidateException $e) {
            // 验证失败 输出错误信息
            return returnJson($e->getError(), 10006, '请求参数校验不通过');
        }

        Db::startTrans(); // 启动事务
        try {
            SystemRoleModel::updateRole($params, $params['role_id'], ['role_name', 'role_key', 'role_sort', 'status', 'remark']);
            $roleMenu = [];
            foreach ($params['permissions'] as $permission) {
                array_push($roleMenu, ['role_id' => $params['role_id'], 'menu_id' => $permission]);
            }
            Db::table('system_role_menu')->where('role_id', $params['role_id'])->delete();
            Db::name('system_role_menu')->insertAll($roleMenu);
            Db::commit(); // 提交事务
            return ReturnJson();
        } catch (\Exception $e) {
            Db::rollback(); // 回滚事务
            return ReturnJson(null, 10007, '操作失败');
        }
    }

    /**
     * @title 新增角色
     * @desc 后台角色管理之新增角色
     * @author hangwei
     */
    public function createRole()
    {
        $params = request()->param();
        try {
            validate(createRoleValidate::class)->batch(true)->check($params);
        } catch (ValidateException $e) {
            // 验证失败 输出错误信息
            return returnJson($e->getError(), 10006, '请求参数校验不通过');
        }
        $roleInfo = SystemRoleModel::getRoleInfoByField(['role_name' => $params['role_name']], 'role_id');
        if (isset($roleInfo->role_id)) return returnJson(null, '40002', '角色已存在');

        Db::startTrans(); // 启动事务
        try {
            $role = SystemRoleModel::createRole($params, ['role_name', 'role_key', 'role_sort', 'status', 'remark']);
            $roleMenu = [];
            foreach ($params['permissions'] as $permission) {
                array_push($roleMenu, ['role_id' => $role->role_id, 'menu_id' => $permission]);
            }
            Db::name('system_role_menu')->insertAll($roleMenu);
            Db::commit(); // 提交事务
            return ReturnJson();
        } catch (\Exception $e) {
            Db::rollback(); // 回滚事务
            return ReturnJson(null, 10007, '操作失败');
        }
    }

    /**
     * @title 删除角色
     * @desc 后台角色管理之删除角色
     * @author hangwei
     */
    public function deleteRole()
    {
        $params = request()->param();
        try {
            validate(deleteRoleValidate::class)->batch(true)->check($params);
        } catch (ValidateException $e) {
            // 验证失败 输出错误信息
            return returnJson($e->getError(), 10006, '请求参数校验不通过');
        }

        Db::startTrans(); // 启动事务
        try {
            SystemRoleModel::deleteRole($params['role_id']);
            Db::name('system_role_menu')->where('role_id', 'in', $params['role_id'])->delete();
            Db::commit(); // 提交事务
            return ReturnJson();
        } catch (\Exception $e) {
            Db::rollback(); // 回滚事务
            return ReturnJson(null, 10007, '操作失败');
        }
    }
}
