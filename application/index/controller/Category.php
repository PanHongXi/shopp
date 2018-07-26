<?php

namespace app\index\controller;

class Category extends Base
{
    /**
     * 商品导航栏分类
     * @return \think\response\View
     */
    public function category()
    {
        return view();
    }

    /**
     * 导航栏的二三级分类以及推荐的品牌广告
     * ajax获取
     * @param $id
     * @return \think\response\Json
     */
    public function getCateInfo($id)
    {

        $class = model('Goodsclass');

        //获取数据
        $classRes = $class->getSonClass($id);
        $classWords = $class->getClassWords($id);
        $brand_spread = $class->getSpread($id);

        //二三级分类
        $subitems = '';
        foreach ($classRes as $k => $v)
        {
            $subitems .= '<dl class="dl_fore1"><dt><a href="'.url('index/Category/category', ['id' => $v['id']]).'" target="_blank">'.$v['class_name'].'</a></dt><dd>';
                        foreach ($v['children'] as $k1 => $v1)
                        {
                            $subitems .='<a href="'.url('index/Category/category', ['id' => $v1['id']]).'" target="_blank">'.$v1['class_name'].'</a>';
                        }

            $subitems .= '</dd></dl><div class="item-brands"><ul></ul></div><div class="item-promotions"></div>';
        }

        //分类关联词
        $channels = '';
        foreach ($classWords as $k => $v)
        {
            $channels .= '<a href="'.url('index/Category/category', ['category_id' => $v['category_id']]).'" target="_blank">'.$v['words'].'</a>';
        }

        //推荐广告
        $spread = '';
        $spread .= '<div class="cate-brand">';
        foreach ($brand_spread['brands'] as $k => $v)
        {
            $spread .= '<div class="img"><a href="#" target="_blank" title="'. $v['brand_name'] .'"><img src="'.config('view_replace_str.__IMG__').'/'.$v['thumb'].'"></a></div>';
        }
        $spread .= '</div>';

        $spread .= '<div class="cate-promotion">';
        $spread .= '<a href="'.$brand_spread['spread']['brand_url'].'" target="_blank"><img src="'.config('view_replace_str.__IMG__').'/'.$brand_spread['spread']['brand_img'].'" width="199" height="97"></a>';
        $spread .= '</div>';

        //输出
        $data = array();
        $data['topic_content'] = $channels;
        $data['cat_content'] = $subitems;
        $data['brands_ad_content'] = $spread;
        $data['cat_id'] = $id;

        //返回json数据
        return json($data);
    }
}