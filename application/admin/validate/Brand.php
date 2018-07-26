<?php

namespace app\admin\validate;

use think\Validate;

class Brand extends Validate
{
    protected $rule = [
        'brand_name' => 'require|unique:brand',
        'brand_url' => 'url',
        'brand_describe' => 'require|max:300',
    ];

    protected $message = [
        'brand_name.require' => '品牌名称不能为空!',
        'brand_name.unique' => '品牌名称不能重复!',
        'brand_url.url' => '网址格式不正确！',
        'brand_describe.max' => '品牌描述最多不能超过300个字符！',
        'brand_describe.require' => '品牌描述不能为空！',
    ];
}