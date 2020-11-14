<?php

namespace app\admin\controller\v1\auth;

use app\admin\validate\v1\auth\H5\{
    loginByPasswordValidate
};
use app\models\system\SystemUserModel;
use app\BaseController;
use app\utils\{
    JwtUtil
};
use think\db\exception\DataNotFoundException;
use think\db\exception\DbException;
use think\db\exception\ModelNotFoundException;
use think\exception\ValidateException;

/**
 * @title 用户注册登录
 * @desc H5用户注册登录模块
 * Class AuthH5Controller
 * @package app\api\controller\v1\H5
 */
class AuthH5Controller extends BaseController
{

    /**
     * @title 用户登录
     * @desc 传统用户名密码登录
     * @return mixed
     * @throws DataNotFoundException
     * @throws DbException
     * @throws ModelNotFoundException
     * @author hangwei
     */
    public function loginByPassword()
    {
        $param = request()->param();
        try {
            validate(loginByPasswordValidate::class)->batch(true)->check($param);
        } catch (ValidateException $e) {
            // 验证失败 输出错误信息
            return returnJson($e->getError(), 10006, '请求参数校验不通过');
        }
        $password = md5('123' . md5($param['password'] . '456'));
        $data = SystemUserModel::getUserInfoByField(['user_name' => $param['username']], 'user_id,password,status');
        if (empty($data)) {
            return ReturnJson(null, 30001, '用户不存在');
        } else if ($data->password !== $password) {
            return ReturnJson(null, 30002, '用户名或密码不正确');
        } else if ($data->status === '1') {
            return ReturnJson(null, 30003, '账户已被禁用');
        }
        $time = time();
        $ip = request()->ip();
        $jwtToken = JwtUtil::encode($data->user_id);
        return ReturnJson($jwtToken);
    }

}
