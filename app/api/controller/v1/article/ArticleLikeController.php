<?php

namespace app\api\controller\v1\article;

use app\api\validate\article\Like\createOrDeleteArticleLike;
use app\BaseController;
use app\models\article\ArticleLikeModel;
use Exception;
use think\exception\ValidateException;

/**
 * @title 文章操作记录
 * @desc 文章操作记录模块
 * Class ArticleController
 * @package app\api\controller\article
 */
class ArticleLikeController extends BaseController
{

    /**
     * 新增文章操作记录
     * @return mixed
     * @author hangwei
     */
    public function createArticleLike()
    {
        $params = request()->param();
        $sence = isset($params['type']) && $params['type'] === '3' ? 'comment' : 'article';
        try {
            validate(createOrDeleteArticleLike::class)->batch(true)->scene($sence)->check($params);
        } catch (ValidateException $e) {
            // 验证失败 输出错误信息
            return returnJson($e->getError(), 10006, '请求参数校验不通过');
        }
        $where = [['user_id', '=', request()->uid], ['type', '=', $params['type']]];
        if ($params['type'] === '3') {
            $query = ['user_id' => request()->uid, 'type' => $params['type'], 'comment_id' => $params['comment_id']];
            array_push($where, ['comment_id', '=', $params['comment_id']]);
            $msg = "文章收藏点赞";
        } else {
            $query = ['user_id' => request()->uid, 'type' => $params['type'], 'article_id' => $params['article_id']];
            array_push($where, ['article_id', '=', $params['article_id']]);
            $msg = "评论点赞";
        }
        $articleLike = ArticleLikeModel::getArticleLikeCount($where);
        if ($articleLike !== 0) return returnJson(null, 30012, $msg . '记录已存在');
        ArticleLikeModel::createArticleLike($query, ['article_id', 'comment_id', 'user_id', 'type']);
        return returnJson();
    }

    /**
     * 删除文章操作记录
     * @return mixed
     * @throws Exception
     * @author hangwei
     */
    public function deleteArticleLike()
    {
        $params = request()->param();
        $sence = isset($params['type']) && $params['type'] === '3' ? 'comment' : 'article';
        try {
            validate(createOrDeleteArticleLike::class)->batch(true)->scene($sence)->check($params);
        } catch (ValidateException $e) {
            // 验证失败 输出错误信息
            return returnJson($e->getError(), 10006, '请求参数校验不通过');
        }
        $where = [['user_id', '=', request()->uid], ['type', '=', $params['type']]];
        if ($params['type'] === '3') {
            array_push($where, ['comment_id', '=', $params['comment_id']]);
        } else {
            array_push($where, ['article_id', '=', $params['article_id']]);
        }
        ArticleLikeModel::deleteArticleLike($where);
        return returnJson();
    }


}
