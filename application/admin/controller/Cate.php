<?php

namespace app\admin\controller;

use think\Controller;
use Catetree\Catetree;//把无限极分类的类引用进来
class Cate extends Base
{

    /**
     * 文章分类列表
     */
    public function cateList()
    {
        $cateTree = new Catetree();
        $cateObj = db('cate');

        //处理排序
        if (request()->isPost())
        {
            $data = input('post.');
            $cateSort = $cateTree->sorts($data['sort'], $cateObj);
            $this->success('修改排序成功！', 'cateList');
        }

        $cateRes = $cateObj->order('sort asc')->select();
        $cateRes = $cateTree->catetree($cateRes);

        //绑定数据
        $this->assign(['cateRes' => $cateRes,]);
        return view('cateList');
    }

    /**
     * 文章分类添加
     */
    public function cateAdd()
    {
        if (request()->isPost()) {
            $data = input('post.');

            //判断是否可以添加子栏目
            if (in_array($data['pid'], ['1', '3'])) {
                $this->error('网店分类不能作为上级分类！');
                die;
            }
            $cateId = db('cate')->field('pid')->find($data['pid']);
            $cateId = $cateId['pid'];
            if ($cateId == 2) {
                $this->error('此分类不能作为上级分类！');
                die;
            }
            if ($data['pid'] == 2) {
                $data['cate_type'] = 3;
            }
            //验证添加的数据
            $validate = validate('Cate');
            if (!$validate->check($data)) {
                $this->error($validate->getError());
                die;
            }

            //执行添加操作
            $cate = db('cate')->insert($data);
            if ($cate) {
                $this->success('添加分类成功！', 'cateList');
            } else {
                $this->error('添加分类失败！', 'cateAdd');
            }
        }
        $cateRes = db('cate')->select();
        $cateTree = new Catetree();
        $cateRes = $cateTree->catetree($cateRes);
        $this->assign([
            'cateRes' => $cateRes,
        ]);
        return view('cateAdd');
    }

    /**
     * 文章分类删除
     * 如果分类下面有子栏目的话会一起删除
     */
    public function cateDel($cate_id)
    {

        $cateRes = db('cate');
        $cateTree = new Catetree();
        $sonids = $cateTree->childrenids($cate_id, $cateRes);
        $sonids[] = intval($cate_id);//获取本栏目的id
        $arr = [1, 2, 3];
        $arrRes = array_intersect($arr, $sonids);
        if ($arrRes) {
            $this->error('系统内置分类栏目不允许删除！', 'cateList');
            die;
        }
        //删除栏目前该栏目下是否有文章和图片
        $article = db('article');
        foreach ($sonids as $k => $v) {
            $artRes = $article->field('id,thumb')->where(array('cate_id' => $v))->select();
            foreach ($artRes as $k1 => $v1) {
                $thumbSrc = IMG . $v1['thumb'];
                if (file_exists($thumbSrc)) {
                    @unlink($thumbSrc);
                }
                $article->delete($v1['id']);
            }
        }

        $del = db('cate')->delete($sonids);
        if ($del) {
            $this->success('删除分类成功！', 'cateList');
        } else {
            $this->error('删除分类失败！', 'cateList');
        }
    }

    /**
     *文章分类修改
     */
    public function cateEdit($cate_id)
    {

        if (request()->isPost()) {
            $data = input('post.');
            //验证添加的数据
            $validate = validate('Cate');
            if (!$validate->check($data)) {
                $this->error($validate->getError());
                die;
            }

            $cateRow = db('cate')->where(array('id' => $cate_id))->setField($data);
            if (false !== $cateRow) {
                $this->success('修改成功！', 'cateList');
            } else {
                $this->success('修改失败！', 'cateList');
            }
            die;
        }

        $cate = db('cate');
        $cateEdit = $cate->where(array('id' => $cate_id))->find();
        $cateRes = $cate->select();
        $cateTree = new Catetree();
        $cateRes = $cateTree->catetree($cateRes);
        $this->assign([
            'cateRes' => $cateRes,
            'cateEdit' => $cateEdit,
        ]);
        return view('cateEdit');

    }
}