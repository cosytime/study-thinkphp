<?php

namespace app\models\article;

use app\models\user\UserModel;
use think\db\exception\DataNotFoundException;
use think\db\exception\DbException;
use think\db\exception\ModelNotFoundException;
use think\facade\Db;
use think\Model;

/**
 * 文章评论 Model
 * Class ArticleCommentModel
 * @package app\models\article
 */
class ArticleCommentModel extends Model
{

    /**
     * 数据表主键
     * @var string
     */
    protected $pk = 'comment_id';

    /**
     * 模型名称
     * @var string
     */
    protected $name = 'article_comment';

    /**
     * 当前模型对应的完整数据表名称
     * @var string
     */
    protected $table = 'article_comment';

    /**
     * 评论-用户 1:1（一对一）关联
     */
    public function users()
    {
        return $this->hasOne(UserModel::class, 'uid', 'user_id');
    }


    /**
     * 获取评论列表
     * @param string|integer $page 当前页
     * @param string|integer $psize 每页数量
     * @param array $where 条件
     * @param string|null $field 所需字段
     * @param string|null $withoutField 排除字段
     * @return mixed 文章评论列表
     * @throws DbException
     * @author hangwei
     */
    public static function getArticleCommentList($page, $psize, $where, $field = null, $withoutField = null)
    {
        return self::where($where)->with(['users' => function ($query) {
            $query->field(['user.uid,user.name,user.avatar'])->bind(['name', 'avatar']);
        }])->field($field)->withoutField($withoutField)->order(['parent_id' => 'asc', 'create_time' => 'desc'])->paginate(['list_rows' => $psize, 'page' => $page,]);
    }

    /**
     * 通过条件获取评论详情内容
     * @param array $where 条件
     * @param string|null $field 所需字段
     * @param string|null $withoutField 排除字段
     * @return mixed 文章评论详情信息
     * @throws DbException
     * @author hangwei
     */
    public static function getArticleCommentByField($where, $field = null, $withoutField = null)
    {
        return self::where($where)->with(['users' => function ($query) {
            $query->field(['user.uid,user.name,user.avatar'])->bind(['name', 'avatar']);
        }])->field($field)->withoutField($withoutField)->find();
    }

    /**
     * 获取评论回复数量
     * @param array $where 条件
     * @return mixed 评论回复数量
     * @author hangwei
     */
    public static function getArticleCommentCount($where = null)
    {
        return self::where($where)->count();
    }

    /**
     * 新增文章评论
     * @param array $query 参数
     * @param array $only 仅允许写入的字段
     * @return mixed
     * @author hangwei
     */
    public static function createArticleComment($query, $only)
    {
        return self::create($query, $only);
    }

    /**
     * 删除文章评论
     * @param array $where 条件
     * @return mixed
     * @author hangwei
     */
    public static function deleteArticleComment($where)
    {
       return self::where($where)->update(['delete_time' => date('Y-m-d H:i:s')]);
    }

}
