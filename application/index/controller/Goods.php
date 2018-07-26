<?php

namespace app\index\controller;
class Goods extends Base
{
    public function goodsDetails($goodsid)
    {
        $goodsInfo = db('goods')->find($goodsid);

        $goodsThumb = array();
        //获取原图信息
        if ($goodsInfo['og_thumb']) {
            $goodsThumb['og_photo'] = $goodsInfo['og_thumb'];
            $goodsThumb['big_photo'] = $goodsInfo['big_thumb'];
            $goodsThumb['mb_photo'] = $goodsInfo['md_thumb'];
            $goodsThumb['sm_photo'] = $goodsInfo['sm_thumb'];
        }

        //获取商品相册信息
        $goodsPhoneList = db('goods_photos')->where(array('goods_id' => $goodsid))->field('og_photo,big_photo,mb_photo,sm_photo')->select();

        //组合数组，组合商品相册
        array_unshift($goodsPhoneList, $goodsThumb);

        //获取商品的属性
        $filed = 'at.*, ga.attr_name, ga.attr_type';
        $attrsList = db('goods_attrs')->alias('at')->join('goodsattr ga', 'at.attr_id=ga.id')->field($filed)->where(array('goods_id' => $goodsid))->select();

        $radioAttr = array();//单选属性
        $onlyAttr = array();//唯一属性

        foreach ($attrsList as $k => $v) {
            if ($v['attr_type'] == 1) {
                $radioAttr[$v['attr_name']][] = $v;
            } else {
                $onlyAttr[] = $v;
            }
        }

        //模板输出
        $this->assign([
            'show_right' => 1,//判断分类与商品列表的样式
            'goodsInfo' => $goodsInfo,
            'goodsPhoneList' => $goodsPhoneList,
            'radioAttr' => $radioAttr,
            'onlyAttr' => $onlyAttr,
        ]);
        return view();
    }

    //获取商品计算后的会员价格
    public function getGoodsMemberPrice($goodsid)
    {
        $price = model('goods')->getMemberPrice($goodsid);

        return json($price);
    }

}