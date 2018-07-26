<?php
namespace app\index\controller;

class Article extends Base
{
    public function index ($id)
    {
        //是否缓存
        $cache = $this->confIng['cache'];

        //缓存时间
        $cache_time = $this->confIng['cache_time'];

        //获取普通顶级分类
        if (cache('comCateRes')) {
            $comCateRes = cache('comCateRes');
        } else {
            $comCateRes = model('cate')->getCate(5, 0);
            if ($cache == '是') {
                cache('comCateRes', $comCateRes, $cache_time);
            }
        }

        //获取系统分类
        if (cache('helpsCateRes')) {
            $helpsCateRes = cache('helpsCateRes');
        } else {
            $helpsCateRes = model('cate')->getCate(3, 2);
            if ($cache == '是') {
                cache('helpsCateRes', $helpsCateRes, $cache_time);
            }
        }

        //当前栏目的信息
        $artName = $id.'_arts';
        if (cache($artName)) {
            $artRes = cache($artName);
        } else {
            $artRes = db('article')->find($id);
            if ($cache == '是') {
                cache($artName, $artRes, $cache_time);
            }
        }

        //面包屑导航处理
        if (cache('position')) {
            $position = cache('position');
        } else {
            $position = model('cate')->position($artRes['cate_id']);
            if ($cache == '是') {
                cache('position', $position, $cache_time);
            }

        }

        //模板输出
        $this->assign([
            'show_right' => 1,//判断分类与商品列表的样式
            'comCateRes' => $comCateRes,
            'helpsCateRes' => $helpsCateRes,
            'artRes' => $artRes,
            'position' => $position,
        ]);

        return view('article');
    }
}