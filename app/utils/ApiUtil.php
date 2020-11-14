<?php

// +----------------------------------------------------------------------
// | 调用外部API工具
// +----------------------------------------------------------------------

namespace app\utils;

class ApiUtil
{

    /** 获取IP信息
     * @param string $ip IP
     * @return array IP的地理位置
     * @author hangwei
     * @desc 免费的IP地理位置信息获取接口（网易），由于速度太慢、地理位置信息误差太大，不建议使用
     */
    public static function getIPInfo($ip)
    {
        try {
            $ip_array = explode(".", $ip);
            if ($ip == '127.0.0.1' || ($ip_array[0] == '192' && $ip_array[1] == '168')) {
                return ['province' => '本地服务器', 'city' => ''];
            } else if ($ip == '0.0.0.0') {
                return ['province' => '未知地区', 'city' => ''];
            }
            $baseUrl = 'https://api.topthink.com/ip/index?ip=';
            $url = $baseUrl . $ip;
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            $output = iconv('GB2312', 'UTF-8', curl_exec($curl));
            curl_close($curl);
            $arr = explode('"', $output);
            return ['province' => $arr[1], 'city' => $arr[3]];
        } catch (\Exception $e) {
            return ['province' => '未知地区', 'city' => ''];
        }
    }
}
