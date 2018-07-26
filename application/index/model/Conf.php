<?php
namespace app\index\model;

use think\Model;

class Conf extends Model
{
    public function getConf ()
    {
        //获取配置项
        $_confRes = \model('conf')->field('conf_ename,value')->select();
        $confRes = array();
        foreach ($_confRes as $k => $v)
        {
            $confRes[$v['conf_ename']] = $v['value'];
        }

        //返回
        return $confRes;
    }
}