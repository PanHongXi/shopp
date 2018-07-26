<?php

namespace app\admin\controller;

use Catetree\Catetree;
class CategoryAd extends Base
{
    public function adList()
    {
        $spread = db('category_ad c');

        //处理列表查询
        $list = $spread
            ->join('goodsclass gc', 'gc.id=c.category_id')
            ->field('c.*,gc.class_name')
            ->order('id desc')
            ->paginate(15);
        $page = $list->render();

        //输出
        $this->assign([
            'list' => $list,
            'page' => $page
        ]);


        return view('categoryad/adList');
    }

    public function adSave($id)
    {
        $bsSpread = db('category_ad');
        $update = new Catetree();
        $url = 'categoryad';

        if (request()->isPost())
        {
            $data = input('post.');

            //处理广告位的数据数量
            if ($data['position']  == 'B' || $data['position']  == 'C')
            {
                $categoryad = db('category_ad')->where(array('position' => $data['position'], 'category_id' => $data['category_id']))->count();
                if ($categoryad == 2)
                {
                    $this->error('同一栏目位置只能两条数据！', 'adList');
                }
            }

            //处理网址
            if (false !== stripos(input('post.link_url'), 'http://'))
            {
                $data['link_url'] = input('post.link_url');
            }
            else if ($data['link_url'] == null)
            {
                $data['link_url'] = '';
            }
            else
            {
                $data['link_url'] = 'http://' . input('post.link_url');
            }

            //处理图片
            if ($_FILES['thumb']['tmp_name'])
            {
                //删除旧的的图片
                $oldBrandLogo = $bsSpread->where(array('id' => $id))->field('img_url')->find();
                $oldBrandLogo = IMG . $oldBrandLogo['img_url'];
                if (file_exists($oldBrandLogo))
                {
                    @unlink($oldBrandLogo);
                }

                $data['img_url'] = $url .'/'. $update->upload($url);
            }

            //判断是修改还是新增数据
            if ($id == 0)
            {
                //保存数据
                $bsSpread = $bsSpread->insert($data);
            }
            else
            {
                $bsSpread = $bsSpread->where(array('id' => $id))->setField($data);
            }

            if ($bsSpread)
            {
                $this->success('保存成功！', 'adList');
            }
            else
            {
                $this->error('保存成功！', 'adList');
            }

        }

        //获取商品分类
        $cates = db('goodsclass')->where(array('pid' => 0))->field('id,class_name')->select();

        //获取数据
        $info = $bsSpread->where(array('id' => $id))->find();

        //输出
        $this->assign([
            'cates' => $cates,
            'info' => $info,
            'id' => $id,
        ]);

        return view('categoryad/adSave');
    }

    public function adDel($id)
    {
        $bsSpread = db('category_ad');

        //删除旧的的图片
        $oldBrandLogo = $bsSpread->where(array('id' => $id))->field('img_url')->find();
        $oldBrandLogo = IMG . $oldBrandLogo['img_url'];
        if (file_exists($oldBrandLogo))
        {
            @unlink($oldBrandLogo);
        }

        $spreadDel = $bsSpread->where(array('id' => $id))->delete();
        if ($spreadDel)
        {
            $this->success('删除成功！', 'adList');
        }
        else
        {
            $this->error('删除失败！', 'adList');
        }
    }
}