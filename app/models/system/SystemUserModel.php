<?php

namespace app\models\system;

use app\models\pivots\SystemUser2RolePivot;
use Exception;
use think\db\exception\DataNotFoundException;
use think\db\exception\DbException;
use think\db\exception\ModelNotFoundException;
use think\model\concern\SoftDelete;
use think\Model;

/**
 * 后台用户 Model
 * Class SystemUserModel
 * @package app\models\system
 */
class SystemUserModel extends Model
{
    use SoftDelete; // 开启软删除

    /**
     * 软删除字段
     * @var string
     */
    protected $deleteTime = 'delete_time';

    /**
     * 数据表主键
     * @var string
     */
    protected $pk = 'user_id';

    /**
     * 模型名称
     * @var string
     */
    protected $name = 'system_user';

    /**
     * 当前模型对应的完整数据表名称
     * @var string
     */
    protected $table = 'system_user';

    /**
     * 用户-角色 N:N（多对多）关联
     */
    public function roles()
    {
        return $this->belongsToMany(SystemRoleModel::class, SystemUser2RolePivot::class, 'role_id', 'user_id');
    }


    /**
     * 通过条件查询用户信息
     * @param array $where 查询条件
     * @param array|string $field 所需字段
     * @return mixed 用户信息
     * @throws DataNotFoundException
     * @throws DbException
     * @throws ModelNotFoundException
     * @author hangwei
     */
    public static function getUserInfoByField($where = ['user_id' => null], $field = null)
    {
        return self::where($where)->field($field)->find();
    }

    /**
     * 查询用户信息、角色及菜单权限信息
     * @param string $uid 用户ID
     * @param array $menuType 菜单类型
     * @param array|string $field 所需字段
     * @param bool $menuOrPerm 菜单还是权限（false 菜单，true 权限）
     * @return mixed 用户信息
     * @throws DataNotFoundException
     * @throws DbException
     * @throws ModelNotFoundException
     * @author hangwei
     */
    public static function getUserInfoByUid($uid, $menuType, $field = null, $menuOrPerm = false)
    {
        $menuField = $menuOrPerm ? 'system_menu.menu_id,system_menu.parent_id,system_menu.path,system_menu.name,system_menu.redirect,system_menu.component,system_menu.title,system_menu.icon,system_menu.hidden,system_menu.hidden_children,system_menu.keep_alive,system_menu.permission,system_menu.target,system_menu.is_frame' : 'system_menu.menu_id,system_menu.parent_id,system_menu.name,system_menu.permission,system_menu.menu_type';
        return self::where(['user_id' => $uid])->with(['roles' => function ($query) use ($menuField, $menuType) {
            $query->with(['permissions' => function ($query) use ($menuField, $menuType) {
                $query->where(['menu_type' => $menuType, 'status' => '0'])->order('menu_sort')->field($menuField)->hidden(['pivot']);
            }])->where(['status' => '0'])->order('role_sort')->field('system_role.role_id,system_role.role_name,system_role.role_name,system_role.role_key')->hidden(['pivot']);
        }])->field($field)->find();
    }

    /**
     * 获取后台用户列表
     * @param string|integer $page 当前页
     * @param string|integer $psize 每页数量
     * @param array $where 条件
     * @param string|null $field 所需字段
     * @param string|null $withoutField 排除字段
     * @return mixed 用户列表
     * @throws DbException
     * @author hangwei
     */
    public static function getUserList($page, $psize, $where, $field = null, $withoutField = null)
    {
        return self::where($where)->field($field)->withoutField($withoutField)->with(['roles' => function ($query) {
            $query->where(['status' => '0'])->order('role_sort')->field('system_role.role_id,system_role.role_name')->hidden(['pivot']);
        }])->paginate([
            'list_rows' => $psize,
            'page' => $page,
        ]);
    }

    /**
     * 修改用户
     * @param array $query 参数
     * @param string $user_id 用户ID
     * @param array $only 仅允许更新的字段
     * @return mixed
     * @author hangwei
     */
    public static function updateUser($query, $user_id, $only = [])
    {
        return self::update($query, ['user_id' => $user_id], $only);
    }

    /**
     * 新增用户
     * @param array $query 参数
     * @param array $only 仅允许写入的字段
     * @return mixed
     * @author hangwei
     */
    public static function createUser($query, $only = [])
    {
        return self::create($query, $only);
    }

    /**
     * 删除用户
     * @param array $query 参数
     * @return mixed
     * @throws Exception
     * @author hangwei
     */
    public static function deleteUser($query)
    {
        return self::destroy($query);
    }

}