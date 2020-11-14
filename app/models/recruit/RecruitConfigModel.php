<?php

namespace app\models\recruit;

use think\db\exception\DataNotFoundException;
use think\db\exception\DbException;
use think\db\exception\ModelNotFoundException;
use think\Model;

/**
 * 招新系统 Model
 * Class RecruitConfigModel
 * @package app\models\recruit
 */
class RecruitConfigModel extends Model
{

    /**
     * 数据表主键
     * @var string $pk
     */
    protected $pk = 'id';

    /**
     * 模型名称
     * @var string $name
     */
    protected $name = 'recruit_config';

    /**
     * 当前模型对应的完整数据表名称
     * @var string $table
     */
    protected $table = 'recruit_config';

    /**
     * 通过条件查询招新系统信息
     * @param array $where 查询条件
     * @param array|string $field 所需字段
     * @return mixed 招新系统信息
     * @throws DataNotFoundException
     * @throws DbException
     * @throws ModelNotFoundException
     */
    public static function getRecruitInfoByField($where = ['id' => null], $field = null)
    {
        return self::where($where)->field($field)->find();
    }

    /**
     * 修改招新配置
     * @param array $query 参数
     * @param string $id 招新配置ID
     * @param array $only 仅允许更新的字段
     * @return mixed
     * @author hangwei
     */
    public static function updateRecruitConfig($query, $id, $only = [])
    {
        return self::update($query, ['id' => $id], $only);
    }


}