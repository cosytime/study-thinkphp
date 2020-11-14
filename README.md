本应用仅用于学习，请勿用于非法用途，否则后果自负！！！
===============
> 在开发请前先阅读完本事项说明，总之最重要的就是做到代码规范，避免以后走弯路和一些不必要的麻烦

> Powered By HangWei <2021652599@qq.com>

## 开发环境如下：

* 数据库环境采用MySQL`8.0.12`版本
* ThinkPHP版本为`6.0.2`
* PHP环境要求`7.1+`
* Composer版本为`1.8.5`
* Redis版本为`3.0.504`
* 入口文件夹为public，应用文件夹为app

## 应用模块
~~~
前台应用（api）: http://127.0.0.1:port/api
后台应用（admin）: http://127.0.0.1:port/admin
~~~

## 数据库
~~~
Mysql数据库
版本：8.0.12（8.0及其以上）
端口：3306
数据库名：tp6
默认用户名：root
默认密码：root
*创建tp6数据库之后将本项目根目录sql文件夹中的tp6.sql运行到该数据库

Redis数据库
版本：3.0.504（3.0及其以上）
端口：6379
默认密码：root

~~~

## 开发规范
* 项目为多应用，`api`应用和`admin`应用，`api`为前台接口模块，`admin`为后台接口模块
* 项目已配置了统一JSON响应机制，当有错误需要返回时，直接return `ReturnJson`方法，格式为 ReturnJson(数据,返回码,提示信息) ，并且需要在config文件夹中的code文件新增相应的返回码以便更新开发文档中的统一响应码说明
* 本项目采用`M(模型)V(后端，已弃用)C(控制器)`结构，所以控制器只负责逻辑、业务和计算，数据的增删改查交付给模型处理，具体请参考`获取配置列表`（路径：`admin/controller/system/Config/list`）
* 控制器请分类，控制器请以驼峰命名（英文首字母大写）
* 项目配有数据库迁移工具，请使用迁移工具创建数据表以提高开发效率和保持项目的完整性，请参考`database`文件夹中的实例
* 每个应用都配有路由表，记得添加，路由请按控制器结构分组，具体参考`admin`应用的路由

## 参考文档
[ThinkPHP6完全开发手册](https://www.kancloud.cn/manual/thinkphp6_0/content)

[ThinkPHP6开发规范（必读）](https://www.kancloud.cn/manual/thinkphp6_0/1037482)

## 版权信息
项目启动日期 `2020年05月01日`

Copyright © 2020 HangWei. All rights reserved.
