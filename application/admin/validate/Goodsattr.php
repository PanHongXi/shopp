<?php

namespace app\admin\validate;

use think\Validate;

class Goodsattr extends Validate
{
    protected $rule = [
        'type_id' => 'require',
        'attr_name' => 'require',
    ];

    protected $message = [
        'attr_name.require' => '属性名称不能为空!',
    ];
}