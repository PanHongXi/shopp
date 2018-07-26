<?php
namespace app\index\controller;

use think\Controller;

class Flow extends Base
{
    public function addToCart()
    {
        $data = input('post.');
        $goodsInfo = json_decode($data['goods']);
        $goodsId = $goodsInfo->goods_id;
        $goodsNum = $goodsInfo->number;
        $goodsAttr = $goodsInfo->goods_attr_ids;

        $goodsCart = model('cart')->addGoodsCart($goodsId, $goodsAttr, $goodsNum);

        $result = ['error' => 0, 'one_step_buy' => 1];

        return json($result);
    }

    //购物车列表
    public function flow1()
    {
        $goodsCartList = model('Cart')->getGoodsCartInfo();

        $this->assign([
            'goodsCartList' => $goodsCartList,
        ]);
        return view();
    }

    //获取购物车的计算：总金额，总数量，节省金额
    public function ajaxAartGoodsAmount()
    {
        $recId = input('rec_id');

        $result = model('Cart')->ajaxAartGoodsAmount($recId);

        return json($result);
    }
}