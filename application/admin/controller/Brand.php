<?php
namespace app\admin\controller;
use think\Controller;
use Catetree\Catetree;
class Brand extends Base
{
    /**
     * 品牌列表
     * @return \think\response\View
     * @throws \think\exception\DbException
     */
    public function brandList()
    {
        $brandRes = db('brand')->paginate(15);
        $page = $brandRes->render();
        $this->assign([
            'brandRes' => $brandRes,
            'page' => $page,
        ]);
        return view();
    }

    /**
     * 品牌添加
     */
    public function brandAdd()
    {
        $update = new Catetree();
        $url = 'logo';
        if (request()->isPost())
        {
            $data = input('post.');

            if (false !== stripos(input('post.brand_url'), 'http://'))
            {
                $data['brand_url'] = input('post.brand_url');
            }
            else
            {
                $data['brand_url'] = 'http://' . input('post.brand_url');
            }

            $data['addtime'] = time();
            if ($_FILES['thumb']['tmp_name'])
            {
                $data['thumb'] = $url.'/'.$update->upload($url);
            }

            //验证添加的数据
            $validate = validate('Brand');
            if (!$validate->check($data)) {
                $this->error($validate->getError());
                die;
            }

            $brand = db('brand')->insert($data);
            if ($brand) {
                $this->success('添加品牌成功！', url('Brand/brandList'));

            } else {
                $this->error('添加品牌失败！');
            }

            return;
        }
        return view();
    }

    /**
     * 品牌删除
     */
    public function brandDel($brand_id)
    {
        $brand = db('brand')->delete($brand_id);

        //删除旧的的图片
        $oldBrandLogo = db('brand')->where(array('brand_id' => $brand_id))->field('thumb')->find();
        $oldBrandLogo = IMG . $oldBrandLogo['thumb'];
        if (file_exists($oldBrandLogo))
        {
            @unlink($oldBrandLogo);
        }
        if ($brand)
        {
            $this->success('删除品牌成功！', url('Brand/brandList'));

        }
        else
        {
            $this->error('删除品牌失败！');
        }
    }

    /**
     * 品牌修改
     */
    public function brandEdit($brand_id)
    {

        $update = new Catetree();
        $url = 'logo';
        if (request()->isPost()) {
            $data = input('post.');
            if (false !== stripos(input('post.brand_url'), 'http://')) {
                $data['brand_url'] = input('post.brand_url');
            } else {
                $data['brand_url'] = 'http://' . input('post.brand_url');
            }
            if ($_FILES['thumb']['tmp_name']) {
                //删除旧的的图片
                $oldBrandLogo = db('brand')->where(array('brand_id' => $brand_id))->field('thumb')->find();
                $oldBrandLogo = IMG . $oldBrandLogo['thumb'];
                if (file_exists($oldBrandLogo)) {
                    @unlink($oldBrandLogo);
                }
                $data['thumb'] = $url.'/'.$update->upload($url);
            }

            //验证添加的数据
            $validate = validate('Brand');
            if (!$validate->check($data)) {
                $this->error($validate->getError());
                die;
            }
            $brand = db('brand')->where(array('brand_id' => $brand_id))->setField($data);
            if ($brand !== false) {
                $this->success('修改品牌成功！', url('Brand/brandList'));

            } else {
                $this->error('修改品牌失败！');
            }
        }

        $brandRes = db('brand')->where(array('brand_id' => $brand_id))->find();
        $this->assign([
            'brandRes' => $brandRes,
        ]);
        return view();
    }

    /**
     *
     * 品牌预览
     */
    public function preview($brand_id)
    {
        $brandRes = db('brand')->where(array('brand_id' => $brand_id))->find();
        $this->assign([
            'brandRes' => $brandRes,
        ]);
        return view('preview');
    }
}