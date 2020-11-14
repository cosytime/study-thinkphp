<?php

namespace app\api\validate\article\Comment;

use think\Validate;

class deleteArticleComment extends Validate
{

    protected $rule = [
        'comment_id' => 'require|integer'
    ];

    protected $message = [
        'comment_id.require' => '评论ID不能为空',
        'comment_id.integer' => '评论ID必须为整数'
    ];
}