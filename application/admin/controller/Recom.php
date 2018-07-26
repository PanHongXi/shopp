<?php
namespace app\admin\controller;

use think\Controller;

class Recom extends Base
{
    public function recomList()
    {
        $recomRes = db('recom')->paginate(15);
        $page = $recomRes->render();
        $this->assign([
            'recomRes' => $recomRes,
            'page' => $page,
        ]);
        return view();
    }

    public function recSave($rec_id)
    {
        $recom = db('recom');
        if (request()->isPost()) {
            $data = input('post.');

            //验证添加的数据
            $validate = validate('Recom');
            if (!$validate->check($data)) {
                $this->error($validate->getError());
                die;
            }

            //判断是新增还是修改
            if ($rec_id == 0)
            {
                $recSave = $recom->insert($data);
            }
            else
            {
                $recSave = $recom->where(array('rec_id' => $rec_id))->setField($data);
            }

            if ($recSave !== false) {
                $this->success('保存成功！', url('Recom/recomList'));
            } else {
                $this->error('保存失败！', url('Recom/recomList'));
            }
        }

        //查询数据
        $recomRes = $recom->where(array('rec_id' => $rec_id))->find();

        //输出数据
        $this->assign([
            'recomRes' => $recomRes,
        ]);
        return view();
    }

    public function recomDel($rec_id)
    {
        $recom = db('recom')->where(array('rec_id' => $rec_id))->delete();
        if ($recom)
        {
            $this->success('删除成功！', url('Recom/recomList'));
        }
        else
        {
            $this->success('删除失败！', url('Recom/recomList'));
        }
    }
}