<?php

namespace app\api\controller\v1\auth;

use DateTime;
use app\api\validate\auth\H5\{loginByPasswordValidate,
    registeredByPasswordValidate,
    sendEmailCodeValidate,
    sendSMSCodeByAliyun,
    verifyEmailValidate
};
use app\models\user\UserModel;
use app\BaseController;
use app\utils\{CalculationUtil, ConfigUtil, DingxiangUtil, JwtUtil, SendUtil};
use PHPMailer\PHPMailer\Exception;
use think\db\exception\DataNotFoundException;
use think\db\exception\DbException;
use think\db\exception\ModelNotFoundException;
use think\exception\ValidateException;
use think\facade\Cache;
use Throwable;

/**
 * @title 用户注册登录
 * @desc H5用户注册登录模块
 * Class AuthH5Controller
 * @package app\api\controller\v1\auth
 */
class AuthH5Controller extends BaseController
{

    /**
     * @title 检查用户是否被注册
     * @desc 检查用户是否被注册
     * @param string $type 类型（username 用户名，email 密码）
     * @return mixed
     * @throws DataNotFoundException
     * @throws DbException
     * @throws ModelNotFoundException
     * @author hangwei
     */
    public function checkUserInfo($type)
    {
        $params = request()->param();
        if ($type === 'username') {
            $registeredData = UserModel::getUserInfoByField(['username' => $params['username']], 'uid,username');
            $registeredData2 = UserModel::getUserInfoByField(['phone' => $params['username']], 'uid,phone');
            $registeredData3 = UserModel::getUserInfoByField(['email' => $params['username']], 'uid,email');
            $registeredData4 = UserModel::getUserInfoByField(['student_id' => $params['username']], 'uid,student_id');
            if (!empty($registeredData) || !empty($registeredData2) || !empty($registeredData3) || !empty($registeredData4)) {
                return ReturnJson(null, 30005, '用户名已被注册');
            } else {
                return ReturnJson();
            }
        } else if ($type === 'phone') {
            $phoneData = UserModel::getUserInfoByField(['phone' => $params['phone']], 'uid,phone');
            if (!empty($phoneData)) {
                return ReturnJson(null, 30013, '手机号已被注册');
            } else {
                return ReturnJson();
            }
        } else if ($type === 'email') {
            $emailData = UserModel::getUserInfoByField(['email' => $params['email']], 'uid,email');
            if (!empty($emailData)) {
                return ReturnJson(null, 30006, '邮箱已被注册');
            } else {
                return ReturnJson();
            }
        } else {
            return ReturnJson(null, 10007, '操作失败');
        }
    }

    /**
     * @title 用户注册
     * @desc 传统用户名密码注册
     * @return mixed
     * @throws DataNotFoundException
     * @throws DbException
     * @throws ModelNotFoundException
     * @throws Throwable
     * @author hangwei
     */
    public function registeredByPassword()
    {
        $params = request()->param();
        try {
            validate(registeredByPasswordValidate::class)->batch(true)->check(request()->param());
        } catch (ValidateException $e) {
            // 验证失败 输出错误信息
            return returnJson($e->getError(), 10006, '请求参数校验不通过');
        }
        $codeData = Cache::get('kfzx:api:auth:phone_code:' . $params['phone'] . ':' . $params['code']);
        if ($params['code'] !== $codeData) return ReturnJson(null, 30008, '验证码不正确或已过期');
        $registeredData = UserModel::getUserInfoByField(['username' => $params['username']], 'uid,username');
        $registeredData2 = UserModel::getUserInfoByField(['phone' => $params['username']], 'uid,phone');
        $registeredData3 = UserModel::getUserInfoByField(['email' => $params['username']], 'uid,email');
        $registeredData4 = UserModel::getUserInfoByField(['student_id' => $params['username']], 'uid,student_id');
        $phoneData = UserModel::getUserInfoByField(['phone' => $params['phone']], 'uid,phone');
        if (!empty($registeredData) || !empty($registeredData2) || !empty($registeredData3) || !empty($registeredData4)) {
            return ReturnJson(null, 30005, '用户名已被注册');
        } else if (!empty($phoneData)) {
            return ReturnJson(null, 30013, '手机号已被注册');
        } else {
            $query = [
                'username' => $params['username'],
                'nickname' => $params['phone'],
                'birthday' => '1970-01-01',
                'avatar' => 'static/image/common/default_avatar.png',
                'password' => md5('85' . md5($params['password']) . 'kf2018zx'),
                'phone' => $params['phone'],
                'desc' => '暂时没有签名',
                'verify_phone' => '0'
            ];
            try {
                UserModel::add($query);
                Cache::delete('kfzx:api:auth:phone_code:' . $params['phone'] . ':' . $params['code']);
                return returnJson();
            } catch (ValidateException $e) {
                return ReturnJson(null, 10007, '操作失败');
            }
        }
    }

    /**
     * @title 用户登录
     * @desc 传统用户名密码登录
     * @return mixed
     * @throws DataNotFoundException
     * @throws DbException
     * @throws ModelNotFoundException
     * @throws Throwable
     * @author hangwei
     */
    public function loginByPassword()
    {
        $params = request()->param();
        try {
            validate(loginByPasswordValidate::class)->batch(true)->check($params);
        } catch (ValidateException $e) {
            // 验证失败 输出错误信息
            return returnJson($e->getError(), 10006, '请求参数校验不通过');
        }

        $captchaResult = DingxiangUtil::Captcha($params['captcha_token']);
        if (!$captchaResult->result) return returnJson(null, 10008, '触发风控机制，请求已拦截');

        $data = UserModel::getUserInfoByField(['username' => $params['username']], 'uid,password,status');
        $password = md5('85' . md5($params['password']) . 'kf2018zx');
        if (empty($data)) {
            $phoneReg = preg_match('/^[1][3,4,5,7,8,9][0-9]{9}$/', $params['username']);
            $studentIdNineReg = preg_match('/^[1-9][0-9]{8}$/', $params['username']);
            $studentIdTenReg = preg_match('/^[1-9][0-9]{9}$/', $params['username']);
            $emailReg = preg_match('/^([a-zA-Z]|[0-9])(\w|-)+@[a-zA-Z0-9]+\.([a-zA-Z]{2,4})$/', $params['username']);;
            $accountType = $phoneReg ? 'phone' : ($studentIdNineReg ? 'student_id' : ($studentIdTenReg ? 'student_id' : ($emailReg ? 'email' : 'username')));
            $data = UserModel::getUserInfoByField([$accountType => $params['username']], 'uid,password,status');
        }
        if (empty($data)) {
            return ReturnJson(null, 30001, '用户不存在');
        } else if ($data->password !== $password) {
            return ReturnJson(null, 30002, '用户名或密码不正确');
        } else if ($data->status === '1') {
            return ReturnJson(null, 30003, '账户已被禁用');
        }
        $jwtToken = JwtUtil::encode($data->uid);
        return ReturnJson($jwtToken);
    }

    /**
     * @title 发送阿里云短信验证码
     * @desc 发送阿里云短信验证码
     * @param string $type 类型
     * @return mixed
     * @throws Throwable
     * @author hangwei
     */
    public function sendSMSCodeByAliyun($type)
    {
        $params = request()->param();
        try {
            validate(sendSMSCodeByAliyun::class)->batch(true)->check($params);
        } catch (ValidateException $e) {
            // 验证失败 输出错误信息
            return returnJson($e->getError(), 10006, '请求参数校验不通过');
        }

        try {
            $captchaResult = DingxiangUtil::Captcha($params['captcha_token']);
            if (!$captchaResult->result) return returnJson(null, 10008, '触发风控机制，请求已拦截');
            $AliyunSMSStatus = ConfigUtil::getConfig('aliyun:sms:status');
            if (Cache::get('kfzx:api:auth:phone_code:' . $params['phone']) >= 5) return returnJson(null, 30014, '今日短信已达上限（5条）');
            if ($AliyunSMSStatus !== '0') return returnJson(null, 30015, '短信服务已关闭');
            $code = CalculationUtil::getRandomNumber(6);
            if ($type === 'registered') {
                $result = SendUtil::sendCodeBySMS($params['phone'], $code);
                Cache::set('kfzx:api:auth:phone_code:' . $params['phone'] . ':' . $code, $code, 300);
                if ($result['Message'] !== 'OK') {
                    return ReturnJson($result, 10010, '阿里云短信发送失败');
                }
                $lastTime = date('Y-m-d 00:00:00', time() + 86400);
                Cache::remember('kfzx:api:auth:phone_code:' . $params['phone'], 0, (new DateTime($lastTime)));
                Cache::inc('kfzx:api:auth:phone_code:' . $params['phone']);
            } else if ($type === 'forget') {
                Cache::set('kfzx:api:auth:phone_forget_code:' . $params['phone'] . ':' . $code, $code, 300);
            }
            return ReturnJson();
        } catch (ValidateException $e) {
            return ReturnJson(null, 10007, '操作失败');
        }
    }

    /**
     * @title 发送邮箱验证码
     * @desc 发送邮箱验证码
     * @param string $type 类型
     * @return mixed
     * @throws Throwable
     * @throws Exception
     * @author hangwei
     */
    public function sendEmailCode($type)
    {
        $params = request()->param();
        try {
            validate(sendEmailCodeValidate::class)->batch(true)->check($params);
        } catch (ValidateException $e) {
            // 验证失败 输出错误信息
            return returnJson($e->getError(), 10006, '请求参数校验不通过');
        }

        try {
            $captchaResult = DingxiangUtil::Captcha($params['captcha_token']);
            if (!$captchaResult->result) return returnJson(null, 10008, '触发风控机制，请求已拦截');
            $code = CalculationUtil::getRandomNumber(6);
            if ($type === 'registered') {
                SendUtil::sendRegistrationCodeByEmail($params['email'], $params['email'], $code);
                Cache::set('kfzx:api:auth:email_code:' . $params['email'] . ':' . $code, $code, 300);
            } else if ($type === 'forget') {
                Cache::set('kfzx:api:auth:email_forget_code:' . $params['email'] . ':' . $code, $code, 300);
            }
            return ReturnJson();
        } catch (ValidateException $e) {
            return ReturnJson(null, 10007, '操作失败');
        }
    }

    /**
     * @title 邮箱验证
     * @desc 注册邮箱验证
     * @return mixed
     * @throws DataNotFoundException
     * @throws DbException
     * @throws ModelNotFoundException
     * @throws Throwable
     * @author hangwei
     */
    public function verifyEmail()
    {
        try {
            validate(verifyEmailValidate::class)->batch(true)->check(request()->param());
        } catch (ValidateException $e) {
            // 验证失败 输出错误信息
            return returnJson($e->getError(), 10006, '请求参数校验不通过');
        }
        $tokens = request()->param('token');
        $uid = substr($tokens, -1);
        $user = UserModel::getUserInfoByField(['uid' => $uid], 'uid,email,username,verify_email');
        if (empty($user)) return returnJson(null, 30007, '无效的邮箱验证码');
        $cacheToken = Cache::get('kfzx:api:auth:email_token:' . $uid);
        if (!empty($cacheToken) && $tokens === $cacheToken) {
            UserModel::updateInfo(['verify_email' => '0'], $uid, 'verify_email');
            SendUtil::sendRegistrationSuccessByEmail($user->email, $user->username, $user->email);
            Cache::delete('kfzx:api:auth:email_token:' . $uid);
            return returnJson();
        }
        return returnJson(null, 30008, '邮箱验证码已过期');
    }

}
