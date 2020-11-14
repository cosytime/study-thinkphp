<?php

// +----------------------------------------------------------------------
// | 微信小程序接口调用工具
// | hangwei <admin@lanyanxi.com> 2020-04-02
// +----------------------------------------------------------------------

namespace app\utils;

use think\facade\Cache;

class WeChatUtil
{
    // 微信小程序配置信息
    private $wechat_config = [
        'appid' => '',
        'appsecret' => '',
    ];

    // 微信ACCESS_TOKEN（需替换为小程序，具体内容待定）
    private $access_token = '';

    // 初始化函数
    function __construct()
    {
        $this->wechat_config = $this->wechat_config(); // 获取微信小程序配置信息
        $this->access_token = $this->get_access_token();
        if (!$this->access_token) return;
    }

    /**
     * 获取密钥配置
     * @return array [type] 数组
     */
    private function wechat_config()
    {
        $wechat_config = [
            'appid' => app('getConfig')->getConfig('appid'), // 小程序的appid
            'appsecret' => app('getConfig')->getConfig('app_secret') // 小程序的AppSecret
        ];
        return array_merge($this->wechat_config, $wechat_config);
    }

    /** 获取微信ACCESS_TOKEN
     * @return mixed
     * @todo 弃用，需替换为小程序获取授权接口
     */
    private function get_access_token()
    {
        $access_token = Cache::get('WeChat_Config_ACCESS_TOKEN');
        if ($access_token) {
            return $access_token;
        } else {
            $url = 'https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=' . $this->wechat_config['appid'] . '&secret=' . $this->wechat_config['appsecret'];
            $data = self::https_request($url);
            var_dump($access_token);
            if (!isset($data['errcode'])) {
                Cache::set('WeChat_Config_ACCESS_TOKEN', $data['access_token'], 7000);
                return $data['access_token'];
            } else {
                return '';
            }
        }

    }

    /** 发送客服消息
     * @param string $type 消息类型
     * @param string $openid 用户唯一标识
     * @param string $data 信息
     * @author hangwei
     * @return mixed
     * @todo 弃用，这是微信平台的消息接口，需要替换成小程序消息接口
     */
    public function sendMessage($openid, $type, $data)
    {
        $url = 'https://api.weixin.qq.com/cgi-bin/message/custom/send?access_token=' . $this->access_token;
        $post_data = json_encode([
            'touser' => $openid,
            'msgtype' => $type,
            $type => $data
        ], JSON_UNESCAPED_UNICODE);

        return self::https_request($url, $post_data);
    }

    /**
     * 发送curl请求
     * @param string $url 请求url地址
     * @param string $post_data POST请求数据
     * @author hangwei
     * @return mixed
     */
    private function https_request($url, $post_data = '')
    {
        $curl = curl_init();
        $timeout = 5;
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_URL, $url); // 请求url地址
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, $timeout);
        if ($post_data != '') {
            curl_setopt($curl, CURLOPT_POST, 1); // 是否为POST请求
            curl_setopt($curl, CURLOPT_POSTFIELDS, $post_data); // POST请求参数
        }
        $AjaxReturn = curl_exec($curl); // 执行
        //获取数据,转换为数组
        $data = json_decode($AjaxReturn, true);
        curl_close($curl); // 关闭连接
        return $data;
    }
}
