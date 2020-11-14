<?php

namespace app\models\system;

use Exception;
use think\db\exception\DataNotFoundException;
use think\db\exception\DbException;
use think\db\exception\ModelNotFoundException;
use think\model\concern\SoftDelete;
use think\Model;

/**
 * 协议条款 Model
 * Class SystemProtocolModel
 * @package app\models\system
 */
class SystemProtocolModel extends Model
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
    protected $pk = 'protocol_id';

    /**
     * 模型名称
     * @var string
     */
    protected $name = 'system_protocol';

    /**
     * 当前模型对应的完整数据表名称
     * @var string
     */
    protected $table = 'system_protocol';


    /**
     * 通过条件查询协议条款信息
     * @param array $where 查询条件
     * @param array|string $field 所需字段
     * @return mixed 协议条款信息
     * @throws DataNotFoundException
     * @throws DbException
     * @throws ModelNotFoundException
     * @author hangwei
     */
    public static function getProtocolInfoByField($where = ['protocol_id' => null], $field = null)
    {
        return self::where($where)->field($field)->find();
    }

    /**
     * 获取协议条款列表
     * @param string|integer $page 当前页
     * @param string|integer $psize 每页数量
     * @param array $where 条件
     * @param string|null $field 所需字段
     * @param string|null $withoutField 排除字段
     * @return mixed 协议条款列表
     * @throws DbException
     * @author hangwei
     */
    public static function getProtocolList($page, $psize, $where, $field = null, $withoutField = null)
    {
        return self::where($where)->field($field)->withoutField($withoutField)->paginate([
            'list_rows' => $psize,
            'page' => $page,
        ]);
    }

    /**
     * 修改协议条款
     * @param array $query 参数
     * @param string $user_id 协议条款ID
     * @param array $only 仅允许更新的字段
     * @return mixed
     * @author hangwei
     */
    public static function updateProtocol($query, $user_id, $only = [])
    {
        return self::update($query, ['user_id' => $user_id], $only);
    }

    /**
     * 新增协议条款
     * @param array $query 参数
     * @param array $only 仅允许写入的字段
     * @return mixed
     * @author hangwei
     */
    public static function createProtocol($query, $only = [])
    {
        return self::create($query, $only);
    }

    /**
     * 删除协议条款
     * @param array $query 参数
     * @return mixed
     * @throws Exception
     * @author hangwei
     */
    public static function deleteProtocol($query)
    {
        return self::destroy($query);
    }

}