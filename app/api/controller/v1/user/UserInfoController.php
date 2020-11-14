<?php

namespace app\api\controller\v1\user;

use app\api\validate\user\Info\updateUserInfoValidate;
use app\BaseController;
use app\models\user\UserModel;
use think\db\exception\DataNotFoundException;
use think\db\exception\DbException;
use think\db\exception\ModelNotFoundException;
use think\exception\ValidateException;

/**
 * @title 用户信息相关
 * @desc 用户信息相关模块
 * Class UserInfoController
 * @package app\api\controller\user
 */
class UserInfoController extends BaseController
{
    /**
     * @title 获取用户信息
     * @desc 获取用户信息
     * @return mixed
     * @throws DataNotFoundException
     * @throws DbException
     * @throws ModelNotFoundException
     * @author hangwei
     */
    public function getUserInfo()
    {
        $data = UserModel::getUserInfoByField(['uid' => request()->uid], 'uid,username,nickname,avatar,sex,name,grade,profession,class,student_id,phone,email,birthday,qq,hoppy,desc,user_status,verify_email,verify_phone,status');
        return ReturnJson($data);
    }

    /**
     * @title 修改用户信息
     * @desc 修改用户信息
     * @return mixed
     * @author hangwei
     */
    public function updateUserInfo()
    {
        $params = request()->param();
        try {
            validate(updateUserInfoValidate::class)->batch(true)->check($params);
        } catch (ValidateException $e) {
            // 验证失败 输出错误信息
            return returnJson($e->getError(), 10006, '请求参数校验不通过');
        }
        $only = ['sex', 'nickname', 'birthday', 'desc'];
        $result = UserModel::updateInfo($params, request()->uid, $only);
        return ReturnJson($result);
    }
}
