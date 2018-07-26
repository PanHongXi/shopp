<?php
namespace app\common\model;

use think\Model;

class Goodsclass extends Model
{
    /**
     * 获取商品的分类
     * @return false|\PDOStatement|string|\think\Collection
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function getGoodsClass ()
    {
        //获取分类
        $goodsClass = db('goodsclass')->where(array('pid' => 0))->select();
        foreach ($goodsClass as $k => $v)
        {
            //获取二级分类
            $goodsClass[$k]['children'] = $this->where(array('pid' => $v['id']))->select();
        }

        //返回
        return $goodsClass;
    }

    /**
     * 通过顶级id获取二级，三级分类
     * @param $id 顶级id
     * @return false|\PDOStatement|string|\think\Collection
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function getSonClass($id)
    {
        $classRes = db('goodsclass')->where(array('pid' => $id))->select();//获取二级分类
        foreach ($classRes as $k => $v)
        {
            //获取三级分类
            $classRes[$k]['children'] = $this->where(array('pid' => $v['id']))->select();
        }

        return $classRes;
    }

    /**
     * 获取分类关联词
     * @param $id 分类id
     * @return false|\PDOStatement|string|\think\Collection
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function getClassWords($id)
    {
        $classWords = db('category_words')->where(array('category_id' => $id))->select();

        return $classWords;
    }

    /**
     * 获取导航的推荐广告
     * @param $id
     * @return array
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function getSpread($id)
    {
        $brand = db('brand');
        $data = array();
        $brand_spread = db('brand_spread')->where(array('category_id' => $id))->find();
        $brand_id =explode(',', $brand_spread['brand_id']);
        foreach ($brand_id as $k => $v)
        {
            $data['brands'][] = $brand->find($v);
        }

        //获取推广的图片路径
        $data['spread']['brand_img'] = $brand_spread['brand_img'];
        $data['spread']['brand_url'] = $brand_spread['brand_url'];

        //返回
        return $data;
    }

    /**
     * 获取首页推荐分类
     * @param $rec_id 推荐id
     * @param int $pid  父级id
     * @return array
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function getRacClass($rec_id, $pid = 0)
    {
        $_classRsc = db('rec_item')->where(array('rec_id' => $rec_id, 'value_type' => 2))->select();
        $classRsc = array();
        foreach ($_classRsc as $k => $v)
        {
            //判断数组是否有数据
            $classRes = db('goodsclass')->where(array('id' => $v['value_id'], 'pid' => $pid))->find();
            if ($classRes)
            {
                $classRsc[] = $classRes;
            }
        }

        //返回
        return $classRsc;
    }
}