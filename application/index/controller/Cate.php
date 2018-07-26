<?php

namespace app\index\controller;
use catetree\Catetree;
class Cate extends Base
{
    public function index($id)
    {

        $cate = db('cate');

        //获取子栏目id及数据
        $cateTree = new Catetree();
        $ids = $cateTree->childrenids($id, $cate);
        $ids[] = $id;
        $map['cate_id'] = array('IN', $ids);
        $artRes = db('article')->where($map)->select();

        //当前栏目的信息
        $cates = $cate->find($id);

        //获取普通顶级分类
        $comCateRes = model('cate')->getCate(5, 0);

        //获取系统分类
        $helpsCateRes = model('cate')->getCate(3, 2);

        //模板输出
        $this->assign([
            'show_right' => 1,//判断分类与商品列表的样式
            'comCateRes' => $comCateRes,
            'helpsCateRes' => $helpsCateRes,
            'artRes' => $artRes,
            'cates' => $cates
        ]);
        return view('cate');
    }
}