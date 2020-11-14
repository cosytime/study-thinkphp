<?php

use think\facade\{
    Route,
    View
};

// 没有匹配到路由
Route::miss(function () {
    return View::fetch('../app/views/IndexView.php');
});
