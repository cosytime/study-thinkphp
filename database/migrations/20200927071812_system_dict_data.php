<?php

use think\migration\Migrator;
use think\migration\db\Column;

class SystemDictData extends Migrator
{
    public function change()
    {
        $table = $this->table('system_dict_data', array('id' => false, 'primary_key' => ['dict_code'], 'comment' => '字典数据表'));
        $table
            ->addColumn('dict_code', 'biginteger', array('limit' => 20, 'identity' => true, 'signed' => false, 'comment' => '字典编码'))
            ->addColumn('dict_sort', 'biginteger', array('limit' => 20, 'null' => false, 'comment' => '字典排序'))
            ->addColumn('dict_label', 'string', array('limit' => 100, 'null' => true, 'comment' => '字典标签'))
            ->addColumn('dict_value', 'string', array('limit' => 100, 'null' => true, 'comment' => '字典键值'))
            ->addColumn('dict_type', 'string', array('limit' => 100, 'null' => true, 'comment' => '字典类型'))
            ->addColumn('css_class', 'string', array('limit' => 100, 'null' => true, 'comment' => '样式属性（其他样式扩展）'))
            ->addColumn('list_class', 'string', array('limit' => 100, 'null' => true, 'comment' => '表格回显样式'))
            ->addColumn('is_default', 'string', array('limit' => 2, 'default' => 'N', 'null' => false, 'comment' => '是否默认（Y是，N否）'))
            ->addColumn('status', 'string', array('limit' => 2, 'default' => '0', 'null' => false, 'comment' => '状态（0正常，1停用）'))
            ->addColumn('create_by', 'string', array('limit' => 64, 'null' => true, 'comment' => '创建者'))
            ->addColumn('update_by', 'string', array('limit' => 64, 'null' => true, 'comment' => '更新者'))
            ->addColumn('remark', 'string', array('limit' => 500, 'null' => true, 'comment' => '备注'))
            ->addColumn('create_time', 'timestamp', array('default' => 'CURRENT_TIMESTAMP', 'comment' => '创建时间'))
            ->addColumn('update_time', 'timestamp', array('default' => 'CURRENT_TIMESTAMP', 'update' => 'CURRENT_TIMESTAMP', 'comment' => '修改时间'))
            ->create();
    }
}
