<?php

namespace app\api\controller\v1\recruit;

use app\api\validate\recruit\Lists\createRecruitValidate;
use app\BaseController;
use app\models\recruit\RecruitConfigModel;
use app\models\recruit\RecruitListModel;
use app\utils\ConfigUtil;
use think\db\exception\DataNotFoundException;
use think\db\exception\DbException;
use think\db\exception\ModelNotFoundException;
use think\exception\ValidateException;
use Throwable;

/**
 * 报名表
 * @desc 报名表模块
 * Class RecruitListController
 * @package app\api\controller\v1\recruit
 */
class RecruitListController extends BaseController
{

    /**
     * 获取报名信息
     * @desc 获取报名信息接口
     * @param string $type 类型（only 查询是否提交报名，all查询报名信息）
     * @return mixed
     * @throws DataNotFoundException
     * @throws DbException
     * @throws ModelNotFoundException
     * @throws Throwable
     * @author hangwei
     */
    public function getRecruitInfo($type)
    {
        if ($type === 'only') {
            $recruit = RecruitListModel::getRecruitByField(['uid' => request()->uid], ['uid,recruit_id']);
            return returnJson(['recruit_status' => !!$recruit]);
        } else if ($type === 'all') {
            $recruit = RecruitListModel::getRecruitByField(['uid' => request()->uid], ['name', 'sex', 'grade', 'profession', 'class', 'committee', 'union', 'student_id', 'phone', 'email', 'math_grades', 'english_grades', 'complex_grades', 'student_type', 'hoppy', 'push_code', 'level', 'desc', 'year', 'ip']);
            $recruit['group'] = ConfigUtil::getConfig('group');
            $recruit['answer'] = ConfigUtil::getConfig('group:answer');
            return returnJson($recruit);
        } else {
            return returnJson();
        }
    }

    /**
     * 报名信息录入
     * @desc 报名信息录入接口
     * @author hangwei
     */
    public function createRecruit()
    {
        $params = request()->param();
        try {
            validate(createRecruitValidate::class)->batch(true)->check($params);
        } catch (ValidateException $e) {
            // 验证失败 输出错误信息
            return returnJson($e->getError(), 10006, '请求参数校验不通过');
        }
        try {
            $recruit = RecruitListModel::getRecruitByField(['uid' => request()->uid], ['uid']);
            if (isset($recruit['uid'])) return returnJson(null, 30010, '已提交过报名');
            $code = RecruitConfigModel::getRecruitInfoByField(['type' => '1'], ['code']);
            if ($params['code'] !== $code['code']) return returnJson(null, 30011, '无效的邀请码');
            $data = $params;
            $data['uid'] = request()->uid;
            $data['ip'] = request()->ip();
            $data['year'] = date('Y');
            RecruitListModel::createRecruit($data, ['uid', 'name', 'sex', 'grade', 'profession', 'class', 'committee', 'union', 'student_id', 'phone', 'email', 'math_grades', 'english_grades', 'complex_grades', 'student_type', 'hoppy', 'push_code', 'desc', 'year', 'ip']);
            return ReturnJson();
        } catch (\Exception $e) {
            return ReturnJson(null, 10007, '操作失败');
        }
    }
}
