<?php
namespace app\member\controller;

use think\Controller;
use app\index\controller\Base;

class User extends Base
{
    public function index()
    {
        $this->assign([
            'show_right' => 1,//判断分类与商品列表的样式
        ]);
        return view();
    }

    public function loginOut()
    {
        model('user')->loginOut();


        $this->success('退出成功！', 'Account/login');
    }
}