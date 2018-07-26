<?php

namespace app\admin\validate;

use think\Validate;

class Article extends Validate
{
    protected $rule = [
        'article_title' => 'require|unique:article',
        'keywords' => 'require',
        'content' => 'require',
        'description' => 'require|max:300',
    ];

    protected $message = [
        'article_title.require' => '文章名称不能为空!',
        'article_title.unique' => '文章名称不能重复!',
        'describe.max' => '文章描述最多不能超过300个字符！',
        'keywords.require' => '关键字不能为空！',
        'description.require' => '文章描述描述不能为空！',
        'content.require' => '文章内容不能为空！',
    ];
}