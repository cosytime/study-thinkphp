<?php

namespace app\api\validate\article\Comment;

use think\Validate;

class createArticleComment extends Validate
{

    protected $rule = [
        'article_id' => 'require|integer',
        'detail' => 'require|max:800'
    ];

    protected $message = [
        'article_id.require' => '文章ID不能为空',
        'article_id.integer' => '文章ID必须为整数',
        'detail.require' => '评论内容不能为空',
        'detail.max' => '评论内容最少不能低于800个字符'
    ];
}