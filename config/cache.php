<?php

// +----------------------------------------------------------------------
// | 缓存配置
// +----------------------------------------------------------------------

return [
    // 默认缓存驱动（redis）
    'default' => env('cache.driver', 'redis'),

    // 缓存连接方式配置
    'stores' => [

        // redis缓存
        'redis' => [
            'type' => 'redis', // 驱动方式
            'host' => '127.0.0.1', // 服务器地址
            'port' => '6379', // 服务器端口
            'password' => 'root', // 密码
            'select' => 0, // 指定库
            'expire' => 0 // 缓存有效期 0表示永久缓存
        ],

        // 文件缓存
        'file' => [
            'type' => 'file', // 驱动方式
            'path' => '../runtime/file/', // 缓存保存目录
            'prefix' => '', // 缓存前缀
            'expire' => 0, // 缓存有效期 0表示永久缓存
            'tag_prefix' => 'kfzx:', // 缓存标签前缀
            'serialize' => [] // 序列化机制 例如 ['serialize', 'unserialize']
        ]

    ],
];