<?php

namespace app\admin\controller\v1\common;

use app\BaseController;
use app\models\system\SystemClassesModel;
use app\models\system\SystemDeptModel;
use app\models\system\SystemMenuModel;
use app\models\system\SystemProfessionModel;
use app\models\system\SystemRoleModel;
use think\db\exception\DataNotFoundException;
use think\db\exception\DbException;
use think\db\exception\ModelNotFoundException;

/**
 * @title 选项列表
 * @desc 选项列表相关模块
 * Class CommonOptionController
 * @package app\admin\controller\common
 */
class CommonOptionController extends BaseController
{

    /**
     * @title 获取选项列表
     * @desc 获取选项列表
     * @param string $type 选项类型（role 角色，dept 部门，menu 菜单，menuPerm 菜单权限，profession 专业）
     * @return mixed 选项列表
     * @throws DataNotFoundException
     * @throws DbException
     * @throws ModelNotFoundException
     * @author hangwei
     */
    public function getOptionList($type)
    {
        $data = [];
        if ($type === 'role') {
            $data = SystemRoleModel::getRoleListByField(['status' => '0'], 'role_id,role_name');
        } else if ($type === 'dept') {
            $data = SystemDeptModel::getDeptListByField(['status' => '0'], 'dept_id,dept_name');
        } else if ($type === 'menu') {
            $data = SystemMenuModel::getMenuList([['status', '=', '0'], ['menu_type', 'in', ['G', 'M', 'C']]], 'menu_id,parent_id,title', null);
        } else if ($type === 'menuPerm') {
            $data = SystemMenuModel::getMenuList([['status', '=', '0'], ['menu_type', 'in', ['M', 'C', 'F']]], 'menu_id,parent_id,title', null);
        } else if ($type === 'profession') {
            $data = SystemProfessionModel::getProfessionListByField([['status', '=', '0'], ['delete_time', '=', NULL]], 'profession_id,profession_name');
        } else if ($type === 'classes') {
            $data = SystemClassesModel::getClassesListByField([['status', '=', '0'], ['delete_time', '=', NULL]], 'class_id,class_name,class_grade');
        }
        return ReturnJson($data);
    }

}
