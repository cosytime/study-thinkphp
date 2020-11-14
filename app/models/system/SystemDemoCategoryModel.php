<?php

namespace app\models\system;

use Exception;
use think\db\exception\DbException;
use think\Model;
use think\model\concern\SoftDelete;

/**
 * 案例分类 Model
 * Class SystemDemoCategoryModel
 * @package app\models\system
 */
class SystemDemoCategoryModel extends Model
{
    use SoftDelete; // 开启软删除

    /**
     * 数据表主键
     * @var string
     */
    protected $pk = 'category_id';

    /**
     * 模型名称
     * @var string
     */
    protected $name = 'system_demo_category';

    /**
     * 当前模型对应的完整数据表名称
     * @var string
     */
    protected $table = 'system_demo_category';

    /**
     * 获取案例分类列表
     * @param string|integer $page 当前页
     * @param string|integer $psize 每页数量
     * @param array $where 条件
     * @param string|null $field 所需字段
     * @param string|null $withoutField 排除字段
     * @return mixed 案例分类列表
     * @throws DbException
     * @author hangwei
     */
    public static function getDemoCategoryList($page, $psize, $where, $field = null, $withoutField = null)
    {
        return self::where($where)->field($field)->withoutField($withoutField)->order('category_sort')->paginate(['list_rows' => $psize, 'page' => $page,]);
    }

    /**
     * 通过条件查询案例分类信息
     * @param array $where 查询条件
     * @param array|string $field 所需字段
     * @return mixed 案例分类信息
     * @throws DbException
     * @author hangwei
     */
    public static function getDemoCategoryByField($where = ['category_id' => null], $field = null)
    {
        return self::where($where)->field($field)->find();
    }

    /**
     * 修改案例分类
     * @param array $query 参数
     * @param string $category_id 案例分类ID
     * @param array $only 仅允许更新的字段
     * @return mixed
     * @author hangwei
     */
    public static function updateDemoCategory($query, $category_id, $only = [])
    {
        return self::update($query, ['category_id' => $category_id], $only);
    }

    /**
     * 新增案例分类
     * @param array $query 参数
     * @param array $only 仅允许写入的字段
     * @return mixed
     * @author hangwei
     */
    public static function createDemoCategory($query, $only)
    {
        return self::create($query, $only);
    }

    /**
     * 删除案例分类
     * @param array $query 参数
     * @return mixed
     * @throws Exception
     * @author hangwei
     */
    public static function deleteDemoCategory($query)
    {
        return self::where('category_id', 'in', $query)->delete();
    }

}
