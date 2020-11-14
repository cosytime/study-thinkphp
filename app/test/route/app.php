<?php

use think\facade\Route;

//  快速测试
Route::get('/', 'Index/index');

//  加密解密
Route::get('/code', 'Index/getCode');

Route::get('/demo', 'Index/demo');
