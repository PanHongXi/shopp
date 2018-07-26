<?php

namespace app\admin\model;

use think\Model;

class Goodsclass extends Model
{
    protected $field = true;

    protected static function init()
    {
        //后置钩子方法获取商品分类的id
        Goodsclass::afterInsert(function ($goodsClasss)
        {
            $goodsData = input('post.');//接收商品分类的数据
            $id = $goodsClasss->id;//接收商品的id

            //处理商品推荐位
            if (isset($goodsData['recpos']))
            {
                foreach ($goodsData['recpos'] as $k => $v)
                {
                    db('rec_item')->insert(['rec_id' => $v, 'value_id' => $id, 'value_type' => 2]);
                }
            }
        });

        //前置钩子，处理修改上传的商品分类数据
        Goodsclass::beforeUpdate(function ($goodsClasss)
        {
            $goodsData = input('post.');//接收商品分类的数据
            $id = $goodsClasss->id;

            //删除原来的推荐位数据
            $rec_item = db('rec_item');
            $rec_item->where(array('value_type' => 2, 'value_id' => $id))->delete();

            //插入新的推荐位数据
            if (isset($goodsData['recpos']))
            {
                foreach ($goodsData['recpos'] as $k => $v)
                {
                    $rec_item->insert(['rec_id' => $v, 'value_id' => $id, 'value_type' => 2]);
                }
            }
        });
    }
}