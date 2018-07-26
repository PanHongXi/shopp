<?php

namespace app\admin\controller;

use think\Controller;
use Catetree\Catetree;

class Goodsattr extends Base
{
    /**
     * 商品属性类表
     */
    public function attrList()
    {

        $type_id = input('type_id');//接受商品类型传递过来的id，然后查询与之相关的属性
        if ($type_id) {
            $map['type_id'] = ['=', $type_id];
        } else {
            $map = 1;
        }
        $attrRes = db('goodsattr')
            ->where($map)
            ->alias('a')
            ->join('goodstype t', 'a.type_id=t.id')
            ->field('a.*,t.type_name')
            ->paginate(15);
        $page = $attrRes->render();
        $this->assign([
            'attrRes' => $attrRes,
            'page' => $page,
        ]);
        return view();
    }

    /**
     * 商品属性添加
     */
    public function attrAdd()
    {
        if (request()->isPost()) {
            $data = input('post.');

            //验证添加的数据
            $validate = validate('Goodsattr');
            if (!$validate->check($data)) {
                $this->error($validate->getError());
                die;
            }

            $data['atrr_values'] = str_replace('，', ',', $data['atrr_values']);
            $attrAdd = db('goodsattr')->insert($data);
            if ($attrAdd) {
                $this->success('添加成功！', url('Goodsattr/attrList'));
            } else {
                $this->error('添加失败！', url('Goodsattr/attrList'));
            }
        }
        $typeRes = db('goodstype')->select();
        $this->assign([
            'typeRes' => $typeRes,
        ]);
        return view();
    }

    /**
     * 商品属性修改
     */
    public function attrEdit($id)
    {
        $goodsAttr = db('goodsattr');

        if (request()->isPost()) {
            $data = input('post.');
            if (empty($data['attr_name'])) {
                $this->error('属性名称不能为空！');
                die;
            }

            $data['atrr_values'] = str_replace('，', ',', $data['atrr_values']);//转换传递过来的属性值，改变中文逗号
//            $data['atrr_values'] = str_replace('。', ',', $data['atrr_values']);//转换传递过来的属性值，改变中文逗号
            $atrrEdit = $goodsAttr->where(array('id' => $id))->setField($data);
            if ($atrrEdit) {
                $this->success('修改成功！', url('Goodsattr/attrList'));
            } else {
                $this->error('修改失败！');
            }
        }
        $attrRes = $goodsAttr->where(array('id' => $id))->find();//获取商品属性
        $typeRes = db('goodstype')->select();//获取商品类型
        $this->assign([
            'attrRes' => $attrRes,
            'typeRes' => $typeRes,
        ]);
        return view();
    }

    /**
     * 属性删除
     */
    public function attrDel($id)
    {
        $attrDel = db('goodsattr')->delete($id);
        if ($attrDel) {
            $this->success('删除成功!');
        } else {
            $this->error('删除失败!');
        }
    }

    /**
     * 异步获取商品属性
     */
    public function ajaxAttr()
    {
        $typeId = input('type_id');
        $goodsAttr = db('goodsattr')->where(array('type_id'=>$typeId))->select();
        echo json_encode($goodsAttr);
    }
}