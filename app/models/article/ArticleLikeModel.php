<?php

namespace app\models\article;

use Exception;
use think\Model;

/**
 * 文章操作记录 Model
 * Class ArticleLikeModel
 * @package app\models\article
 */
class ArticleLikeModel extends Model
{

    /**
     * 数据表主键
     * @var string
     */
    protected $pk = 'article_like_id';

    /**
     * 模型名称
     * @var string
     */
    protected $name = 'article_like';

    /**
     * 当前模型对应的完整数据表名称
     * @var string
     */
    protected $table = 'article_like';


    /**
     * 通过条件获取文章操作记录统计
     * @param $where
     * @return mixed
     * @author hangwei
     */
    public static function getArticleLikeCount($where)
    {
        return self::where($where)->count();
    }

    /**
     * 新增文章操作记录
     * @param array $query 参数
     * @param array $only 仅允许写入的字段
     * @return mixed
     * @author hangwei
     */
    public static function createArticleLike($query, $only)
    {
        return self::create($query, $only);
    }

    /**
     * 删除文章操作记录
     * @param array $where 删除条件
     * @return mixed
     * @throws Exception
     * @author hangwei
     */
    public static function deleteArticleLike($where)
    {
        return self::where($where)->delete();
    }

}
