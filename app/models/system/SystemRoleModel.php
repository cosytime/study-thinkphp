<?php

namespace app\models\system;

use app\models\pivots\SystemRole2MenuPivot;
use Exception;
use think\db\exception\DataNotFoundException;
use think\db\exception\DbException;
use think\db\exception\ModelNotFoundException;
use think\Model;

/**
 * 后台用户角色 Model
 * Class SystemRoleModel
 * @package app\models\system
 */
class SystemRoleModel extends Model
{

    /**
     * 数据表主键
     * @var string
     */
    protected $pk = 'role_id';

    /**
     * 模型名称
     * @var string
     */
    protected $name = 'system_role';

    /**
     * 当前模型对应的完整数据表名称
     * @var string
     */
    protected $table = 'system_role';

    /**
     * 角色-菜单 N:N（多对多）关联
     */
    public function permissions()
    {
        return $this->belongsToMany(SystemMenuModel::class, SystemRole2MenuPivot::class, 'menu_id', 'role_id');
    }

    /**
     * 获取后台角色列表
     * @param string|integer $page 当前页
     * @param string|integer $psize 每页数量
     * @param array $where 条件
     * @param string|null $field 所需字段
     * @param string|null $withoutField 排除字段
     * @return mixed 角色列表
     * @throws DbException
     * @author hangwei
     */
    public static function getRoleList($page, $psize, $where, $field = null, $withoutField = null)
    {
        return self::where($where)->field($field)->withoutField($withoutField)->order('role_sort')->with(['permissions' => function ($query) {
            $query->where(['status' => '0'])->order('menu_sort')->field('system_menu.menu_id')->hidden(['pivot']);
        }])->paginate([
            'list_rows' => $psize,
            'page' => $page,
        ]);
    }

    /**
     * 通过条件查询角色信息
     * @param array $where 查询条件
     * @param array|string $field 所需字段
     * @return mixed 角色信息
     * @throws DataNotFoundException
     * @throws DbException
     * @throws ModelNotFoundException
     * @author hangwei
     */
    public static function getRoleInfoByField($where = ['role_id' => null], $field = null)
    {
        return self::where($where)->field($field)->find();
    }

    /**
     * 通过条件查询角色列表
     * @param array $where 查询条件
     * @param array|string $field 所需字段
     * @return mixed 角色列表
     * @throws DataNotFoundException
     * @throws DbException
     * @throws ModelNotFoundException
     * @author hangwei
     */
    public static function getRoleListByField($where = ['role_id' => null], $field = null)
    {
        return self::where($where)->field($field)->select();
    }

    /**
     * 修改角色
     * @param array $query 参数
     * @param string $role_id 角色ID
     * @param array $only 仅允许更新的字段
     * @return mixed
     * @author hangwei
     */
    public static function updateRole($query, $role_id, $only = [])
    {
        return self::update($query, ['role_id' => $role_id], $only);
    }

    /**
     * 新增角色
     * @param array $query 参数
     * @param array $only 仅允许写入的字段
     * @return mixed
     * @author hangwei
     */
    public static function createRole($query, $only)
    {
        return self::create($query, $only);
    }

    /**
     * 删除角色
     * @param array $query 参数
     * @return mixed
     * @throws Exception
     * @author hangwei
     */
    public static function deleteRole($query)
    {
        return self::where('role_id', 'in', $query)->delete();
    }

}
