<?php

namespace app\admin\validate;

use think\Validate;

class Memberlevel extends Validate
{
    protected $rule = [
        'level_name' => 'require|unique:member_level',
        'bom_point' => 'require|egt:0|lt:top_point',
        'top_point' => 'require|gt:0',
        'rate' => 'elt:100|egt:0'
    ];

    protected $message = [
        'level_name.require' => '等级名称不能为空!',
        'level_name.unique' => '等级名称不能重复!',
        'bom_point.require' => '下线积分不能为空!',
        'bom_point.egt' => '下线积分不能小于0!',
        'bom_point.lt' => '下线积分不能大于上线积分!',
        'top_point.gt' => '上线积分不能小于0!',
        'top_point.require' => '上线积分不能为空!',
        'rate.elt' => '折扣率不能超过100%!',
        'rate.egt' => '折扣率不能小于0!',
    ];
    protected $scene = [
        'edit' => ['level_name' => 'require', 'bom_point' => 'require|egt:0|lt:top_point', 'top_point' => 'require|gt:0', 'rate' => 'elt:100|gt:0'],
    ];
}