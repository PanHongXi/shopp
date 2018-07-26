<?php

namespace app\admin\controller;

use think\Controller;

class Memberlevel extends Base
{
    /**
     * 会员等列类表
     */
    public function levelList()
    {
        $levelRes = db('member_level')->order('level_id DESC')->paginate(15);
        $page = $levelRes->render();
        $this->assign([
            'levelRes' => $levelRes,
            'page' => $page,
        ]);
        return view();
    }

    /**
     * 会员等级添加
     */
    public function levelAdd()
    {
        if (request()->isPost()) {
            $data = input('post.');

            //验证添加的数据
            $validate = validate('Memberlevel');
            if (!$validate->check($data)) {
                $this->error($validate->getError());
                die;
            }
            if ($data['rates'] == null) {
                $data['rates'] = 100;
            }
            //添加时间
            $data['addtime'] = time();
            $levelAdd = db('member_level')->insert($data);
            if ($levelAdd) {
                $this->success('添加成功！', url('memberlevel/levelList'));
            } else {
                $this->error('添加失败！', url('memberlevel/levelList'));
            }
        }
        return view();
    }

    /**
     * 会员等级修改
     */
    public function levelEdit($level_id)
    {
        $levelRes = db('member_level');
        if (request()->isPost()) {
            $data = input('post.');
            //验证添加的数据
            $validate = validate('Memberlevel');
            if (!$validate->scene('edit')->check($data)) {
                $this->error($validate->getError());
                die;
            }
            $levelEdit = $levelRes->where(array('level_id' => $level_id))->setField($data);
            if ($levelEdit !== false) {
                $this->success('修改成功！', url('memberlevel/levelList'));
            } else {
                $this->error('修改失败！', url('memberlevel/levelList'));
            }

        }

        $levelRes = $levelRes->where(array('level_id' => $level_id))->find();
        $this->assign([
            'levelRes' => $levelRes,
        ]);
        return view();
    }

    /**
     * 会员等级删除
     */
    public function levelDel($level_id)
    {
        $levelEdit = db('member_level')->where(array('level_id' => $level_id))->delete($level_id);
        if ($levelEdit) {
            $this->success('删除成功！', url('memberlevel/levelList'));
        } else {
            $this->error('删除失败！', url('memberlevel/levelList'));
        }
    }

}