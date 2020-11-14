<?php

namespace app\models\system;

use Exception;
use think\db\exception\DataNotFoundException;
use think\db\exception\DbException;
use think\db\exception\ModelNotFoundException;
use think\Model;

/**
 * 后台部门 Model
 * Class SystemDeptModel
 * @package app\models\system
 */
class SystemDeptModel extends Model
{

    /**
     * 数据表主键
     * @var string
     */
    protected $pk = 'dept_id';

    /**
     * 模型名称
     * @var string
     */
    protected $name = 'system_dept';

    /**
     * 当前模型对应的完整数据表名称
     * @var string
     */
    protected $table = 'system_dept';

    /**
     * 获取后台部门列表
     * @param string|integer $page 当前页
     * @param string|integer $psize 每页数量
     * @param array $where 条件
     * @param string|null $field 所需字段
     * @param string|null $withoutField 排除字段
     * @return mixed 部门列表
     * @throws DbException
     * @author hangwei
     */
    public static function getDeptList($page, $psize, $where, $field = null, $withoutField = null)
    {
        return self::where($where)->field($field)->withoutField($withoutField)->order('dept_sort')->paginate(['list_rows' => $psize, 'page' => $page,]);
    }

    /**
     * 通过条件查询部门列表
     * @param array $where 查询条件
     * @param array|string $field 所需字段
     * @return mixed 部门列表
     * @throws DataNotFoundException
     * @throws DbException
     * @throws ModelNotFoundException
     * @author hangwei
     */
    public static function getDeptListByField($where = ['dept_id' => null], $field = null)
    {
        return self::where($where)->field($field)->select();
    }

    /**
     * 通过条件查询部门信息
     * @param array $where 查询条件
     * @param array|string $field 所需字段
     * @return mixed 部门信息
     * @throws DataNotFoundException
     * @throws DbException
     * @throws ModelNotFoundException
     * @author hangwei
     */
    public static function getDeptInfoByField($where = ['dept_id' => null], $field = null)
    {
        return self::where($where)->field($field)->find();
    }

    /**
     * 修改部门
     * @param array $query 参数
     * @param string $dept_id 部门ID
     * @param array $only 仅允许更新的字段
     * @return mixed
     * @author hangwei
     */
    public static function updateDept($query, $dept_id, $only = [])
    {
        return self::update($query, ['dept_id' => $dept_id], $only);
    }

    /**
     * 新增部门
     * @param array $query 参数
     * @param array $only 仅允许写入的字段
     * @return mixed
     * @author hangwei
     */
    public static function createDept($query, $only)
    {
        return self::create($query, $only);
    }

    /**
     * 删除部门
     * @param array $query 参数
     * @return mixed
     * @throws Exception
     * @author hangwei
     */
    public static function deleteDept($query)
    {
        return self::where('dept_id', 'in', $query)->delete();
    }

}
