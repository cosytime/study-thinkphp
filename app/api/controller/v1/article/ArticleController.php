<?php

namespace app\api\controller\v1\article;

use app\api\validate\article\getArticleListByCategory;
use app\BaseController;
use app\models\article\ArticleCommentModel;
use app\models\article\ArticleLikeModel;
use app\models\article\ArticleModel;
use app\utils\JwtUtil;
use think\db\exception\DbException;
use think\exception\ValidateException;
use think\facade\Db;
use think\facade\Request;

/**
 * @title 文章
 * @desc 文章模块
 * Class ArticleController
 * @package app\api\controller\article
 */
class ArticleController extends BaseController
{

    /**
     * @title 通过分类获取文章列表
     * @desc 通过分类获取文章列表
     * @param string $type 文章类别
     * @return string|string[]
     * @throws DbException
     * @author hangwei
     */
    public function getArticleListByCategory($type)
    {
        $params = request()->param();
        try {
            validate(getArticleListByCategory::class)->batch(true)->check($params);
        } catch (ValidateException $e) {
            // 验证失败 输出错误信息
            return returnJson($e->getError(), 10006, '请求参数校验不通过');
        }
        $data = ArticleModel::getArticleList($params['page'], $params['psize'], [['category_id', '=', $type], ['delete_time', '=', NULL], ['status', '=', 0]], 'article_id,article_title,article_cover,article_type,article_imgs,is_source,source,is_top,video_time,keyword,outline,see_count,category_id,user_id,create_time');
        return ReturnJson($data);
    }

    /**
     * @title 获取最新指定条数文章列表
     * @desc 获取最新指定条数文章列表
     * @param string|integer $limit 条数
     * @return string|string[]
     * @throws DbException
     * @author hangwei
     */
    public function getArticleListByLimit($limit)
    {
        $data = ArticleModel::getArticleListByLimit($limit, [['delete_time', '=', NULL], ['status', '=', 0]], 'article_id,article_title,article_cover,article_type,article_imgs,is_source,source,is_top,video_time,keyword,outline,see_count,category_id,user_id,create_time');
        return ReturnJson($data);
    }

    /**
     * @title 通过ID获取文章内容
     * @desc 通过ID获取文章内容
     * @param string $id 文章ID
     * @return string|string[]
     * @throws DbException
     * @author hangwei
     */
    public function getArticle($id)
    {
        Db::table('article')->where('article_id', $id)->inc('see_count')->update();
        $data = ArticleModel::getArticleByField([['article_id', '=', $id], ['delete_time', '=', NULL], ['status', '=', 0]], 'article_id,article_title,article_cover,article_type,article_imgs,detail,is_source,source,is_top,video_time,keyword,see_count,category_id,user_id,create_time');
        $data['like_count'] = ArticleLikeModel::getArticleLikeCount([['article_id', '=', $id], ['type', '=', '2']]);
        $data['comment_count'] = ArticleCommentModel::getArticleCommentCount([['article_id', '=', $id], ['status', '=', 0], ['delete_time', '=', NULL]]);
        $data['is_like'] = false;
        $data['is_favorite'] = false;
        $token = Request::header('authorization');
        if ($token) {
            $info = JwtUtil::decode($token);
            if ($info['code'] === 0) {
                $userLikeCount = ArticleLikeModel::getArticleLikeCount([['user_id', '=', $info['data']->uid], ['article_id', '=', $id], ['type', '=', '2']]);
                $userFavoriteCount = ArticleLikeModel::getArticleLikeCount([['user_id', '=', $info['data']->uid], ['article_id', '=', $id], ['type', '=', '1']]);
                $data['is_like'] = $userLikeCount === 1;
                $data['is_favorite'] = $userFavoriteCount === 1;
            }
        }
        return ReturnJson($data);
    }

}
