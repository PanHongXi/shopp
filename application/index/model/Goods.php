<?php
namespace app\index\model;
use think\Model;
use catetree\Catetree;

class Goods extends Model
{
    /**
     * 获取指定推荐位的商品信息
     * @param $rec_id 推荐位id
     * @param $limit  输出的数量
     * @return false|\PDOStatement|string|\think\Collection
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function getGoodsInfo($rec_id, $limit)
    {
        //获取推荐位的商品id
        $_rec_item = db('rec_item')->where(array('value_type' => 1, 'rec_id' => $rec_id))->select();
        $rec_item = array();
        foreach ($_rec_item as $k => $v)
        {
            $rec_item[] = $v['value_id'];
        }

        //查询所有的商品
        $map['goods_id'] = array('IN', $rec_item);
        $goodsInfo['goodsInfo'] = $this->where($map)->field('goods_id,goods_name,md_thumb,markte_price,shop_price')->limit($limit)->select();

        //获取推荐位的名称
        $goodsInfo['rec_name']= db('recom')->where(array('rec_id' => $rec_id, 'rec_type' => 1))->field('rec_name')->find();

        //返回
        return $goodsInfo;
    }

    /**
     * 获取首页一，二级分类下的首页推荐商品
     * @param $cateId  商品类型id
     * @param $recId   推荐位id
     * @return mixed
     * @throws \think\Exception
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function gerHomeRecGoods($cateId, $recId)
    {
        //获取当前主分类的子类id
        $cateTree = new Catetree();
        $sonIds = $cateTree->childrenids($cateId, db('Goodsclass'));
        $sonIds[] = $cateId;

        //获取新品推荐位的信息
        $_homeRecInfo = db('rec_item')->where(array('rec_id' => $recId, 'value_type' => 1))->select();
        $homeRecInfo = array();
        foreach ($_homeRecInfo as $kk => $vv)
        {
            $homeRecInfo[] = $vv['value_id'];
        }

        //组装条件
        $where['goodsclass_id'] = array('IN', $sonIds);
        $where['goods_id'] = array('IN', $homeRecInfo);

        //获取首页推荐的商品
        $homeGoodsList = db('goods')->where($where)->limit(6)->order('addtime desc')->select();

        //返回
        return $homeGoodsList;
    }

    /**
     * 根据会员等级计算会员商品价格
     * @param $goods_id 商品id
     * @return float|int|mixed
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function getMemberPrice($goods_id)
    {
        $level_id = session('level_id');//等级id
        $level_rates = session('level_rates');//等级折扣率
        $goodsInfo = $this->find($goods_id);

        if (session('uid')) {//是否登录的价格
            $member_price = db('member_price')->where(array('mlevel_id' => $level_id, 'goods_id' => $goods_id))->find();
            if ($member_price) {//是否设置会员价格
                $price = $member_price['member_price'];
            } else {
                //计算会员折扣率后的价格
                $level_rates = $level_rates/100;
                $price = $goodsInfo['shop_price'] * $level_rates;
            }
        } else {
            $price = $goodsInfo['shop_price'];
        }
        return $price;
    }

    //获取商品本店价格
    public function getShoppPrice($goodsId)
    {
        $goodsInfo = $this->field('shop_price')->find($goodsId);

        return $goodsInfo['shop_price'];
    }

}