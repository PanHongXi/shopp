<?php
namespace app\admin\controller;
use think\Controller;

class Classwords extends Base
{
    public function wordsList()
    {
        $words = db('category_words');

        //处理排序
        if (request()->isPost())
        {
            $data = input('post.');

            foreach ($data['sort'] as $k => $v)
            {
                $words->where('id', '=', $k)->update(array('sort' => $v));
            }
            return alert('导航排序成功！', 'wordsList', 6, 3);
        }

        //获取数据类表
        $wordsRes = $words->alias('c')->join('goodsclass g', 'c.category_id=g.id')->field('c.*,g.class_name')->paginate(15);

        //分页
        $page = $wordsRes->render();

        //输出
        $this->assign([
            'wordsRes' => $wordsRes,
            'page' => $page,

        ]);
        return view('wordsList');
    }

    public function wordsSave($id)
    {
        $words = db('category_words');

        if (request()->isPost())
        {
            $data = input('post.');

            //链接处理
            if (false !== stripos(input('post.link_url'), 'http://')) {
                $data['link_url'] = input('post.link_url');
            } else {
                $data['link_url'] = 'http://' . input('post.link_url');
            }

            //保存
            if ($id == 0)
            {
                $info = $words->insert($data);
            }
            else
            {
                $info = $words->where(array('id' => $id))->setField($data);
            }

            if ($info)
            {
                $this->success('保存成功！', 'wordsList');
            }
            else
            {
                $this->success('保存失败！', 'wordsList');
            }
        }

        //获取顶级分类
        $cateList = db('Goodsclass')->where(array('pid' => 0))->field('id,class_name')->select();

        //获取数据
        $info = $words->where(array('id' => $id))->find();

        //输出
        $this->assign([
            'cateList' => $cateList,
            'info' => $info,
        ]);

        return view('wordsSave');
    }

    public function wordsDel($id)
    {
        $list = db('category_words')->where(array('id' => $id))->delete();
        if ($list)
        {
            $this->success('删除成功！', 'wordsList');
        }
        else
        {
            $this->success('删除失败！', 'wordsList');
        }
    }
}