<?php

namespace app\api\controller\v1\common;

use app\BaseController;
use app\utils\UploadUtil;

/**
 * @title 资源上传
 * @desc 资源上传模块
 * Class Upload
 * @package app\api\controller\common
 */
class CommonUploadController extends BaseController
{
    /**
     * @title 头像上传
     * @desc 头像上传接口
     * @return string $name 图片名称
     * @return string $url 图片URL相对路径
     * @author hangwei
     * @method POST
     */
    public function avatar()
    {
        $data = UploadUtil::uploadFile('', 2097152); // 最大支持2MB
        if ($data['code'] == 0) return ReturnJson($data['data']);
        return ReturnJson(null, $data['code'], $data['msg']);
    }
}
