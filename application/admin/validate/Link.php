<?php

namespace app\admin\validate;

use think\Validate;

class Link extends Validate
{
    protected $rule = [
        'link_title' => 'require|unique:link',
        'link_url' => 'url',
        'link_desc' => 'require|max:300',
    ];

    protected $message = [
        'link_title.require' => '链接标题不能为空!',
        'link_title.unique' => '链接标题不能重复!',
        'link_url.url' => '网址格式不正确！',
        'link_desc.max' => '链接描述最多不能超过300个字符！',
        'link_desc.require' => '链接描述不能为空！',
    ];
}