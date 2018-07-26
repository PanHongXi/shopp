<?php
namespace app\admin\controller;

use think\Controller;
use think\Request;

class Base extends Controller
{
    public function _initialize()
    {
        $request = Request::instance();
        $con = $request->controller();//获取当前的控制器
        $action = $request->action();//获取当前的控制器的方法
        $this->assign([
            'con'=>$con,
            'action'=>$action
        ]);
    }

}