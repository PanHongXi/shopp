<?php

namespace app\admin\controller;

use think\Controller;
use Catetree\Catetree;//把无限极分类的类引用进来
class Goodsclass extends Base
{

    /**
     * 商品分类列表
     */
    public function GoodsList()
    {
        $GoodsclassTree = new Catetree();
        $GoodsclassObj = db('Goodsclass');

        //处理排序
        if (request()->isPost())
        {
            $data = input('post.');
            $GoodsclassSort = $GoodsclassTree->sorts($data['sort'], $GoodsclassObj);
            $this->success('修改排序成功！', 'GoodsList');
        }

        $GoodsclassRes = $GoodsclassObj->order('sort asc')->select();
        $GoodsclassRes = $GoodsclassTree->catetree($GoodsclassRes);

        $this->assign([
            'GoodsclassRes' => $GoodsclassRes,
        ]);
        return view();
    }

    /**
     * 商品分类添加
     */
    public function GoodsAdd()
    {
        if (request()->isPost())
        {
            $data = input('post.');

            //验证添加的数据
            $validate = validate('Goodsclass');
            if (!$validate->check($data))
            {
                $this->error($validate->getError());
                die;
            }

            $upload = new Catetree();
            $url = 'goodsclass';
            $data['addtime'] = time();

            //图片处理
            if ($_FILES['thumb']['tmp_name'])
            {
                $data['thumb'] = $url . '/' . $upload->upload($url);
            }

            //执行添加操作
            $Goodsclass = model('Goodsclass')->save($data);

            if ($Goodsclass)
            {
                $this->success('添加分类成功！', 'GoodsList');
            }
            else
            {
                $this->error('添加分类失败！', 'GoodsAdd');
            }
        }

        //获取推荐位
        $recomRes = db('recom')->where(array('rec_type' => 2))->select();

        $GoodsclassRes = model('Goodsclass')->select();
        $GoodsclassTree = new Catetree();
        $GoodsclassRes = $GoodsclassTree->catetree($GoodsclassRes);

        $this->assign([
            'GoodsclassRes' => $GoodsclassRes,
            'recomRes' => $recomRes
        ]);

        return view('GoodsAdd');
    }

    /**
     * 商品分类删除
     * 如果分类下面有子栏目的话会一起删除
     */
    public function GoodsclassDel($id)
    {
        $goodsClassRes = db('Goodsclass');

        $GoodsclassTree = new Catetree();
        $sonids = $GoodsclassTree->childrenids($id, $goodsClassRes);
        $sonids[] = intval($id);//获取本栏目的id

        //删除栏目前该栏目下是否有文章和图片
        foreach ($sonids as $k => $v)
        {
            $artRes = $goodsClassRes->field('id,thumb')->where(array('id' => $v))->select();
            foreach ($artRes as $k1 => $v1)
            {
                $thumbSrc = IMG . $v1['thumb'];
                if (file_exists($thumbSrc))
                {
                    @unlink($thumbSrc);
                }
            }
        }
        $del = $goodsClassRes->delete($sonids);
        if ($del)
        {
            //删除原来的推荐位数据
            $rec_item = db('rec_item');
            $rec_item->where(array('value_type' => 2, 'value_id' => $id))->delete();
            $this->success('删除分类成功！', 'GoodsList');
        }
        else
        {
            $this->error('删除分类失败！', 'GoodsList');
        }
    }

    /**
     *商品分类修改
     */
    public function GoodsEdit($id)
    {
        $Goodsclass = model('Goodsclass');
        $update = new Catetree();
        $url = 'goodsclass';

        if (request()->isPost())
        {
            $data = input('post.');
            if ($_FILES['thumb']['tmp_name'])
            {
                //删除旧的的图片
                $oldGoodsImg = $Goodsclass->where(array('id' => $id))->field('thumb')->find();
                $oldGoodsImg = IMG . $oldGoodsImg['thumb'];
                if (file_exists($oldGoodsImg))
                {
                    @unlink($oldGoodsImg);
                }
                $data['thumb'] = $url . '/' . $update->upload($url);
            }

            $save = $Goodsclass->update($data);

            if (false !== $save)
            {
                $this->success('修改成功！', 'GoodsList');
            }
            else
            {
                $this->success('修改失败！', 'GoodsList');
            }
            die;
        }

        $GoodsclassEdit = $Goodsclass->where(array('id' => $id))->find();
        $GoodsclassRes = $Goodsclass->select();

        $GoodsclassTree = new Catetree();
        $GoodsclassRes = $GoodsclassTree->Catetree($GoodsclassRes);

        //获取商品推荐位
        $_goodsClass_rec_item = db('rec_item')->where(array('value_type' => 2, 'value_id' => $id))->select();
        $goodsClass_rec_item = array();
        foreach ($_goodsClass_rec_item as $k => $v)
        {
            $goodsClass_rec_item[] = $v['rec_id'];
        }

        //获取推荐位
        $recomRes = db('recom')->where(array('rec_type' => 2))->select();

        $this->assign([
            'GoodsclassRes' => $GoodsclassRes,
            'GoodsclassEdit' => $GoodsclassEdit,
            'goodsClass_rec_item' => $goodsClass_rec_item,
            'recomRes' => $recomRes
        ]);

        return view('GoodsEdit');
    }

    /**
     * 商品分类预览
     */
    public function previvew($id)
    {
        $Goodsclass = db('Goodsclass');
        $GoodsclassEdit = $Goodsclass->where(array('id' => $id))->find();
        $GoodsclassRes = $Goodsclass->select();
        $GoodsclassTree = new Catetree();
        $GoodsclassRes = $GoodsclassTree->Catetree($GoodsclassRes);
        $this->assign([
            'GoodsclassRes' => $GoodsclassRes,
            'GoodsclassEdit' => $GoodsclassEdit,
        ]);
        return view();
    }
}