<?php

namespace app\index\controller;

use think\Controller;
class Base extends Controller
{
    public $confIng;//获取配置项

    public function _initialize()
    {
        $this->_getFooterArts();//获取并分配底部分类
        $this->_getNav(); //顶部，中间导航
        $this->_getConfs();//获取分配配置项
        $this->_getGoodsClass();//获取商品的分类
    }

    //获取底部
    private function _getFooterArts ()
    {
        //获取并分配底部分类
        if (cache('helpCateRes')) {
            $helpCateRes = cache('helpCateRes');
        } else {
            $helpCateRes = model('Article')->getFooterArts();
            if ($this->confIng['cache'] == '是') {
                cache('helpCateRes', $helpCateRes , $this->confIng['cache_time']);
            }
        }

        //获取底部网店帮助文章
        if (cache('helpShoppRes')) {
            $helpShoppRes = cache('helpShoppRes');
        } else {
            $helpShoppRes = model('Article')->getShopInfo();
            if ($this->confIng['cache'] == '是') {
                cache('helpShoppRes', $helpShoppRes ,$this->confIng['cache_time']);
            }
        }

        $this->assign([
            'helpCateRes' => $helpCateRes,
            'helpShoppRes' => $helpShoppRes,
        ]);
    }

    //顶部，中间导航
    private function _getNav()
    {

       if (cache('navRes')) {
           $navRes = cache('navRes');
       } else {
           $_navRes = db('nav')->order('nav_sort asc')->select();
           $navRes = array();
           foreach ($_navRes as $k => $v)
           {
                $navRes[$v['nav_pos']][] = $v;
           }

           if ($this->confIng['cache'] == '是') {
               cache('navRes' ,$navRes, $this->confIng['cache_time']);
           }
       }

       $this->assign([
           'navRes' => $navRes
       ]);
    }

    private function _getConfs ()
    {
        $confRes = model('Conf')->getConf();
        $this->confIng = $confRes;
        $this->assign([
            'confRes' => $confRes
        ]);
    }

    //获取商品的分类
    private function _getGoodsClass()
    {
        if (cache('goodsClassList')) {
           $goodsClassList = cache('goodsClassList');
        } else {
           $goodsClassList = model('Goodsclass')->getGoodsClass();

           if ($this->confIng['cache'] == '是') {
               cache('goodsClassList', $goodsClassList, $this->confIng['cache_time']);
           }
        }

        $this->assign([
            'goodsClassList' => $goodsClassList,
        ]);
    }


}