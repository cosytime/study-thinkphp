<?php

namespace app\models\system;

use Exception;
use think\Collection;
use think\db\exception\DataNotFoundException;
use think\db\exception\DbException;
use think\db\exception\ModelNotFoundException;
use think\Model;

/**
 * 资源文件 Model
 * Class SystemResourcesModel
 * @package app\models\system
 */
class SystemResourcesModel extends Model
{

    /**
     * 数据表主键
     * @var string
     */
    protected $pk = 'id';

    /**
     * 模型名称
     * @var string
     */
    protected $name = 'system_resources';

    /**
     * 获取资源信息列表
     * @return mixed
     * @throws DataNotFoundException
     * @throws DbException
     * @throws ModelNotFoundException
     */
    public static function list()
    {
        return self::order('sort DESC')->select();
    }

    /**
     * 新增资源信息
     * @param array $list 资源信息列表
     * @return Collection
     * @throws Exception
     */
    public static function add($list)
    {
        return self::saveAll($list);
    }

}