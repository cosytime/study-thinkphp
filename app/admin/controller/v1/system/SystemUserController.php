<?php

namespace app\admin\controller\v1\system;

use app\admin\validate\v1\system\User\createUserValidate;
use app\admin\validate\v1\system\User\deleteUserValidate;
use app\admin\validate\v1\system\User\getUserListValidate;
use app\admin\validate\v1\system\User\updateUserValidate;
use app\BaseController;
use app\models\system\SystemUserModel;
use think\exception\ValidateException;
use think\facade\Db;

/**
 * @title 用户管理
 * @desc 后台管理员用户管理模块
 * Class SystemUserController
 * @package app\api\controller\system
 */
class SystemUserController extends BaseController
{

    /**
     * @title 获取用户列表
     * @desc 后台用户管理之获取用户列表
     * @author hangwei
     */
    public function getUserList()
    {
        $params = request()->param();
        try {
            validate(getUserListValidate::class)->batch(true)->check($params);
        } catch (ValidateException $e) {
            // 验证失败 输出错误信息
            return returnJson($e->getError(), 10006, '请求参数校验不通过');
        }
        $createWhere = CreateWhere($params, ['nick_name', 'status', 'user_name', 'phone', 'email', 'dept_id']);
        $where = array_merge([['delete_time', '=', NULL]], $createWhere);
        $users = SystemUserModel::getUserList($params['page'], $params['psize'], $where, null, 'create_by,update_by,delete_time,update_time,login_ip,login_date,password');
        foreach ($users as $user) {
            $roleItem = [];
            foreach ($user->roles as $role) {
                array_push($roleItem, $role->role_id);
            }
            unset($user->roles);
            $user->roles = $roleItem;
        }
        return ReturnJson($users);
    }

    /**
     * @title 更新用户
     * @desc 后台用户管理之更新用户
     * @author hangwei
     */
    public function updateUser()
    {
        $params = request()->param();
        try {
            validate(updateUserValidate::class)->batch(true)->check($params);
        } catch (ValidateException $e) {
            // 验证失败 输出错误信息
            return returnJson($e->getError(), 10006, '请求参数校验不通过');
        }
        $userInfo = SystemUserModel::getUserInfoByField(['user_name' => $params['user_name']], 'user_id');
        if (isset($userInfo->user_id) && $userInfo->user_id !== $params['user_id']) return returnJson(null, '40001', '用户已存在');

        Db::startTrans(); // 启动事务
        try {
            $only = ['user_name', 'dept_id', 'nick_name', 'signature', 'email', 'phone', 'sex', 'avatar', 'password', 'status', 'remark'];
            if (isset($params['password']) && $params['password']) {
                array_push($only, 'password');
                $params['password'] = md5('kf2018zx' . md5($params['password'] . '85'));
            }
            $user = SystemUserModel::updateUser($params, $params['user_id'], $only);
            $roleList = [];
            foreach ($params['roles'] as $role) {
                array_push($roleList, ['user_id' => $user->user_id, 'role_id' => $role]);
            }
            Db::table('system_user_role')->where('user_id', $params['user_id'])->delete();
            Db::name('system_user_role')->insertAll($roleList);
            Db::commit(); // 提交事务
            return ReturnJson();
        } catch (\Exception $e) {
            Db::rollback(); // 回滚事务
            return ReturnJson(null, 10007, '操作失败');
        }
    }

    /**
     * @title 新增用户
     * @desc 后台用户管理之新增用户
     * @author hangwei
     */
    public function createUser()
    {
        $params = request()->param();
        try {
            validate(createUserValidate::class)->batch(true)->check($params);
        } catch (ValidateException $e) {
            // 验证失败 输出错误信息
            return returnJson($e->getError(), 10006, '请求参数校验不通过');
        }
        $userInfo = SystemUserModel::getUserInfoByField(['user_name' => $params['user_name']], 'user_id');
        if (isset($userInfo->user_id)) return returnJson(null, '40001', '用户已存在');

        Db::startTrans(); // 启动事务
        try {
            $params['password'] = md5('kf2018zx' . md5($params['password'] . '85'));
            $user = SystemUserModel::createUser($params, ['user_name', 'dept_id', 'nick_name', 'signature', 'email', 'phone', 'sex', 'avatar', 'password', 'status', 'remark']);
            $roleList = [];
            foreach ($params['roles'] as $role) {
                array_push($roleList, ['user_id' => $user->user_id, 'role_id' => $role]);
            }
            Db::name('system_user_role')->insertAll($roleList);
            Db::commit(); // 提交事务
            return ReturnJson();
        } catch (\Exception $e) {
            Db::rollback(); // 回滚事务
            return ReturnJson(null, 10007, '操作失败');
        }
    }

    /**
     * @title 删除用户
     * @desc 后台用户管理之删除用户
     * @author hangwei
     */
    public function deleteUser()
    {
        $params = request()->param();
        try {
            validate(deleteUserValidate::class)->batch(true)->check($params);
        } catch (ValidateException $e) {
            // 验证失败 输出错误信息
            return returnJson($e->getError(), 10006, '请求参数校验不通过');
        }

        Db::startTrans(); // 启动事务
        try {
            SystemUserModel::deleteUser($params['user_id']);
            Db::name('system_user_role')->where('user_id', 'in', $params['user_id'])->delete();
            Db::commit(); // 提交事务
            return ReturnJson();
        } catch (\Exception $e) {
            Db::rollback(); // 回滚事务
            return ReturnJson(null, 10007, '操作失败');
        }
    }

}
