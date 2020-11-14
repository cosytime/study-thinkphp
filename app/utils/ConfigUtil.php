<?php

// +----------------------------------------------------------------------
// | 获取系统配置工具
// +----------------------------------------------------------------------

namespace app\utils;

use app\models\system\SystemConfigModel;
use think\facade\Cache;
use Throwable;

class ConfigUtil
{

    /**
     * 获取系统开发配置信息
     * @param string $key 参数键名
     * @param bool $cache 是否缓存
     * @return mixed
     * @throws throwable
     * @author hangwei
     */
    public static function getConfig($key, $cache = false)
    {
        $map = [
            ['config_key', '=', $key]
        ];
        $cache_name = $key;
        $data = SystemConfigModel::where($map)->field('config_value,encrypt')->find();
        if ($data['encrypt'] === '0') {
            $value = EncryptUtil::coding($data['config_value'], 'DECODE', '123456', 0); // 密文解密
        } else {
            $value = $data['config_value'];
        }
        if ($cache) return Cache::remember('Kfzx:System:Config:' . $cache_name, function () use ($value) {
            return $value;
        }, 259200000);
        return $value;
    }
}
