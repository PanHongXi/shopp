<?php

namespace app\index\controller;

class Index extends Base
{
    /**
     * @return \think\response\View
     */
    public function index()
    {
        //是否缓存
        $cache = $this->confIng['cache'];

        //缓存时间
        $cache_time = $this->confIng['cache_time'];

        $articleModel = model('article');
        $goodsModel = model('Goods');
        $goodsclassModel = model('Goodsclass');

        //获取首页公告文章
        if (cache('homeNotice')) {
            $homeNotice = cache('homeNotice');
        } else {
            $homeNotice = $articleModel->getArticleList(31, 3);
            if ($cache == '是') {
                cache('homeNotice', $homeNotice, $cache_time);
            }
        }

        //获取首页促销文章
        if (cache('homeSales')) {
            $homeSales = cache('homeSales');

        } else {
            $homeSales = $articleModel->getArticleList(38, 3);
            if ($cache == '是') {
                cache('homeSales', $homeSales, $cache_time);
            }
        }

       //获取首页推荐的商品
       if (cache('homeRecList')) {
            $homeRecList = cache('homeRecList');
       } else {
           $homeRecList = $goodsModel->getGoodsInfo(13, 20);
           if ($cache == '是') {
               cache('homeRecList', $homeRecList, $cache_time);
           }
       }

       //首页顶级推荐分类
       if (cache('homeClassList')) {
            $homeClassList = cache('homeClassList');
       } else {
           $homeClassList = $goodsclassModel->getRacClass(11, 0);
           foreach ($homeClassList as $k => $v)
           {
               //获取首页推荐二级分类
               $homeClassList[$k]['children'] = $goodsclassModel->getRacClass(11, $v['id']);

               //获取二，三级的首页推荐商品
               foreach ($homeClassList[$k]['children'] as $k1 => $v1)
               {
                   $homeClassList[$k]['children'][$k1]['bestRecGoods'] = $goodsModel->gerHomeRecGoods($v1['id'], 12);
               }

               //获取首页新品推荐的商品
               $homeClassList[$k]['newRecGoods'] = $goodsModel->gerHomeRecGoods($v['id'], 12);

               //获取顶级分类的推荐广告
               $homeClassList[$k]['newRecBrands'] = $goodsclassModel->getSpread($v['id']);

               //获取顶级分类的左侧商品
               $homeClassList[$k]['newRecPositionA'] = model('CategoryAd')->getCategoryAd($v['id'], 'A');
               $homeClassList[$k]['newRecPositionB'] = model('CategoryAd')->getCategoryAd($v['id'], 'B');
           }

           if ($cache == '是') {
               cache('homeClassList', $homeClassList, 3600);
           }
       }

        //获取首页轮播
        if (cache('broadList')) {
            $broadList = cache('broadList');
        } else {
            $broadList = model('broadcast')->getBroadcast();
            if ($cache == '是') {
                cache('broadList', $broadList, 3600);
            }
        }

       //输出
        $this->assign([
            'homeNotice' => $homeNotice,
            'homeSales' => $homeSales,
            'homeRecList' => $homeRecList,
            'homeClassList' => $homeClassList,
            'broadList' => $broadList,
            'show_right' => 1,//判断分类与商品列表的样式
            'show_nav' => 1,//首页导航默认情况是展示的，其他是隐藏的
        ]);

       //模板
        return view();
    }
}
