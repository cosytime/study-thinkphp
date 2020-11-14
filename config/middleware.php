<?php
// 中间件配置
return [
    // 别名或分组
    'alias' => [
        // Api应用授权信息验证中间件
        'AuthApi' => app\middlewares\AuthApiMiddleware::class,
        // Admin应用授权信息验证中间件
        'AuthAdmin' => app\middlewares\AuthAdminMiddleware::class,
        // 参数签名校验中间件
        'Check' => app\middlewares\ParamSignMiddleware::class
    ],
    // 优先级设置，此数组中的中间件会按照数组中的顺序优先执行
    'priority' => [
        think\middleware\AllowCrossDomain::class,
        app\middlewares\AuthApiMiddleware::class,
        app\middlewares\AuthAdminMiddleware::class,
        app\middlewares\ParamSignMiddleware::class
    ]
];
