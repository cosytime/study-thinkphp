<?php

namespace app\api\controller\v1\system;

use app\api\validate\system\protocol\getProtocolInfoValidate;
use app\BaseController;
use app\models\system\SystemProtocolModel;
use think\exception\ValidateException;

/**
 * @title 协议条款
 * @desc 协议条款模块
 * Class SystemProtocolController
 * @package app\api\controller\system
 */
class SystemProtocolController extends BaseController
{
    /**
     * @title 获取协议条款内容
     * @desc 获取协议条款接口
     * @author hangwei
     */
    public function getProtocolInfo()
    {
        $params = request()->param();
        try {
            validate(getProtocolInfoValidate::class)->batch(true)->check($params);
        } catch (ValidateException $e) {
            // 验证失败 输出错误信息
            return returnJson($e->getError(), 10006, '请求参数校验不通过');
        }
        $data = SystemProtocolModel::getProtocolInfoByField([['protocol_code', '=', $params['code']], ['delete_time', '=', NULL], ['status', '=', 0]], 'protocol_id,protocol_name,protocol_content,version,release_time,effect_time,update_time');
        return ReturnJson($data);
    }
}
