<?php

namespace app\models\system;

use think\db\exception\DataNotFoundException;
use think\db\exception\DbException;
use think\db\exception\ModelNotFoundException;
use think\Model;

/**
 * 邮件发送日志记录 Model
 * Class SystemEmailLogModel
 * @package app\models\system
 */
class SystemEmailLogModel extends Model
{

    /**
     * 数据表主键
     * @var string
     */
    protected $pk = 'email_id';

    /**
     * 模型名称
     * @var string
     */
    protected $name = 'system_email_log';

    /**
     * 当前模型对应的完整数据表名称
     * @var string
     */
    protected $table = 'system_email_log';

    /**
     * 记录邮件发送日志
     * @param array $query 参数
     * @return mixed 邮件ID
     */
    public static function add($query)
    {
        return self::create($query);
    }

}