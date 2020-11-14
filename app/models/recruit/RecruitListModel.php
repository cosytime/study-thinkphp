<?php

namespace app\models\recruit;

use Exception;
use think\db\exception\DataNotFoundException;
use think\db\exception\DbException;
use think\db\exception\ModelNotFoundException;
use think\Model;

/**
 * 报名 Model
 * Class RecruitListModel
 * @package app\models\recruit
 */
class RecruitListModel extends Model
{

    /**
     * 数据表主键
     * @var string $pk
     */
    protected $pk = 'recruit_id';

    /**
     * 模型名称
     * @var string $name
     */
    protected $name = 'recruit_list';

    /**
     * 当前模型对应的完整数据表名称
     * @var string $table
     */
    protected $table = 'recruit_list';

    /**
     * 获取报名列表
     * @param string|integer $page 当前页
     * @param string|integer $psize 每页数量
     * @param array $where 条件
     * @param string|null $field 所需字段
     * @param string|null $withoutField 排除字段
     * @return mixed 报名列表
     * @throws DbException
     * @author hangwei
     */
    public static function getRecruitList($page, $psize, $where, $field = null, $withoutField = null)
    {
        return self::where($where)->field($field)->withoutField($withoutField)->order('create_time')->paginate(['list_rows' => $psize, 'page' => $page]);
    }

    /**
     * 通过条件查询报名信息
     * @param array $where 查询条件
     * @param array|string $field 所需字段
     * @return mixed 报名信息
     * @throws DataNotFoundException
     * @throws DbException
     * @throws ModelNotFoundException
     */
    public static function getRecruitByField($where = ['uid' => null], $field = null)
    {
        return self::where($where)->field($field)->find();
    }

    /**
     * 统计报名人数
     * @return mixed 报名人数
     */
    public static function getRecruitCount()
    {
        return self::where([['delete_time', '=', NULL], ['year', '=', date("Y")]])->count();
    }

    /**
     * 新增报名信息
     * @param array $query 参数
     * @param array $only 仅允许写入的字段
     * @return mixed
     * @author hangwei
     */
    public static function createRecruit($query, $only)
    {
        return self::create($query, $only);
    }

    /**
     * 批量修改报名信息
     * @param array $where 条件
     * @param array $query 参数
     * @return mixed
     * @author hangwei
     */
    public static function updateRecruitListByBatch($where, $query)
    {
        return self::where($where)->update($query);
    }

    /**
     * 删除报名信息
     * @param array $where 条件
     * @return mixed
     * @throws Exception
     * @author hangwei
     */
    public static function deleteRecruitList($where)
    {
        return self::where($where)->update(['delete_time' => date('Y-m-d H:i:s')]);
    }

}