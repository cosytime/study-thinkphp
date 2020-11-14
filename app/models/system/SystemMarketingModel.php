<?php

namespace app\models\system;

use think\db\exception\DataNotFoundException;
use think\db\exception\DbException;
use think\db\exception\ModelNotFoundException;
use think\Model;
use think\model\relation\HasMany;

/**
 * 系统营销 Model
 * Class SystemMarketingModel
 * @package app\models\system
 */
class SystemMarketingModel extends Model
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
    protected $name = 'system_marketing';

    /**
     * 模型关联
     * @return HasMany
     */
    public function resources()
    {
        return $this->hasMany(SystemResourcesModel::class, 'id', 'resources_id');
    }

    /**
     * 获取广告/轮播图/通知
     * @param string $group 分组
     * @return mixed
     * @throws DataNotFoundException
     * @throws DbException
     * @throws ModelNotFoundException
     */
    public static function findByGroup($group)
    {
        $data = self::order('sort DESC')->where(['group' => $group, 'status' => '1'])->field('id,name,content,url')->select();
        $list = [];
        foreach ($data as $v) {
            $url = $v->resources()->where('status', '1')->field('url')->find();
            unset($v['resources_id']);
            $v['img_url'] = $url['url'];
            array_push($list, $v);
        }
        return $list;
    }

}