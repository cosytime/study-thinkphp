<?php

namespace app\models\user;

use think\db\exception\DataNotFoundException;
use think\db\exception\DbException;
use think\db\exception\ModelNotFoundException;
use think\Model;

/**
 * 用户 Model
 * Class UserModel
 * @package app\models\user
 */
class UserModel extends Model
{

    /**
     * 数据表主键
     * @var string
     */
    protected $pk = 'uid';

    /**
     * 模型名称
     * @var string $name
     */
    protected $name = 'user';

    /**
     * 当前模型对应的完整数据表名称
     * @var string $table
     */
    protected $table = 'user';

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
    public static function getUserInfoByField($where = ['uid' => null], $field = null)
    {
        return self::where($where)->field($field)->find();
    }

    /**
     * 新增用户
     * @param array $query 参数
     * @return mixed 用户ID
     * @author hangwei
     */
    public static function add($query)
    {
        return self::create($query);
    }

    /**
     * 修改用户
     * @param array $query 参数
     * @param string $uid 用户ID
     * @param array $only 仅允许更新的字段
     * @return mixed
     * @author hangwei
     */
    public static function updateInfo($query, $uid, $only = [])
    {
        return self::update($query, ['uid' => $uid], $only);
    }

}