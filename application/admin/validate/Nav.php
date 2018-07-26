<?php
namespace app\admin\validate;

use think\Validate;
class Nav extends Validate
{
    protected $rule = [
        'nav_name' => 'require|unique:nav',
        'nav_url' => 'url',
    ];

    protected $message = [
        'nav_name.require' => '导航名称不能为空!',
        'nav_name.unique' => '导航名称不能重复!',
        'nav_url.url' => '网址格式不正确！',
    ];
}