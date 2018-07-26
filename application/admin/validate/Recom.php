<?php

namespace app\admin\validate;

use think\Validate;

class Recom extends Validate
{
    protected $rule = [
        'rec_name' => 'require|unique:recom',
    ];

    protected $message = [
        'rec_name.require' => '推荐位名称不能为空!',
        'rec_name.unique' => '推荐位名称不能重复!',
    ];
}