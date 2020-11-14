<?php

namespace app\api\validate\article\Like;

use think\Validate;

class createOrDeleteArticleLike extends Validate
{

    protected $rule = [
        'type' => 'require|in:1,2,3',
        'article_id' => 'require|integer',
        'comment_id' => 'require|integer'
    ];

    protected $message = [
        'type.require' => '类型不能为空',
        'type.in' => '类型值必须在[\'1\',\'2\',\'3\']中',
        'article_id.require' => '文章ID不能为空',
        'article_id.integer' => '文章ID必须为整数',
        'comment_id.require' => '评论ID不能为空',
        'comment_id.integer' => '评论ID必须为整数'
    ];

    protected $scene = [
        'article' => ['type', 'article_id'],
        'comment' => ['type', 'comment_id']
    ];
}