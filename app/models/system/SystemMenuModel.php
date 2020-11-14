<?php

namespace app\models\system;

use Exception;
use think\db\exception\DataNotFoundException;
use think\db\exception\DbException;
use think\db\exception\ModelNotFoundException;
use think\Model;

/**
 * 后台菜单  Model
 * Class SystemMenuModel
 * @package app\models\system
 */
class SystemMenuModel extends Model
{

    /**
     * 数据表主键
     * @var string
     */
    protected $pk = 'menu_id';

    /**
     * 模型名称
     * @var string
     */
    protected $name = 'system_menu';

    /**
     * 当前模型对应的完整数据表名称
     * @var string
     */
    protected $table = 'system_menu';

    /**
     * 获取后台菜单列表
     * @param array $where 条件
     * @param string|null $field 所需字段
     * @param string|null $withoutField 排除字段
     * @return mixed 菜单列表
     * @throws DataNotFoundException
     * @throws DbException
     * @throws ModelNotFoundException
     * @author hangwei
     */
    public static function getMenuList($where, $field = null, $withoutField = null)
    {
        return self::where($where)->field($field)->withoutField($withoutField)->order('menu_sort')->select();
    }

    /**
     * 修改菜单
     * @param array $query 参数
     * @param string $menu_id 菜单ID
     * @param array $only 仅允许更新的字段
     * @return mixed
     * @author hangwei
     */
    public static function updateMenu($query, $menu_id, $only = [])
    {
        return self::update($query, ['menu_id' => $menu_id], $only);
    }

    /**
     * 新增菜单
     * @param array $query 参数
     * @param array $only 仅允许写入的字段
     * @return mixed
     * @author hangwei
     */
    public static function createMenu($query, $only = [])
    {
        return self::create($query, $only);
    }

    /**
     * 删除菜单
     * @param array $query 参数
     * @return mixed
     * @throws Exception
     * @author hangwei
     */
    public static function deleteMenu($query)
    {
        return self::where('menu_id', 'in', $query)->delete();
    }

}