<?php

namespace app\admin\controller;

use think\Controller;
use Catetree\Catetree;//把无限极分类的类引用进来
class Goods extends Base
{
    /**
     * 商品列表
     */
    public function goodsList()
    {

        $join = [
            ['goodsclass gc', 'g.goodsclass_id=gc.id', 'LEFT'],
            ['goodstype gt', 'g.goodstype_id=gt.id', 'LEFT'],
            ['brand b', 'g.brand_id=b.brand_id', 'LEFT'],
            ['goods_stock s', 'g.goods_id=s.goods_id', 'LEFT'],
        ];
        $goodsRes = db('goods')
            ->alias('g')
            ->field('g.*,gc.class_name,gt.type_name,b.brand_name,SUM(s.goods_number) gm')
            ->group('g.goods_id')
            ->order('g.goods_id desc')
            ->join($join)
            ->paginate(15);
        $page = $goodsRes->render();
        $this->assign([
            'goodsRes' => $goodsRes,
            'page' => $page,
        ]);
        return view();
    }

    /**
     * 商品添加
     */
    public function goodsAdd()
    {

        if (request()->isPost()) {
            $data = input('post.');

            //驗證添加時的字段
            $validate = validate('Goods');
            if (!$validate->check($data))
            {
                $this->error($validate->getError());
                die;
            }

            $goodsRes = model('goods')->save($data);

            if ($goodsRes)
            {
                return alert('添加商品成功', 'goodsList', 6, 2);
            }
            else
            {
                return alert('添加商品失败', 'goodsList', 5, 2);
            }
        }

        //获取会员等级
        $member_level = db('member_level')->order('level_id asc')->select();

        //获取商品的类型
        $goodsType = db('goodstype')->select();

        //獲取品牌
        $brandRes = db('brand')->field('brand_id,brand_name')->select();

        //获取商品的分类
        $GoodsclassRes = db('Goodsclass')->select();

        //获取推荐位
        $recomRes = db('recom')->where(array('rec_type' => 1))->select();

        $GoodsclassTree = new Catetree();
        $GoodsclassRes = $GoodsclassTree->catetree($GoodsclassRes);
        $this->assign([
            'member_level' => $member_level,
            'goodsType' => $goodsType,
            'GoodsclassRes' => $GoodsclassRes,
            'brandRes' => $brandRes,
            'recomRes' => $recomRes,
        ]);
        return view();
    }

    /**
     * 商品修改
     */
    public function goodsEdit($goods_id)
    {
        //处理修改的商品内容
        if (request()->isPost()) {
            $data = input('post.');
            $goods = model('Goods')->update($data);
            if ($goods) {
                $this->success('修改成功！', 'Goods/goodsList');
            } else {
                $this->error('修改失败!', 'Goods/goodsList');
            }
        }

        //获取会员等级
        $member_level = db('member_level')->order('level_id asc')->select();

        //获取商品的类型
        $goodsType = db('goodstype')->select();

        //獲取品牌
        $brandRes = db('brand')->field('brand_id,brand_name')->select();

        //获取该商品的数据
        $goodsEditRes = db('goods')->where(array('goods_id' => $goods_id))->find();

        //获取该商品的会员价
        $_member_priceRes = db('member_price')->where(array('goods_id' => $goods_id))->select();
        $member_priceRes = array();
        foreach ($_member_priceRes as $k => $v) {
            $member_priceRes[$v['mlevel_id']] = $v;
        }

        //查询当前商品类型属性
        $goodsattr = db('goodsattr')->where(array('type_id' => $goodsEditRes['goodstype_id']))->select();

        //查询当前商品的属性
        $_goods_attrs = db('goods_attrs')->where(array('goods_id' => $goodsEditRes['goods_id']))->select();

        //重构二维数组为三维数组，以属性表attr_id为主键
        $goods_attrs = array();
        foreach ($_goods_attrs as $k => $v) {
            $goods_attrs[$v['attr_id']][] = $v;
        }

        //获取商品相册的数据
        $goods_photosRes = db('goods_photos')->where(array('goods_id' => $goods_id))->select();

        //获取商品的分类
        $GoodsclassRes = db('Goodsclass')->select();

        //获取推荐位
        $recomRes = db('recom')->where(array('rec_type' => 1))->select();

        //获取商品推荐位
        $_goods_rec_item = db('rec_item')->where(array('value_type' => 1, 'value_id' => $goods_id))->select();
        $goods_rec_item = array();
        foreach ($_goods_rec_item as $k => $v)
        {
            $goods_rec_item[] = $v['rec_id'];
        }

        $GoodsclassTree = new Catetree();
        $GoodsclassRes = $GoodsclassTree->catetree($GoodsclassRes);
        $this->assign([
            'member_level' => $member_level,
            'goodsType' => $goodsType,
            'GoodsclassRes' => $GoodsclassRes,
            'brandRes' => $brandRes,
            'goodsEditRes' => $goodsEditRes,
            'member_priceRes' => $member_priceRes,
            'goods_photosRes' => $goods_photosRes,
            'goodsattr' => $goodsattr,
            'goods_attrs' => $goods_attrs,
            'recomRes' => $recomRes,
            'goods_rec_item' => $goods_rec_item,
        ]);
        return view();
    }

    /**
     * 异步请求删除商品相册
     */
    public function ajaxDelPhoto($photo_id)
    {
        $goods_photo = db('goods_photos');
        $photoRes = $goods_photo->find($photo_id);
        $sm_photo = UPLOADS . $photoRes['sm_photo'];
        $mb_photo = UPLOADS . $photoRes['mb_photo'];
        $big_photo = UPLOADS . $photoRes['big_photo'];
        $og_photo = UPLOADS . $photoRes['og_photo'];
        @unlink($sm_photo);
        @unlink($mb_photo);
        @unlink($big_photo);
        @unlink($og_photo);
        $del = $goods_photo->delete($photo_id);
        if ($del) {
            echo 1;
        } else {
            echo 2;
        }
    }

    /**
     * 商品删除
     */
    public function goodsDel($goods_id)
    {
        $goodsDel = \model('Goods')->destroy($goods_id);
        if ($goodsDel) {
            $this->success('删除成功！', 'Goods/goodsList');
        } else {
            $this->error('删除失败！', 'Goods/goodsList');
        }
    }

    /**
     * 不同属性库存设置
     * 添加商品库存量
     */
    public function setUpStock($goods_id)
    {
        $goods_stock = db('goods_stock');
        //处理添加的商品库存
        if (request()->isPost()) {
            $goods_stock->where(array('goods_id' => $goods_id))->delete();//删除原来数据，然后重新添加数据，达到修改的目的
            $data = input('post.');
            //分别将属性以及库存量取出来，然后循环最简单的数组
            $goods_attrs = $data['goods_attr'];
            $goods_number = $data['goods_number'];
            foreach ($goods_number as $k => $v) {
                $stockAttr = array();
                foreach ($goods_attrs as $k1 => $v1) {
                    if (intval($v1[$k] <= 0)) {//处理当数据为空的时候不存入
                        continue 2;
                    }
                    $stockAttr[] = $v1[$k];
                }
                sort($stockAttr);//进行排序
                $stockAttr = implode(',', $stockAttr);//转换成一个以“,”分割的字符串
                $goodsStock = $goods_stock->insert([
                    'goods_id' => $goods_id,
                    'goods_number' => $v,
                    'goods_attr' => $stockAttr,
                ]);
            }
            if ($goodsStock) {
                $this->success('添加库存成功！', 'Goods/goodsList');
            } else {
                $this->error('添加库存失败！', 'Goods/goodsList');
            }
            return;
        }
        //查询商品的属性以及属性类型
        $_goodsAttrRes = db('goods_attrs')
            ->alias('ga')
            ->join('goodsattr gs', 'ga.attr_id = gs.id')
            ->field('ga.*,gs.attr_name')
            ->where(array('ga.goods_id' => $goods_id, 'gs.attr_type' => 1))
            ->select();
        $goodsAttrRes = array();
        foreach ($_goodsAttrRes as $k => $v) {
            $goodsAttrRes[$v['attr_name']][] = $v;
        }
        $goodsAttrs = $goodsAttrRes;//重新赋予变量处理属性
        $stockRes = $goods_stock->where(array('goods_id' => $goods_id))->select(); //查询相关的属性库存
        $this->assign([
            'goodsAttrRes' => $goodsAttrRes,
            'goodsAttrs' => $goodsAttrs,
            'stockRes' => $stockRes,
        ]);
        return view();
    }

}