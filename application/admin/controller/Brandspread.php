<?php

namespace app\admin\controller;

use think\Controller;
use Catetree\Catetree;
class Brandspread extends Base
{
    public function bsList()
    {
        $spread = db('brand_spread bs');

        //处理排序
        if (request()->isPost())
        {
            $data = input('post.');
            if ($data['sort'])
            {
                foreach ($data['sort'] as $k => $v)
                {
                    $spread->where(array('id' => $k))->update(array('sort' => $v));
                }
               $this->success('保存成功！', 'bsList');
            }
        }

        //处理列表查询
        $list = $spread
            ->join('brand br', 'find_in_set(br.brand_id,bs.brand_id)')
            ->join('goodsclass gc', 'gc.id=bs.category_id')
            ->field('bs.*,GROUP_CONCAT(br.brand_name) brand_name,gc.class_name')
            ->group('bs.id')
            ->paginate(15);
        $page = $list->render();

        //输出
        $this->assign([
            'list' => $list,
            'page' => $page
        ]);


        return view('bsList');
    }

    public function bsSave($id)
    {
        $bsSpread = db('brand_spread');
        $update = new Catetree();
        $url = 'spread';

        if (request()->isPost())
        {
            $data = input('post.');
            $data['addtime'] = time();

            //处理网址
            if (false !== stripos(input('post.brand_url'), 'http://'))
            {
                $data['brand_url'] = input('post.brand_url');
            }
            else if ($data['brand_url'] == null)
            {
                $data['brand_url'] = '';
            }
            else
            {
                $data['brand_url'] = 'http://' . input('post.brand_url');
            }

            //处理图片
            if ($_FILES['thumb']['tmp_name'])
            {
                //删除旧的的图片
                $oldBrandLogo = $bsSpread->where(array('id' => $id))->field('brand_img')->find();
                $oldBrandLogo = IMG . $oldBrandLogo['brand_img'];
                if (file_exists($oldBrandLogo))
                {
                    @unlink($oldBrandLogo);
                }

                $data['brand_img'] = $url .'/'. $update->upload($url);
            }

            //处理品牌
            if (isset($data['brand_id']))
            {
                $data['brand_id'] = implode(',', $data['brand_id']);
            }
            else
            {
                $data['brand_id'] = '';
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
                $this->success('保存成功！', 'bsList');
            }
            else
            {
                $this->error('保存成功！', 'bsList');
            }

        }

        //获取商品分类
        $cates = db('goodsclass')->where(array('pid' => 0))->field('id,class_name')->select();

        //获取品牌
        $brands = db('brand')->field('brand_id,brand_name')->select();

        //获取数据
        $info = $bsSpread->where(array('id' => $id))->find();

        //输出
        $this->assign([
            'cates' => $cates,
            'brands' => $brands,
            'info' => $info,
            'id' => $id,
        ]);


        return view();
    }

    public function bsDel($id)
    {
        $bsSpread = db('brand_spread');

        //删除旧的的图片
        $oldBrandLogo = $bsSpread->where(array('id' => $id))->field('brand_img')->find();
        $oldBrandLogo = IMG . $oldBrandLogo['brand_img'];
        if (file_exists($oldBrandLogo))
        {
            @unlink($oldBrandLogo);
        }

        $spreadDel = $bsSpread->where(array('id' => $id))->delete();
        if ($spreadDel)
        {
            $this->success('删除成功！', 'bsList');
        }
        else
        {
            $this->error('删除失败！', 'bsList');
        }
    }
}