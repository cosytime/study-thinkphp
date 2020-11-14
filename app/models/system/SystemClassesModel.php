<?php

namespace app\models\system;

use Exception;
use think\db\exception\DataNotFoundException;
use think\db\exception\DbException;
use think\db\exception\ModelNotFoundException;
use think\Model;
use think\model\concern\SoftDelete;

/**
 * 后台班级 Model
 * Class SystemClassesModel
 * @package app\models\system
 */
class SystemClassesModel extends Model
{
    /**
     * 开启软删除
     */
    use SoftDelete;

    /**
     * 软删除字段
     * @var string
     */
    protected $deleteTime = 'delete_time';

    /**
     * 数据表主键
     * @var string
     */
    protected $pk = 'class_id';

    /**
     * 模型名称
     * @var string
     */
    protected $name = 'system_classes';

    /**
     * 当前模型对应的完整数据表名称
     * @var string
     */
    protected $table = 'system_classes';

    /**
     * 班级-专业 1:1（一对一）关联
     */
    public function professions()
    {
        return $this->hasOne(SystemProfessionModel::class, 'profession_id', 'profession_id');
    }


    /**
     * 获取后台班级列表
     * @param string|integer $page 当前页
     * @param string|integer $psize 每页数量
     * @param array $where 条件
     * @param string|null $field 所需字段
     * @param string|null $withoutField 排除字段
     * @return mixed 班级列表
     * @throws DbException
     * @author hangwei
     */
    public static function getClassesList($page, $psize, $where, $field = null, $withoutField = null)
    {
        return self::where($where)->with(['professions' => function ($query) {
            $query->field(['system_profession.profession_id,system_profession.profession_name'])->bind(['profession_name']);
        }])->field($field)->withoutField($withoutField)->order('class_sort')->paginate(['list_rows' => $psize, 'page' => $page]);
    }

    /**
     * 通过条件查询班级信息
     * @param array $where 查询条件
     * @param array|string $field 所需字段
     * @return mixed 班级信息
     * @throws DataNotFoundException
     * @throws DbException
     * @throws ModelNotFoundException
     * @author hangwei
     */
    public static function getClassesInfoByField($where = ['class_id' => null], $field = null)
    {
        return self::where($where)->field($field)->find();
    }

    /**
     * 通过条件查询班级列表
     * @param array $where 查询条件
     * @param array|string $field 所需字段
     * @return mixed 班级列表
     * @throws DataNotFoundException
     * @throws DbException
     * @throws ModelNotFoundException
     * @author hangwei
     */
    public static function getClassesListByField($where = ['class_id' => null], $field = null)
    {
        return self::where($where)->field($field)->order('class_sort')->select();
    }

    /**
     * 修改班级
     * @param array $query 参数
     * @param string $class_id 班级ID
     * @param array $only 仅允许更新的字段
     * @return mixed
     * @author hangwei
     */
    public static function updateClasses($query, $class_id, $only = [])
    {
        return self::update($query, ['class_id' => $class_id], $only);
    }

    /**
     * 新增班级
     * @param array $query 参数
     * @param array $only 仅允许写入的字段
     * @return mixed
     * @author hangwei
     */
    public static function createClasses($query, $only)
    {
        return self::create($query, $only);
    }

    /**
     * 删除班级
     * @param array $query 参数
     * @return mixed
     * @throws Exception
     * @author hangwei
     */
    public static function deleteClasses($query)
    {
        return self::destroy($query);
    }

}
