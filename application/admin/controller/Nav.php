<?php

namespace app\admin\controller;

use think\Controller;

class Nav extends Base
{

    public function navList()
    {
        $nav = db('nav');

        //处理排序
        if (request()->isPost())
        {
            $data = input('post.');

            foreach ($data['nav_sort'] as $k => $v)
            {
                $nav->where('nav_id', '=', $k)->update(array('nav_sort' => $v));
            }

            return alert('导航排序成功！', 'navList', 6, 3);
        }

        $navRes = $nav->paginate(15);
        $page = $navRes->render();
        $this->assign([
            'navRes' => $navRes,
            'page' => $page,
        ]);

        return view('navList');
    }

    public function navSave($nav_id)
    {
        $nav = db('nav');
        if (request()->isPost())
        {
            $data = input('post.');
            $data['addtime'] = time();

            if (false !== stripos(input('post.nav_url'), 'http://'))
            {
                $data['nav_url'] = input('post.nav_url');
            }
            else
            {
                $data['nav_url'] = 'http://' . input('post.nav_url');
            }

            //验证数据
            $validate = validate('nav');
            if (!$validate->check($data))
            {
                $this->error($validate->getError());
                die;
            }

            //保存数据
            if ($nav_id == 0)
            {
                $nav = $nav->insert($data);
            }
            else
            {
                $nav = $nav->where(array('nav_id' => $nav_id))->setField($data);
            }

            if ($nav !== false)
            {
                $this->success('导航保存成功！', url('Nav/navList'));
            }
            else
            {
                $this->error('导航保存失败！', url('Nav/navList'));
            }
        }

        $navRes = $nav->where(array('nav_id' => $nav_id))->find();
        $this->assign([
            'navRes' => $navRes,
        ]);
        return view('navSave');
    }

    public function navDel($nav_id)
    {
        $nav = db('nav')->delete($nav_id);
        if ($nav)
        {
            $this->success('删除成功！', url('Nav/navList'));
        }
        else
        {
            $this->error('删除失败！', url('Nav/navList'));
        }
    }

}