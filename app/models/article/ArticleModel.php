<?php

namespace app\models\article;

use app\models\user\UserModel;
use Exception;
use think\db\exception\DataNotFoundException;
use think\db\exception\DbException;
use think\db\exception\ModelNotFoundException;
use think\Model;
use think\model\concern\SoftDelete;

/**
 * 文章 Model
 * Class ArticleModel
 * @package app\models\article
 */
class ArticleModel extends Model
{
    use SoftDelete;

    // 开启软删除

    /**
     * 数据表主键
     * @var string
     */
    protected $pk = 'article_id';

    /**
     * 模型名称
     * @var string
     */
    protected $name = 'article';

    /**
     * 当前模型对应的完整数据表名称
     * @var string
     */
    protected $table = 'article';

    /**
     * 文章-类别 1:1（一对一）关联
     */
    public function categorys()
    {
        return $this->hasOne(ArticleCategoryModel::class, 'category_id', 'category_id');
    }

    /**
     * 文章-用户 1:1（一对一）关联
     */
    public function users()
    {
        return $this->hasOne(UserModel::class, 'uid', 'user_id');
    }

    /**
     * 文章-评论 1:N（一对多）关联
     */
    public function comments()
    {
        return $this->hasMany(ArticleCommentModel::class, 'article_id', 'article_id');
    }

    /**
     * 获取文章列表
     * @param string|integer $page 当前页
     * @param string|integer $psize 每页数量
     * @param array $where 条件
     * @param string|null $field 所需字段
     * @param string|null $withoutField 排除字段
     * @return mixed 文章列表
     * @throws DbException
     * @author hangwei
     */
    public static function getArticleList($page, $psize, $where, $field = null, $withoutField = null)
    {
        return self::where($where)->with(['categorys' => function ($query) {
            $query->field(['article_category.category_id,article_category.category_name'])->bind(['category_name']);
        }, 'users' => function ($query) {
            $query->field(['user.uid,user.name as author'])->bind(['author']);
        }])->field($field)->withoutField($withoutField)->withCount('comments')->order(['is_top' => 'asc', 'update_time' => 'desc', 'create_time' => 'desc'])->paginate(['list_rows' => $psize, 'page' => $page,]);
    }

    /**
     * 获取最新指定条数文章列表
     * @param string|integer $limit 条数
     * @param array $where 条件
     * @param string|null $field 所需字段
     * @param string|null $withoutField 排除字段
     * @return mixed 文章列表
     * @throws DbException
     * @throws DataNotFoundException
     * @throws ModelNotFoundException
     * @author hangwei
     */
    public static function getArticleListByLimit($limit,$where, $field = null, $withoutField = null)
    {
        return self::where($where)->with(['categorys' => function ($query) {
            $query->field(['article_category.category_id,article_category.category_name'])->bind(['category_name']);
        }, 'users' => function ($query) {
            $query->field(['user.uid,user.name as author'])->bind(['author']);
        }])->field($field)->withoutField($withoutField)->withCount('comments')->order(['update_time' => 'desc', 'create_time' => 'desc'])->limit($limit)->select();
    }

    /**
     * 通过条件查询文章信息
     * @param array $where 查询条件
     * @param array|string $field 所需字段
     * @return mixed 文章信息
     * @throws DbException
     * @author hangwei
     */
    public static function getArticleByField($where = ['article_id' => null], $field = null)
    {
        return self::where($where)->with(['categorys' => function ($query) {
            $query->field(['article_category.category_id,article_category.category_name'])->bind(['category_name']);
        }, 'users' => function ($query) {
            $query->field(['user.uid,user.name as author'])->bind(['author']);
        }])->field($field)->withCount('comments')->find();
    }

    /**
     * 修改文章
     * @param array $query 参数
     * @param string $article_id 文章ID
     * @param array $only 仅允许更新的字段
     * @return mixed
     * @author hangwei
     */
    public static function updateArticle($query, $article_id, $only = [])
    {
        return self::update($query, ['article_id' => $article_id], $only);
    }

    /**
     * 新增文章
     * @param array $query 参数
     * @param array $only 仅允许写入的字段
     * @return mixed
     * @author hangwei
     */
    public static function createArticle($query, $only)
    {
        return self::create($query, $only);
    }

    /**
     * 删除文章
     * @param array $query 参数
     * @return mixed
     * @throws Exception
     * @author hangwei
     */
    public static function deleteArticle($query)
    {
        return self::where('article_id', 'in', $query)->delete();
    }

}
