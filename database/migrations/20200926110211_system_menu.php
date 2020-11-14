<?php

use think\migration\Migrator;

class SystemMenu extends Migrator
{

    public function change()
    {
        $table = $this->table('system_menu', array('id' => false, 'primary_key' => ['menu_id'], 'comment' => '菜单权限表'));
        $table
            ->addColumn('menu_id', 'biginteger', array('limit' => 20, 'identity' => true, 'signed' => false, 'comment' => '菜单ID'))
            ->addColumn('parent_id', 'biginteger', array('limit' => 20, 'default' => 0, 'null' => true, 'comment' => '父级菜单ID'))
            ->addColumn('path', 'string', array('limit' => 200, 'default' => NULL, 'null' => true, 'comment' => '路由地址'))
            ->addColumn('name', 'string', array('limit' => 50, 'null' => true, 'comment' => '路由名称'))
            ->addColumn('redirect', 'string', array('limit' => 100, 'default' => NULL, 'null' => true, 'comment' => '重定向地址'))
            ->addColumn('component', 'string', array('limit' => 255, 'default' => NULL, 'null' => true, 'comment' => '组件路径'))
            ->addColumn('title', 'string', array('limit' => 50, 'null' => true, 'comment' => '路由名称'))
            ->addColumn('icon', 'string', array('limit' => 100, 'default' => '#', 'null' => true, 'comment' => '菜单图标'))
            ->addColumn('hidden', 'string', array('limit' => 2, 'default' => '0', 'null' => false, 'comment' => '菜单显隐状态（0显示，1隐藏）'))
            ->addColumn('keep_alive', 'string', array('limit' => 2, 'default' => '0', 'null' => false, 'comment' => '是否缓存（0缓存，1不缓存）'))
            ->addColumn('permission', 'string', array('limit' => 100, 'default' => NULL, 'null' => true, 'comment' => '权限标识'))
            ->addColumn('target', 'string', array('limit' => 50, 'null' => true, 'comment' => '外链跳转模式'))
            ->addColumn('menu_sort', 'biginteger', array('limit' => 20, 'default' => 0, 'null' => false, 'comment' => '菜单显示顺序'))
            ->addColumn('is_frame', 'string', array('limit' => 2, 'default' => '1', 'null' => true, 'comment' => '是否为外链（0是，1否）'))
            ->addColumn('menu_type', 'string', array('limit' => 2, 'null' => true, 'comment' => '菜单类型（M目录，C菜单，F按钮，G分组）'))
            ->addColumn('menu_types', 'string', array('limit' => 2, 'default' => '1', 'null' => false, 'comment' => '系统内置（0是，1否）'))
            ->addColumn('status', 'string', array('limit' => 2, 'default' => '0', 'null' => true, 'comment' => '菜单状态（0正常，1停用）'))
            ->addColumn('create_by', 'string', array('limit' => 64, 'default' => '', 'null' => true, 'comment' => '创建者'))
            ->addColumn('update_by', 'string', array('limit' => 64, 'default' => '', 'null' => true, 'comment' => '更新者'))
            ->addColumn('remark', 'string', array('limit' => 500, 'default' => '', 'null' => true, 'comment' => '备注'))
            ->addColumn('create_time', 'timestamp', array('default' => 'CURRENT_TIMESTAMP', 'comment' => '创建时间'))
            ->addColumn('update_time', 'timestamp', array('default' => 'CURRENT_TIMESTAMP', 'update' => 'CURRENT_TIMESTAMP', 'comment' => '修改时间'))
            ->create();
    }
}
