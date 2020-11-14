<?php

use think\facade\{
    Route,
    View
};


// 授权接口（需登录）
Route::group(':version', function () {

    // 公共类
    Route::group('common', function () {
        // 获取选项列表
        Route::get('getOption/:type', ':version.common.CommonOptionController/getOptionList');
    });

    // 招新类
    Route::group('recruit', function () {
        // 获取报名列表
        Route::get('list', ':version.recruit.RecruitListController/getRecruitList');
        // 删除报名信息
        Route::delete('list', ':version.recruit.RecruitListController/deleteRecruitList');
        // 审核报名信息
        Route::post('review/:type', ':version.recruit.RecruitListController/reviewRecruitList');
        // 获取招新系统配置
        Route::get('config', ':version.recruit.RecruitConfigController/getRecruitConfig');
        // 更新招新系统配置
        Route::put('config', ':version.recruit.RecruitConfigController/updateRecruitConfig');
    });

    // 系统类
    Route::group('system', function () {
        // 获取管理员列表
        Route::get('manager', ':version.system.SystemUserController/getUserList');
        // 更新理员
        Route::put('manager', ':version.system.SystemUserController/updateUser');
        // 新增管理员
        Route::post('manager', ':version.system.SystemUserController/createUser');
        // 删除管理员
        Route::delete('manager', ':version.system.SystemUserController/deleteUser');
        // 获取菜单列表
        Route::get('menu', ':version.system.SystemMenuController/getMenuList');
        // 更新菜单
        Route::put('menu', ':version.system.SystemMenuController/updateMenu');
        // 新增菜单
        Route::post('menu', ':version.system.SystemMenuController/createMenu');
        // 删除菜单
        Route::delete('menu', ':version.system.SystemMenuController/deleteMenu');
        // 获取用户列表
        Route::get('user', ':version.system.SystemUserController/getUserList');
        // 获取角色列表
        Route::get('role', ':version.system.SystemRoleController/getRoleList');
        // 更新角色
        Route::put('role', ':version.system.SystemRoleController/updateRole');
        // 新增角色
        Route::post('role', ':version.system.SystemRoleController/createRole');
        // 删除角色
        Route::delete('role', ':version.system.SystemRoleController/deleteRole');
        // 获取部门列表
        Route::get('dept', ':version.system.SystemDeptController/getDeptList');
        // 更新部门
        Route::put('dept', ':version.system.SystemDeptController/updateDept');
        // 新增部门
        Route::post('dept', ':version.system.SystemDeptController/createDept');
        // 删除部门
        Route::delete('dept', ':version.system.SystemDeptController/deleteDept');
        // 获取专业列表
        Route::get('profession', ':version.system.SystemProfessionController/getProfessionList');
        // 更新专业
        Route::put('profession', ':version.system.SystemProfessionController/updateProfession');
        // 新增专业
        Route::post('profession', ':version.system.SystemProfessionController/createProfession');
        // 删除专业
        Route::delete('profession', ':version.system.SystemProfessionController/deleteProfession');
        // 获取班级列表
        Route::get('class', ':version.system.SystemClassesController/getClassesList');
        // 更新班级
        Route::put('class', ':version.system.SystemClassesController/updateClasses');
        // 新增班级
        Route::post('class', ':version.system.SystemClassesController/createClasses');
        // 删除班级
        Route::delete('class', ':version.system.SystemClassesController/deleteClasses');
    });

    // 用户类
    Route::group('user', function () {
        // 获取用户信息及权限列表
        Route::get('info', ':version.user.UserInfoController/getUserInfo');
        // 获取用户菜单列表
        Route::get('menu', ':version.user.UserInfoController/getUserMenu');
    });

})->middleware(['AuthAdmin', 'Check']);


// 开放接口（无需登录）
Route::group(':version', function () {
    // 授权类
    Route::group('auth', function () {
        // 用户登录
        Route::post('login', ':version.auth.AuthH5Controller/loginByPassword');
    });
});


// 没有匹配到路由
Route::miss(function () {
    return View::fetch('../app/views/IndexView.php');
});
