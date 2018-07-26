<?php

namespace app\admin\controller;

use think\Controller;

class Ajaxattr extends Base
{
    /**
     * ajax删除商品的单个属性
     */
    public function ajaxDelAttr()
    {
        $goodsAttr = db('goods_attrs')->where(array('id' => input('id')))->delete();
        if ($goodsAttr) {
            echo 1;
        } else {
            echo 2;
        }
    }
}