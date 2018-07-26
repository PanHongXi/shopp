<?php
namespace app\admin\controller;
use Catetree\Catetree;
class Broadcast extends Base
{
    public function broadList()
    {

        $tree = new Catetree();
        $broadcast = db('broadcast');

        //处理排序
        if (request()->isPost())
        {
            $data = input('post.');
            $broadcast = $tree->sorts($data['sort'], $broadcast);
            return alert('修改排序成功！', 'broadList' ,'6', 3);
        }

        $list = db('broadcast')->order('sort desc')->paginate(20);
        $pages = $list->render();
        $this->assign([
            'list' => $list,
            'pages' => $pages
        ]);

        return view();
    }

    public function broadAdd()
    {
        $update = new Catetree();
        $url = 'broadcast';
        if (request()->isPost())
        {
            $data = input('post.');

            if (false !== stripos(input('post.link_url'), 'http://'))
            {
                $data['link_url'] = input('post.link_url');
            }
            else
            {
                $data['link_url'] = 'http://' . input('post.link_url');
            }

            $data['addtime'] = time();
            if ($_FILES['thumb']['tmp_name'])
            {
                $data['thumb'] = $url.'/'.$update->upload($url);
            }

            $broadcast = db('broadcast')->insert($data);
            if ($broadcast) {

                return alert('添加成功！', 'broadList', '6', '3');
            }else{

                return alert('添加成功！', 'broadList', '5', '3');
            }
            return;
        }
        return view();
    }

    public function broadEdit($id)
    {
        $list = db('broadcast');
        $update = new Catetree();
        $url = 'broadcast';
        if (request()->isPost())
        {
            $data = input('post.');

            if (false !== stripos(input('post.link_url'), 'http://'))
            {
                $data['link_url'] = input('post.link_url');
            }
            else
            {
                $data['link_url'] = 'http://' . input('post.link_url');
            }

            $data['addtime'] = time();
            if ($_FILES['thumb']['tmp_name'])
            {
                //删除旧的的图片
                $oldBrandLogo = $list->where(array('id' => $id))->field('thumb')->find();
                $oldBrandLogo = IMG . $oldBrandLogo['thumb'];
                if (file_exists($oldBrandLogo)) {
                    @unlink($oldBrandLogo);
                }

                $data['thumb'] = $url.'/'.$update->upload($url);
            }
            $broadcast = $list->where(array('id' => $id))->setField($data);
            if ($broadcast) {

                return alert('修改成功！', '', '6', '3');
            }else{

                return alert('添加失败！', '', '5', '3');
            }
            return;
        }

        //获取数据
        $info = $list->where(array('id'=> $id))->find();

        //输出
        $this->assign([
            'info' => $info,
        ]);
        return view();
    }

    public function broadDel($id)
    {
        //删除旧的的图片
        $oldBrandLogo = db('broadcast')->where(array('id' => $id))->field('thumb')->find();
        $oldBrandLogo = IMG . $oldBrandLogo['thumb'];
        if (file_exists($oldBrandLogo))
        {
            @unlink($oldBrandLogo);
        }

        $broadcast = db('broadcast')->delete($id);
        if ($broadcast)
        {
           $this->success('删除成功！', 'broadList');

        }
        else
        {
            $this->success('删除失败！', 'broadList');
        }

    }

}