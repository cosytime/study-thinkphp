<?php

namespace app\models\system;

use think\db\exception\DataNotFoundException;
use think\db\exception\DbException;
use think\db\exception\ModelNotFoundException;
use think\Model;

/**
 * 系统配置 Model
 * Class SystemConfigModel
 * @package app\models\system
 */
class SystemConfigModel extends Model
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
    protected $name = 'system_config';

    /**
     * 获取系统配置
     * @param string $config_field 配置字段
     * @return mixed
     * @throws DataNotFoundException
     * @throws DbException
     * @throws ModelNotFoundException
     */
    public static function findByConfigField($config_field)
    {
        return self::where(['config_field' => $config_field, 'status' => '1'])->field('config_name,value')->find();
    }

}