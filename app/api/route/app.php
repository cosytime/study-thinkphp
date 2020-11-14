<?php

use think\facade\{
    Route,
    View
};

// 授权接口（需登录）
Route::group(':version', function () {
    // 公共类
    Route::group('common', function () {
    });

    // 系统类
    Route::group('system', function () {
    });

    // 文章类
    Route::group('article', function () {
        // 新增文章操作记录
        Route::post('like', ':version.article.ArticleLikeController/createArticleLike');
        // 删除文章操作记录
        Route::delete('like', ':version.article.ArticleLikeController/deleteArticleLike');
        // 评论文章
        Route::post('comment', ':version.article.ArticleCommentController/createArticleComment');
        // 删除文章评论
        Route::delete('comment', ':version.article.ArticleCommentController/deleteArticleComment');
    });

    // 招新系统类
    Route::group('recruit', function () {
        // 获取报名表标题封面信息
        Route::get('intro', ':version.recruit.RecruitConfigController/getRecruitIntro');
        // 新增报名信息
        Route::post('form', ':version.recruit.RecruitListController/createRecruit');
        // 获取报名信息
        Route::get('form/:type', ':version.recruit.RecruitListController/getRecruitInfo');
    });

    // 用户类
    Route::group('user', function () {
        // 获取用户信息
        Route::get('info', ':version.user.UserInfoController/getUserInfo');
        // 更新用户信息
        Route::put('info', ':version.user.UserInfoController/updateUserInfo');
    });
})->middleware(['AuthApi', 'Check']);


// 开放接口（无需登录）
Route::group(':version', function () {

    // 公共类
    Route::group('common', function () {
        // 获取选项列表
        Route::get('getOption/:type', ':version.common.CommonOptionController/getOptionList');
    });

    // 系统类
    Route::group('system', function () {
        // 获取协议政策内容
        Route::get('protocol', ':version.system.SystemProtocolController/getProtocolInfo');
    });

    // 案例类
    Route::group('demo', function () {
        // 获取案例分类列表
        Route::get('category/list', ':version.system.SystemDemoCategoryController/getDemoCategoryList');
        // 获取案例列表
        Route::get('list', ':version.system.SystemDemoController/getDemoList');
        // 获取最新指定条数案例列表
        Route::get('list/:limit', ':version.system.SystemDemoController/getDemoListByLimit');
        // 获取案例详情
        Route::get('info', ':version.system.SystemDemoController/getDemo');
        // 获取案例关键词
        Route::get('keyword', ':version.system.SystemDemoController/getDemoKeyWord');
    });

    // 文章类
    Route::group('article', function () {
        // 获取文章分类列表
        Route::get('category/list', ':version.article.ArticleCategoryController/getArticleCategoryList');
        // 通过分类获取文章列表
        Route::get('list/category/:type', ':version.article.ArticleController/getArticleListByCategory');
        // 获取最新指定条数文章列表
        Route::get('list/new/:limit', ':version.article.ArticleController/getArticleListByLimit');
        // 获取文章内容
        Route::get('content/:id', ':version.article.ArticleController/getArticle');
        // 获取文章评论列表
        Route::get('comment/list/:id', ':version.article.ArticleCommentController/getArticleCommentList');
    });

    // 招新系统类
    Route::group('recruit', function () {
        // 获取招新系统信息
        Route::get('config', ':version.recruit.RecruitConfigController/getRecruitInfo');
    });

    // 授权类
    Route::group('auth', function () {
        // 发送阿里云短信验证码
        Route::post('phone_code/aliyun/:type', ':version.auth.AuthH5Controller/sendSMSCodeByAliyun');
        // 发送邮件验证码
        Route::post('email_code/:type', ':version.auth.AuthH5Controller/sendEmailCode');
        // 用户注册
        Route::post('registered', ':version.auth.AuthH5Controller/registeredByPassword');
        // 验证类
        Route::group('verify', function () {
            // 邮箱验证
            Route::put('email', ':version.auth.AuthH5Controller/verifyEmail');
        });
        // 用户登录
        Route::post('login', ':version.auth.AuthH5Controller/loginByPassword');
        // 检查用户信息是否被注册
        Route::post('check/:type', ':version.auth.AuthH5Controller/checkUserInfo');
    });
});

// 没有匹配到路由
Route::miss(function () {
    return View::fetch('../app/views/IndexView.php');
});
