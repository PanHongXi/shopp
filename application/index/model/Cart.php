<?php
namespace app\index\model;

use think\Model;

class Cart extends Model
{
    /**
     * 添加商品购物车
     * @param $goodsId 商品id
     * @param string $goodsAttr 商品属性
     * @param int $goodsNum 商品数量
     */
    public function addGoodsCart($goodsId, $goodsAttr = '', $goodsNum = 1)
    {
        $cart = isset($_COOKIE['cart']) ? unserialize($_COOKIE['cart']) : array();
        $keys = $goodsId.'-'.$goodsAttr;

        //判断购物车有该商品，处理商品数量
        if (isset($cart[$keys])) {
            $cart[$keys] += $goodsNum;
        } else {
            $cart[$keys] = $goodsNum;
        }

        $time = time() + 15 * 24 * 3600;
        cookie('cart', serialize($cart), $time, '/');

    }

    //清空购物车
    public function clearCart()
    {
        setcookie('cart', '', 1 ,  '/');
    }

    //删除一条购物车记录
    public function delCart($goodsId, $goodsAttr = '')
    {
        $cart = isset($_COOKIE['cart']) ? unserialize($_COOKIE['cart']) : array();
        $keys = $goodsId.'-'.$goodsAttr;
        unset($cart[$keys]);
        $time = time() + 15 * 24 * 3600;
        cookie('cart', serialize($cart), $time, '/');
    }

    //修改购物车商品数量
    public function updateCart($goodsId, $goodsAttr = '', $goodsNum)
    {
        $cart = isset($_COOKIE['cart']) ? unserialize($_COOKIE['cart']) : array();
        $keys = $goodsId.'-'.$goodsAttr;
        $cart[$keys] = $goodsNum;
        $time = time() + 15 * 24 * 3600;
        cookie('cart', serialize($cart), $time, '/');
    }

    /**
     * 获取cookie的购物车商品信息
     *
     * @return array
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function getGoodsCartInfo()
    {
        $goods = \model('goods');
        $cart = isset($_COOKIE['cart']) ? unserialize($_COOKIE['cart']) : array();
        $_cart = array();
        foreach ($cart as $k => $v) {
            $arr = explode('-', $k);//$arr[0]是商品id，$arr[1]：商品属性
            $goodsInfo = $goods->field('goods_id,md_thumb,goods_name')->find($arr[0]);
            $memberPrice = $goods->getMemberPrice($arr[0]);
            $_cart[$k]['goods_id'] = $arr[0];
            $_cart[$k]['goods_name'] = $goodsInfo['goods_name'];
            $_cart[$k]['md_thumb'] = $goodsInfo['md_thumb'];
            $_cart[$k]['goods_num'] = $v;
            $_cart[$k]['member_price'] = $memberPrice;
            $_cart[$k]['goods_attrs_res'] = '';//初始化单选属性值

            if ($arr[1]) {
                //获取商品的属性,不同属性的不同价格
                $goodsAttrsRes = array();
                $goodsAttrsPrice = 0;

                $goodsAttrs = db('goods_attrs')
                    ->alias('ga')
                    ->join('goodsattr at', 'ga.attr_id = at.id')
                    ->field('ga.*,at.id,at.attr_name')
                    ->where('ga.id', 'in', $arr[1])
                    ->select();
                foreach ($goodsAttrs as $k1 => $v1) {
                    $goodsAttrsRes[] = $v1['attr_name'].':'.$v1['attr_values'].'(￥'.$v1['price'].')';
                    $goodsAttrsPrice += $v1['price'];
                }
                $goodsAttrsRes = implode('<br/>', $goodsAttrsRes);
                $_cart[$k]['goods_attrs_res'] = $goodsAttrsRes;
                $_cart[$k]['member_price'] += $goodsAttrsPrice;
            }
        }

        return $_cart;
    }

    /**
     * 计算购物车变动时：购物车数量，购物车价格，节省金额的变动
     * @param $recId 购物车的商品goods_id 1,2,3
     * @return mixed
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function ajaxAartGoodsAmount($recId)
    {
        $goods = \model('goods');

        $recIdArr = explode(',', $recId);
        $cart = isset($_COOKIE['cart']) ? unserialize($_COOKIE['cart']) : array();

        $_cart['goods_amount'] = 0; //会员商品总金额
        $_cart['shopp_total'] = 0; //本店商品总金额
        $_cart['save_total_amount'] = 0;//优惠节省总金额
        $_cart['subtotal_number'] = 0; //商品总数

        //删除购物车中未选定的商品
        foreach ($cart as $k => $v) {
            $arr = explode('-', $k);//$arr[0]是商品id，$arr[1]：商品属性
            if (!in_array($arr[0], $recIdArr)) {
                unset($cart[$k]);
            }
        }

        //开始计算
        foreach ($cart as $k => $v) {
            //计算购物车商品总数
            $_cart['subtotal_number'] += $v;

            //计算会员商品总金额(含属性价)
            $arr = explode('-', $k);//$arr[0]是商品id，$arr[1]：商品属性
            $memberPrice = $goods->getMemberPrice($arr[0]);

            //计算商品的本店总金额(含属性价)
            $shoppPrice = $goods->getShoppPrice($arr[0]);

            if ($arr[1]) {
                //获取商品的属性,不同属性的不同价格
                $goodsAttrsPrice = 0;

                $goodsAttrs = db('goods_attrs')->where('id', 'in', $arr[1])->select();
                foreach ($goodsAttrs as $k1 => $v1) {
                    $goodsAttrsPrice += $v1['price'];
                }
                $memberPrice += $goodsAttrsPrice;
                $shoppPrice += $goodsAttrsPrice;
            }

            $_cart['goods_amount'] += $memberPrice * $v;
            $_cart['shopp_total'] += $shoppPrice * $v;

        }

        //计算总节省金额
        $_cart['save_total_amount'] = $_cart['shopp_total'] - $_cart['goods_amount'];

        return $_cart;
    }

}
