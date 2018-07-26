<?php

namespace app\admin\controller;

use think\Controller;
use Catetree\Catetree;

class Goodstype extends Base
{
    /**
     * 商品类型列表
     */
    public function typeList()
    {

        $typeRes = db('goodstype')->paginate('15');
        $page = $typeRes->render();
        $this->assign([
            'typeRes' => $typeRes,
            'page' => $page,
        ]);
        return view();
    }

    /**
     * 商品类型添加
     */
    public function typeAdd()
    {

        if (request()->isPost()) {
            $data = input('post.');
            $goodsType = db('goodstype')->insert($data);
            if ($goodsType) {
                $this->success('添加成功！', url('Goodstype/typeList'));
            } else {
                $this->error('添加失败！', url('Goodstype/typeAdd'));
            }
            return;
        }
        return view();
    }

    /**
     * 商品类型修改
     */
    public function typeEdit($id)
    {

        $goodsType = db('goodstype');
        if (request()->isPost()) {
            $data = input('post.');
            if (empty($data['type_name'])) {
                $this->error('类型名称不能为空！', url('Goodstype/typeList'));
                die;
            }
            $goodsType = $goodsType->where(array('id' => $id))->setField($data);
            if ($goodsType != false) {
                $this->success('修改成功！', url('Goodstype/typeList'));
            } else {
                $this->error('修改失败！', url('Goodstype/typeList'));
            }
        }
        $typeRes = $goodsType->where(array('id' => $id))->find();
        $this->assign([
            'typeRes' => $typeRes,
        ]);
        return view();
    }

    /**
     * 商品类型删除
     */
    public function typeDel($id)
    {
        $del = db('goodstype')->delete($id);
        if ($del) {
            $this->success('删除成功！',url('Goodstype/typeList'));
        }else{
            $this->error('删除失败！', url('Goodstype/typeList'));
        }
    }

}