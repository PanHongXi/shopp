<?php

namespace app\admin\controller;

use think\Controller;
use Catetree\Catetree;

class Link extends Base
{
    /**
     * 链接列表
     */
    public function linkList()
    {

        $cateTree = new Catetree();
        $linkObj = db('link');
        if (request()->isPost()) {
            $data = input('post.');
            $cateTree->sorts($data['sort'], $linkObj);
            $this->success('修改排序成功！', 'linkList');
        }
        $linkRes = db('link')->paginate(15);
        $page = $linkRes->render();
        $this->assign([
            'linkRes' => $linkRes,
            'page' => $page,

        ]);
        return view('linkList');
    }

    /**
     * 链接添加
     */
    public function linkAdd()
    {

        $update = new Catetree();
        $url = 'linklogo';
        if (request()->isPost()) {
            $data = input('post.');

            //链接处理
            if (false !== stripos(input('post.link_url'), 'http://')) {
                $data['link_url'] = input('post.link_url');
            } else {
                $data['link_url'] = 'http://' . input('post.link_url');
            }

            $data['addtime'] = time();
            //图片处理
            if ($_FILES['thumb']['tmp_name']) {
                $data['thumb'] = $url . '/' . $update->upload($url);
            }

            //验证添加的数据
            $validate = validate('link');
            if (!$validate->check($data)) {
                $this->error($validate->getError());
                die;
            }
            $link = db('link')->insert($data);
            if ($link) {
                $this->success('添加链接成功！', url('link/linkList'));

            } else {
                $this->error('添加链接失败！');
            }

            return;
        }

        return view();
    }


    /**
     * 链接删除
     */
    public function linkDel($link_id)
    {
        $link = db('link')->delete($link_id);
        //删除旧的的图片
        $oldlinkLogo = db('link')->where(array('id' => $link_id))->field('thumb')->find();
        $oldlinkLogo = IMG . $oldlinkLogo['thumb'];
        if (file_exists($oldlinkLogo)) {
            @unlink($oldlinkLogo);
        }
        if ($link) {
            $this->success('删除链接成功！', url('link/linkList'));

        } else {
            $this->error('删除链接失败！');
        }
    }

    /**
     * 链接修改
     */
    public function linkEdit($link_id)
    {
        $update = new Catetree();
        $url = 'linklogo';
        if (request()->isPost()) {
            $data = input('post.');
            if (false !== stripos(input('post.link_url'), 'http://')) {
                $data['link_url'] = input('post.link_url');
            } else {
                $data['link_url'] = 'http://' . input('post.link_url');
            }
            if ($_FILES['thumb']['tmp_name']) {
                //删除旧的的图片
                $oldlinkLogo = db('link')->where(array('link_id' => $link_id))->field('thumb')->find();
                $oldlinkLogo = IMG . $oldlinkLogo['thumb'];
                if (file_exists($oldlinkLogo)) {
                    @unlink($oldlinkLogo);
                }
                $data['thumb'] = $url . '/' . $update->upload($url);
            }

            //验证添加的数据
            $validate = validate('link');
            if (!$validate->check($data)) {
                $this->error($validate->getError());
                die;
            }

            $link = db('link')->where(array('id' => $link_id))->setField($data);
            if ($link !== false) {
                $this->success('修改链接成功！', url('link/linkList'));

            } else {
                $this->error('修改链接失败！');
            }
        }
        $linkRes = db('link')->where(array('id' => $link_id))->find();
        $this->assign([
            'linkRes' => $linkRes,
        ]);
        return view('linkEdit');
    }

    /**
     *
     * 链接预览
     */
    public function preview($link_id)
    {
        $linkRes = db('link')->where(array('id' => $link_id))->find();
        $this->assign([
            'linkRes' => $linkRes,
        ]);
        return view('preview');
    }
}