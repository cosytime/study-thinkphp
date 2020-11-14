<?php

namespace app\api\controller\v1\article;

use app\BaseController;
use app\models\article\ArticleCategoryModel;

/**
 * @title 文章分类
 * @desc 文章分类模块
 * Class ArticleCategoryController
 * @package app\api\controller\article
 */
class ArticleCategoryController extends BaseController
{

    /**
     * @title 获取文章分类列表
     * @desc 获取文章分类列表
     * @author hangwei
     */
    public function getArticleCategoryList()
    {
        $data = ArticleCategoryModel::getArticleCategoryList([['delete_time', '=', NULL], ['status', '=', 0]], 'category_id,category_name');
        return ReturnJson($data);
    }
}
