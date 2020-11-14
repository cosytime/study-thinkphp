<?php

namespace app\api\controller\v1\common;

use app\api\validate\common\Option\getOptionListValidate;
use app\BaseController;
use app\models\system\SystemClassesModel;
use app\models\system\SystemDemoCategoryModel;
use app\models\system\SystemProfessionModel;
use think\db\exception\DataNotFoundException;
use think\db\exception\DbException;
use think\db\exception\ModelNotFoundException;
use think\exception\ValidateException;

/**
 * @title 选项列表
 * @desc 选项列表相关模块
 * Class CommonOptionController
 * @package app\api\controller\common
 */
class CommonOptionController extends BaseController
{

    /**
     * @title 获取选项列表
     * @desc 获取选项列表
     * @param string $type 选项类型（classes 班级，profession 专业）
     * @return mixed 选项列表
     * @throws DataNotFoundException
     * @throws DbException
     * @throws ModelNotFoundException
     * @author hangwei
     */
    public function getOptionList($type)
    {
        $param = request()->param();
        try {
            validate(getOptionListValidate::class)->batch(true)->check($param);
        } catch (ValidateException $e) {
            // 验证失败 输出错误信息
            return returnJson($e->getError(), 10006, '请求参数校验不通过');
        }
        $data = [];
        $where = [['status', '=', '0'], ['delete_time', '=', NULL]];
        if ($type === 'classes') {
            if (isset($param['grade'])) array_push($where, ['class_grade', '=', $param['grade']]);
            if (isset($param['profession_id'])) array_push($where, ['profession_id', '=', $param['profession_id']]);
            $data = SystemClassesModel::getClassesListByField($where, 'class_id,class_name');
        } else if ($type === 'profession') {
            $data = SystemProfessionModel::getProfessionListByField($where, 'profession_id,profession_name');
        } else if ($type === 'demoType') {
            $data = SystemDemoCategoryModel::getDemoCategoryList(1, 999, [['delete_time', '=', NULL], ['status', '=', 0]], 'category_id,category_name');
        }
        return ReturnJson($data);
    }

}
