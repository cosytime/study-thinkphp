<?php

namespace app\models\article;

use Exception;
use think\db\exception\DbException;
use think\Model;
use think\model\concern\SoftDelete;

/**
 * 文章分类 Model
 * Class ArticleCategoryModel
 * @package app\models\article
 */
class ArticleCategoryModel extends Model
{
    use SoftDelete; // 开启软删除

    /**
     * 数据表主键
     * @var string
     */
    protected $pk = 'category_id';

    /**
     * 模型名称
     * @var string
     */
    protected $name = 'article_category';

    /**
     * 当前模型对应的完整数据表名称
     * @var string
     */
    protected $table = 'article_category';

    /**
     * 获取文章分类列表
     * @param array $where 条件
     * @param string|null $field 所需字段
     * @param string|null $withoutField 排除字段
     * @return mixed 文章分类列表
     * @throws DbException
     * @author hangwei
     */
    public static function getArticleCategoryList($where, $field = null, $withoutField = null)
    {
        return self::where($where)->field($field)->withoutField($withoutField)->order('category_sort')->select();
    }

    /**
     * 通过条件查询文章分类信息
     * @param array $where 查询条件
     * @param array|string $field 所需字段
     * @return mixed 文章分类信息
     * @throws DbException
     * @author hangwei
     */
    public static function getArticleCategoryByField($where = ['category_id' => null], $field = null)
    {
        return self::where($where)->field($field)->find();
    }

    /**
     * 修改文章分类
     * @param array $query 参数
     * @param string $category_id 文章分类ID
     * @param array $only 仅允许更新的字段
     * @return mixed
     * @author hangwei
     */
    public static function updateArticleCategory($query, $category_id, $only = [])
    {
        return self::update($query, ['category_id' => $category_id], $only);
    }

    /**
     * 新增文章分类
     * @param array $query 参数
     * @param array $only 仅允许写入的字段
     * @return mixed
     * @author hangwei
     */
    public static function createArticleCategory($query, $only)
    {
        return self::create($query, $only);
    }

    /**
     * 删除文章分类
     * @param array $query 参数
     * @return mixed
     * @throws Exception
     * @author hangwei
     */
    public static function deleteArticleCategory($query)
    {
        return self::where('category_id', 'in', $query)->delete();
    }

}
