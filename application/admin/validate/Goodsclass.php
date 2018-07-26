<?php

namespace app\admin\validate;

use think\Validate;

class Goodsclass extends Validate
{
    protected $rule = [
        'class_name' => 'require|unique:Goodsclass',
        'keywords' => 'require',
        'description' => 'require|max:300',
    ];

    protected $message = [
        'class_name.require' => '分类名称不能为空!',
        'class_name.unique' => '分类名称不能重复!',
        'describe.max' => '商品分类描述最多不能超过300个字符！',
        'keywords.require' => '关键字不能为空！',
        'description.require' => '分类描述不能为空！',
    ];

    protected $scene = [
        'edit'  =>  ['goods_name','description','keywords'=>'require'],
    ];
}