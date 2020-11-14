<?php

namespace app\models\system;

use Exception;
use think\db\exception\DataNotFoundException;
use think\db\exception\DbException;
use think\db\exception\ModelNotFoundException;
use think\Model;
use think\model\concern\SoftDelete;

/**
 * 后台专业 Model
 * Class SystemProfessionModel
 * @package app\models\system
 */
class SystemProfessionModel extends Model
{
    use SoftDelete;

    // 开启软删除

    /**
     * 软删除字段
     * @var string
     */
    protected $deleteTime = 'delete_time';

    /**
     * 数据表主键
     * @var string
     */
    protected $pk = 'profession_id';

    /**
     * 模型名称
     * @var string
     */
    protected $name = 'system_profession';

    /**
     * 当前模型对应的完整数据表名称
     * @var string
     */
    protected $table = 'system_profession';

    /**
     * 获取后台专业列表
     * @param string|integer $page 当前页
     * @param string|integer $psize 每页数量
     * @param array $where 条件
     * @param string|null $field 所需字段
     * @param string|null $withoutField 排除字段
     * @return mixed 专业列表
     * @throws DbException
     * @author hangwei
     */
    public static function getProfessionList($page, $psize, $where, $field = null, $withoutField = null)
    {
        return self::where($where)->field($field)->withoutField($withoutField)->order('profession_sort')->paginate(['list_rows' => $psize, 'page' => $page,]);
    }

    /**
     * 通过条件查询专业信息
     * @param array $where 查询条件
     * @param array|string $field 所需字段
     * @return mixed 专业信息
     * @throws DataNotFoundException
     * @throws DbException
     * @throws ModelNotFoundException
     * @author hangwei
     */
    public static function getProfessionInfoByField($where = ['profession_id' => null], $field = null)
    {
        return self::where($where)->field($field)->find();
    }

    /**
     * 通过条件查询专业列表
     * @param array $where 查询条件
     * @param array|string $field 所需字段
     * @return mixed 专业列表
     * @throws DataNotFoundException
     * @throws DbException
     * @throws ModelNotFoundException
     * @author hangwei
     */
    public static function getProfessionListByField($where = ['profession_id' => null], $field = null)
    {
        return self::where($where)->field($field)->order('profession_sort')->select();
    }

    /**
     * 修改专业
     * @param array $query 参数
     * @param string $profession_id 专业ID
     * @param array $only 仅允许更新的字段
     * @return mixed
     * @author hangwei
     */
    public static function updateProfession($query, $profession_id, $only = [])
    {
        return self::update($query, ['profession_id' => $profession_id], $only);
    }

    /**
     * 新增专业
     * @param array $query 参数
     * @param array $only 仅允许写入的字段
     * @return mixed
     * @author hangwei
     */
    public static function createProfession($query, $only)
    {
        return self::create($query, $only);
    }

    /**
     * 删除专业
     * @param array $query 参数
     * @return mixed
     * @throws Exception
     * @author hangwei
     */
    public static function deleteProfession($query)
    {
        return self::destroy($query);
    }

}
