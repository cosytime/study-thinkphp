<?php

namespace app\api\controller\v1\article;

use app\api\validate\article\Comment\{
    createArticleComment,
    deleteArticleComment,
    getArticleCommentList
};
use app\BaseController;
use app\models\article\{
    ArticleCommentModel,
    ArticleLikeModel
};
use app\utils\JwtUtil;
use Exception;
use think\db\exception\DbException;
use think\exception\ValidateException;
use think\facade\Db;
use think\facade\Request;

/**
 * @title 文章评论
 * @desc 文章评论模块
 * Class ArticleCommentController
 * @package app\api\controller\article
 */
class ArticleCommentController extends BaseController
{

    /**
     * @title 通过文章ID获取文章评论列表
     * @desc 通过文章ID获取文章评论列表
     * @param string $id 文章ID
     * @return string|string[]
     * @throws DbException
     * @author hangwei
     */
    public function getArticleCommentList($id)
    {
        $params = request()->param();
        try {
            validate(getArticleCommentList::class)->batch(true)->check($params);
        } catch (ValidateException $e) {
            // 验证失败 输出错误信息
            return returnJson($e->getError(), 10006, '请求参数校验不通过');
        }
        $data = ArticleCommentModel::getArticleCommentList($params['page'], $params['psize'], [['article_id', '=', $id], ['parent_id', '=', 0], ['delete_time', '=', NULL], ['status', '=', 0]], 'comment_id,article_id,user_id,parent_id,detail,create_time');
        $token = Request::header('authorization');
        if ($token) {
            $info = JwtUtil::decode($token);
            $code = $info['code'];
            $uid = $info['data']->uid;
        }
        foreach ($data as $item) {
            $item['is_self'] = isset($uid) && isset($info['data']) && $item['user_id'] === $info['data']->uid;
            $item['like_count'] = ArticleLikeModel::getArticleLikeCount([['comment_id', '=', $item['comment_id']], ['type', '=', '3']]);
            $item['child_count'] = ArticleCommentModel::getArticleCommentCount([['parent_id', '=', $item['comment_id']]]);
            if (isset($code) && $code === 0) $userLikeCount = ArticleLikeModel::getArticleLikeCount([['user_id', '=', isset($uid) ? $uid : 0], ['comment_id', '=', $item['comment_id']], ['type', '=', '3']]);
            $item['is_like'] = isset($userLikeCount) && $userLikeCount === 1;
        }
        return ReturnJson($data);
    }

    /**
     * @title 评论文章
     * @desc 评论文章
     * @author hangwei
     */
    public function createArticleComment()
    {
        $params = request()->param();
        try {
            validate(createArticleComment::class)->batch(true)->check($params);
        } catch (ValidateException $e) {
            // 验证失败 输出错误信息
            return returnJson($e->getError(), 10006, '请求参数校验不通过');
        }
        try {
            $params['user_id'] = request()->uid;
            $creteComment = ArticleCommentModel::createArticleComment($params, ['article_id', 'detail', 'user_id']);
            $comment = ArticleCommentModel::getArticleCommentByField([['comment_id', '=', $creteComment->comment_id], ['parent_id', '=', 0], ['delete_time', '=', NULL], ['status', '=', 0]], 'comment_id,article_id,user_id,parent_id,detail,create_time');
            $comment['is_self'] = true;
            $comment['like_count'] = 0;
            $comment['child_count'] = 0;
            $comment['is_like'] = false;
            return returnJson($comment);
        } catch (Exception $e) {
            return ReturnJson(null, 10007, '操作失败');
        }
    }

    /**
     * @title 删除文章评论
     * @desc 删除文章评论
     * @author hangwei
     */
    public function deleteArticleComment()
    {
        $params = request()->param();
        try {
            validate(deleteArticleComment::class)->batch(true)->check($params);
        } catch (ValidateException $e) {
            // 验证失败 输出错误信息
            return returnJson($e->getError(), 10006, '请求参数校验不通过');
        }

        // 启动事务
        Db::startTrans();
        try {
            ArticleCommentModel::deleteArticleComment([['comment_id', '=', $params['comment_id'], ['user_id', '=', request()->uid]]]);
            ArticleCommentModel::deleteArticleComment(['parent_id' => $params['comment_id']]);
            ArticleLikeModel::deleteArticleLike(['comment_id' => $params['comment_id']]);
            // 提交事务
            Db::commit();
            return returnJson();
        } catch (Exception $e) {
            // 回滚事务
            Db::rollback();
            return ReturnJson(null, 10007, '操作失败');
        }
    }
}
