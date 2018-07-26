<?php

namespace app\admin\controller;

use think\Controller;
use Catetree\Catetree;

class Article extends Base
{
    /**
     * 文章列表
     */
    public function articleList()
    {
        $articleRes = db('article')
            ->alias('a')
            ->join('sh_cate c', 'a.cate_id = c.id')
            ->field('a.*,c.cate_name')
            ->paginate(15);
        $page = $articleRes->render();
        $this->assign([
            'articleRes' => $articleRes,
            'page' => $page,
        ]);
        return view('articleList');
    }

    /**
     * 文章添加
     */
    public function articleAdd()
    {

        $upload = new Catetree();
        $url = 'article';
        if (request()->isPost()) {
            $data = input('post.');
            if (false !== stripos(input('post.link_url'), 'http://')) {
                $data['link_url'] = input('post.link_url');
            } else {
                $data['link_url'] = 'http://' . input('post.link_url');
            }

            //验证添加的数据
            $validate = validate('Article');
            if (!$validate->check($data)) {
                $this->error($validate->getError());
                die;
            }
            $data['addtime'] = time();
            //图片处理
            if ($_FILES['thumb']['tmp_name']) {
                $data['thumb'] = $url . '/' . $upload->upload($url);
            }

            $brand = db('Article')->insert($data);
            if ($brand) {
                $this->success('添加文章成功！', url('Article/articleList'));

            } else {
                $this->error('添加文章失败！');
            }

            return;
        }

        $cateRes = db('cate')->select();
        $cateTree = new Catetree();
        $cateRes = $cateTree->catetree($cateRes);
        $this->assign([
            'cateRes' => $cateRes,
        ]);
        return view('articleAdd');
    }

    /**
     * 文章删除
     */
    public function articleDel($article_id)
    {
        $article = db('article')->delete($article_id);
        //删除旧的的图片
        $oldBrandLogo = db('article')->where(array('id' => $article_id))->field('thumb')->find();
        $oldBrandLogo = IMG . $oldBrandLogo['thumb'];
        if (file_exists($oldBrandLogo)) {
            @unlink($oldBrandLogo);
        }
        if ($article) {
            $this->success('删除文章成功！');

        } else {
            $this->error('删除文章失败！');
        }
    }

    /**
     * 文章修改
     */
    public function articleEdit($article_id)
    {

        $upload = new Catetree();
        $url = 'article';
        if (request()->isPost()) {
            $data = input('post.');
            $data['edittime'] = time();
            if (false !== stripos(input('post.link_url'), 'http://')) {
                $data['link_url'] = input('post.link_url');
            } else {
                $data['link_url'] = 'http://' . input('post.link_url');
            }
            if ($_FILES['thumb']['tmp_name']) {
                //删除旧的的图片
                $oldBrandLogo = db('article')->where(array('id' => $article_id))->field('thumb')->find();
                $oldBrandLogo = IMG . $oldBrandLogo['thumb'];
                if (file_exists($oldBrandLogo)) {
                    @unlink($oldBrandLogo);
                }
                $data['thumb'] = $url . '/' . $upload->upload($url);
            }
            //验证添加的数据
            $validate = validate('Article');
            if (!$validate->check($data)) {
                $this->error($validate->getError());
                die;
            }
            $article = db('article')->where(array('id' => $article_id))->setField($data);
            if ($article !== false) {
                $this->success('修改文章成功！', url('Article/articleList'));

            } else {
                $this->error('修改文章失败！');
            }
        }
        //获取处理无限极数据
        $articleRes = db('article')->where(array('id' => $article_id))->find();
        $cateRes = db('cate')->select();
        $cateTree = new Catetree();
        $cateRes = $cateTree->catetree($cateRes);
        $this->assign([
            'articleRes' => $articleRes,
            'cateRes' => $cateRes,
        ]);
        return view('articleEdit');
    }

    /**
     *
     * 文章预览
     */
    public function preview($article_id)
    {
        $articleRes = db('article')->where(array('id' => $article_id))->find();
        $cateRes = db('cate')->select();
        $cateTree = new Catetree();
        $cateRes = $cateTree->catetree($cateRes);
        $this->assign([
            'articleRes' => $articleRes,
            'cateRes' => $cateRes,
        ]);
        return view('preview');
    }
}