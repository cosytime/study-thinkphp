<?php

namespace app\admin\controller\v1\system;

use app\admin\validate\v1\system\Menu\createMenuValidate;
use app\admin\validate\v1\system\Menu\deleteMenuValidate;
use app\admin\validate\v1\system\Menu\updateMenuValidate;
use app\models\system\SystemMenuModel;
use app\BaseController;
use think\exception\ValidateException;

/**
 * @title 菜单管理
 * @desc 后台菜单管理模块
 * Class SystemMenuController
 * @package app\api\controller\system
 */
class SystemMenuController extends BaseController
{

    /**
     * @title 获取菜单列表
     * @desc 后台菜单管理之获取菜单列表
     * @author hangwei
     */
    public function getMenuList()
    {
        $data = SystemMenuModel::getMenuList(null, null, 'create_by,update_by,update_time');
        return ReturnJson($data);
    }

    /**
     * @title 更新菜单
     * @desc 后台菜单管理之更新菜单
     * @author hangwei
     */
    public function updateMenu()
    {
        $params = request()->param();
        if ($params['menu_type'] === 'G') {
            $scene = 'G';
            $only = ['parent_id', 'name', 'menu_type', 'menu_sort', 'title', 'remark'];
        } else if ($params['menu_type'] === 'M') {
            $scene = 'M';
            $only = ['parent_id', 'name', 'menu_type', 'menu_sort', 'hidden', 'hidden_children', 'keep_alive', 'is_frame', 'path', 'title', 'permission', 'component', 'redirect', 'icon', 'status', 'remark'];
        } else if ($params['menu_type'] === 'C') {
            $scene = 'C';
            $only = ['parent_id', 'name', 'menu_type', 'menu_sort', 'hidden', 'hidden_children', 'keep_alive', 'is_frame', 'target', 'path', 'title', 'component', 'permission', 'redirect', 'icon', 'status', 'remark'];
        } else if ($params['menu_type'] === 'F') {
            $scene = 'F';
            $only = ['parent_id', 'menu_type', 'menu_sort', 'title', 'permission', 'status', 'remark'];
        } else {
            return returnJson(['menu_type' => '菜单类型值必须在[\'G\',\'M\',\'C\',\'F\']中'], 10006, '请求参数校验不通过');
        }
        try {
            validate(updateMenuValidate::class)->batch(true)->scene($scene)->check($params);
        } catch (ValidateException $e) {
            // 验证失败 输出错误信息
            return returnJson($e->getError(), 10006, '请求参数校验不通过');
        }
        SystemMenuModel::updateMenu($params, $params['menu_id'], $only);
        return ReturnJson();
    }

    /**
     * @title 新增菜单
     * @desc 后台菜单管理之新增菜单
     * @author hangwei
     */
    public function createMenu()
    {
        $params = request()->param();
        if ($params['menu_type'] === 'G') {
            $scene = 'G';
            $only = ['parent_id', 'name', 'menu_type', 'menu_sort', 'title', 'remark'];
        } else if ($params['menu_type'] === 'M') {
            $scene = 'M';
            $only = ['parent_id', 'name', 'menu_type', 'menu_sort', 'hidden', 'hidden_children', 'keep_alive', 'is_frame', 'path', 'title', 'component', 'permission', 'redirect', 'icon', 'status', 'remark'];
        } else if ($params['menu_type'] === 'C') {
            $scene = 'C';
            $only = ['parent_id', 'name', 'menu_type', 'menu_sort', 'hidden', 'hidden_children', 'keep_alive', 'is_frame', 'target', 'path', 'title', 'component', 'permission', 'redirect', 'icon', 'status', 'remark'];
        } else if ($params['menu_type'] === 'F') {
            $scene = 'F';
            $only = ['parent_id', 'menu_type', 'menu_sort', 'title', 'permission', 'status', 'remark'];
        } else {
            return returnJson(['menu_type' => '菜单类型值必须在[\'G\',\'M\',\'C\',\'F\']中'], 10006, '请求参数校验不通过');
        }
        try {
            validate(createMenuValidate::class)->batch(true)->scene($scene)->check($params);
        } catch (ValidateException $e) {
            // 验证失败 输出错误信息
            return returnJson($e->getError(), 10006, '请求参数校验不通过');
        }
        SystemMenuModel::createMenu($params, $only);
        return ReturnJson();
    }

    /**
     * @title 删除菜单
     * @desc 后台菜单管理之删除菜单
     * @author hangwei
     */
    public function deleteMenu()
    {
        try {
            validate(deleteMenuValidate::class)->batch(true)->check(request()->param());
        } catch (ValidateException $e) {
            // 验证失败 输出错误信息
            return returnJson($e->getError(), 10006, '请求参数校验不通过');
        }
        $query = request()->param('menu_id');
        SystemMenuModel::deleteMenu($query);
        return ReturnJson();
    }

}
