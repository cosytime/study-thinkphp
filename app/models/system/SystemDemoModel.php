<?php

namespace app\models\system;

use Exception;
use think\db\exception\DataNotFoundException;
use think\db\exception\DbException;
use think\db\exception\ModelNotFoundException;
use think\Model;
use think\model\concern\SoftDelete;

/**
 * 案例 Model
 * Class SystemDemoModel
 * @package app\models\system
 */
class SystemDemoModel extends Model
{
    use SoftDelete;

    // 开启软删除

    /**
     * 数据表主键
     * @var string
     */
    protected $pk = 'demo_id';

    /**
     * 模型名称
     * @var string
     */
    protected $name = 'system_demo';

    /**
     * 当前模型对应的完整数据表名称
     * @var string
     */
    protected $table = 'system_demo';

    /**
     * 案例-案例分类 1:1（一对一）关联
     */
    public function categorys()
    {
        return $this->hasOne(SystemDemoCategoryModel::class, 'category_id', 'category_id');
    }

    /**
     * 获取案例列表
     * @param string|integer $page 当前页
     * @param string|integer $psize 每页数量
     * @param array $where 条件
     * @param array $whereOr 或条件
     * @param string|null $field 所需字段
     * @param string|null $withoutField 排除字段
     * @return mixed 案例列表
     * @throws DbException
     * @author hangwei
     */
    public static function getDemoList($page, $psize, $where = [], $whereOr = [], $field = null, $withoutField = null)
    {
        return self::whereOr($whereOr)->where($where)->with(['categorys' => function ($query) {
            $query->field(['system_demo_category.category_id,system_demo_category.category_name'])->bind(['category_name']);
        }])->field($field)->withoutField($withoutField)->order('demo_sort')->paginate(['list_rows' => $psize, 'page' => $page,]);
    }

    /**
     * 获取最新指定条数案例列表
     * @param array $where 条件
     * @param int $limit 条数
     * @param string|null $field 所需字段
     * @param string|null $withoutField 排除字段
     * @return mixed 案例列表
     * @throws DataNotFoundException
     * @throws DbException
     * @throws ModelNotFoundException
     * @author hangwei
     */
    public static function getDemoListByLimit($where, $limit = 10, $field = null, $withoutField = null)
    {
        return self::where($where)->with(['categorys' => function ($query) {
            $query->field(['system_demo_category.category_id,system_demo_category.category_name'])->bind(['category_name']);
        }])->field($field)->withoutField($withoutField)->order(['create_time' => 'desc', 'demo_sort' => 'asc'])->limit($limit)->select();
    }

    /**
     * 通过条件查询案例信息
     * @param array $where 查询条件
     * @param array|string $field 所需字段
     * @return mixed 案例信息
     * @throws DataNotFoundException
     * @throws DbException
     * @throws ModelNotFoundException
     * @author hangwei
     */
    public static function getDemoByField($where = ['demo_id' => null], $field = null)
    {
        return self::where($where)->with(['categorys' => function ($query) {
            $query->field(['system_demo_category.category_id,system_demo_category.category_name'])->bind(['category_name']);
        }])->field($field)->find();
    }


    /**
     * 模糊查询案例名称列表
     * @param array $where 模糊查询条件
     * @param array|string $field 所需字段
     * @return mixed 案例信息
     * @throws DataNotFoundException
     * @throws DbException
     * @throws ModelNotFoundException
     * @author hangwei
     */
    public static function getDemoListByLike($where = null, $field = null)
    {
        return self::whereOr($where)->with(['categorys' => function ($query) {
            $query->field(['system_demo_category.category_id,system_demo_category.category_name'])->bind(['category_name']);
        }])->field($field)->select();
    }

    /**
     * 修改案例
     * @param array $query 参数
     * @param string $demo_id 案例ID
     * @param array $only 仅允许更新的字段
     * @return mixed
     * @author hangwei
     */
    public static function updateDemo($query, $demo_id, $only = [])
    {
        return self::update($query, ['demo_id' => $demo_id], $only);
    }

    /**
     * 新增案例
     * @param array $query 参数
     * @param array $only 仅允许写入的字段
     * @return mixed
     * @author hangwei
     */
    public static function createDemo($query, $only)
    {
        return self::create($query, $only);
    }

    /**
     * 删除案例
     * @param array $query 参数
     * @return mixed
     * @throws Exception
     * @author hangwei
     */
    public static function deleteDemo($query)
    {
        return self::where('demo_id', 'in', $query)->delete();
    }

}
