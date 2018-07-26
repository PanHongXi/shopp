<?php

namespace app\admin\validate;

use think\Validate;

class Cate extends Validate
{
    protected $rule = [
        'cate_name' => 'require|unique:cate',
        'keywords' => 'require',
        'description' => 'require|max:300',
    ];

    protected $message = [
        'cate_name.require' => '分类名称不能为空!',
        'cate_name.unique' => '分类名称不能重复!',
        'brand_describe.max' => '品牌描述最多不能超过300个字符！',
        'keywords.require' => '关键字不能为空！',
        'description.require' => '分类描述不能为空！',
    ];
}