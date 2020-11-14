<?php

namespace app\admin\controller\v1\user;

use app\BaseController;
use app\models\system\SystemUserModel;

/**
 * @title 后台用户信息相关
 * @desc 后台用户信息相关模块
 * Class UserInfoController
 * @package app\api\controller\user
 */
class UserInfoController extends BaseController
{
    /**
     * @title 通过UID获取用户信息及权限列表
     * @desc 获取用户信息
     * @author hangwei
     */
    public function getUserInfo()
    {
        $userInfo = SystemUserModel::getUserInfoByUid(request()->uid, ['M', 'C', 'F'], 'user_id,user_name,nick_name,signature,email,phone,sex,avatar,status');
        if ($userInfo->status === '1') {
            return ReturnJson(null, 30003, '账户已被禁用');
        }
        unset($userInfo->status);
        $data = [
            'user_id' => $userInfo->user_id,
            'user_name' => $userInfo->user_name,
            'nick_name' => $userInfo->nick_name,
            'signature' => $userInfo->signature,
            'email' => $userInfo->email,
            'phone' => $userInfo->phone,
            'sex' => $userInfo->sex,
            'avatar' => $userInfo->avatar,
        ];
        $roleObj = [];
        $permissionObj = [];
        foreach ($userInfo->roles as $role) {
            $roleItem = [
                'role_id' => $role->role_id,
                'role_name' => $role->role_name,
                'role_key' => $role->role_key
            ];
            array_push($roleObj, $roleItem);
            foreach ($role->permissions as $permission) {
                if (!ArrayInArrays($permissionObj, $permission, 'menu_id')) {
                    array_push($permissionObj, $permission);
                }
            }
        }
        $typeC = [];
        $typeCC = [];
        $typeF = [];
        foreach ($permissionObj as $permission) {
            if ($permission['menu_type'] === 'C') {
                array_push($typeC, [
                    'permissionId' => $permission['permission'],
                    'permissionName' => $permission['name'],
                    'actions' => '[]',
                    'actionEntitySet' => [],
                    'actionList' => null,
                    'dataAccess' => null,
                    'menu_id' => $permission['menu_id']
                ]);
                array_push($typeCC, [
                    'permissionId' => $permission['permission'],
                    'permissionName' => $permission['name'],
                    'actions' => '[]',
                    'actionEntitySet' => [],
                    'actionList' => null,
                    'dataAccess' => null
                ]);
            } else if ($permission['menu_type'] === 'F') {
                array_push($typeF, $permission);
            }
        }
        foreach ($typeF as $f) {
            foreach ($typeC as $k => $v) {
                if ($f['parent_id'] === $v['menu_id']) {
                    array_push($typeCC[$k]['actionEntitySet'], ['action' => $f['permission'], 'describe' => $f['name']]);
                }
            }
        }
        $data['role']['roles'] = $roleObj;
        $data['role']['permissions'] = array_merge($typeCC);
        return ReturnJson($data);
    }

    /**
     * @title 通过ID获取用户菜单
     * @desc 获取用户菜单列表
     * @author hangwei
     */
    public function getUserMenu()
    {
        $userInfo = SystemUserModel::getUserInfoByUid(request()->uid, ['G', 'M', 'C'], 'user_id', true);
        $data = [];
        foreach ($userInfo->roles as $role) {
            foreach ($role->permissions as $permission) {
                if (!ArrayInArrays($data, $permission, 'menu_id')) {
                    array_push($data, $permission);
                }
            }
        }
        return ReturnJson($data);
    }

}
