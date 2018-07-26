<?php

namespace app\admin\validate;

use think\Validate;

class Conf extends Validate
{

    protected $rule = [
        'conf_cname' => 'require|unique:conf',
        'conf_ename' => 'require',
    ];
    protected $message = [
        'conf_cname.require' => '中文名称不能为空！',
        'conf_cname.unique' => '中文名称不能重复！',
        'conf_ename.require' => '英文名称不能为空！',
        'conf_ename.unique' => '英文名称不能重复！',
    ];
    protected $scene = [
        'edit' => ['conf_cname', 'conf_ename' => 'require'],
    ];
}