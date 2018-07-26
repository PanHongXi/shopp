<?php
/**
 * Created by PhpStorm.
 * User: HSPHX
 * Date: 2018/2/7
 * Time: 10:27
 */

namespace app\admin\controller;

use think\Controller;
use Catetree\Catetree;

class Conf extends Base
{
    /**
     * 配置项
     */
    public function confList()
    {
        $conf = db('conf');
        //修改数据
        if (request()->isPost()) {
            $data = input('post.');
            //复选框空选处理
            $checkFields2D = $conf->field('conf_ename')->where(array('form_stype' => 'checkbox'))->select();
            //处理为一维数组
            $checkFields = array();
            if ($checkFields2D) {
                foreach ($checkFields2D as $k => $v) {
                    $checkFields[] = $v['conf_ename'];
                }
            }
            $allFields = array();//所有发送的字段组成的数组
            foreach ($data as $k => $v) {
                //处理文字部分的数据
                $allFields[] = $k;
                if (is_array($v)) {
                    $value = implode(',', $v);
                    $conf->where(array('conf_ename' => $k))->update(['value' => $value]);

                } else {
                    $conf->where(array('conf_ename' => $k))->update(['value' => $v]);
                }
            }
            //处理当复选框未选中任何的值，则设置为空
            foreach ($checkFields as $k => $v) {
                if (!in_array($v, $allFields)) {
                    $conf->where(array('conf_ename' => $v))->update(['value' => '']);
                }
            }
            //多图片上传
            if ($_FILES) {
                foreach ($_FILES as $k => $v) {
                    if ($v['tmp_name']) {
                        //处理有新图片上传，删除旧的图片
                        $imgs = $conf->field('value')->where(array('conf_ename' => $k))->find();
                        if ($imgs['value']) {
                            $oimg = IMG . 'conf/' . $imgs['value'];
                            if (file_exists($oimg)) {
                                @unlink($oimg);
                            }
                        }
                        //保存上传的新图片
                        $imgSrc = $this->upload($k);
                        $conf->where(array('conf_ename' => $k))->update(['value' => $imgSrc]);
                    }
                }
            }
            $this->success('配置成功！');
        }
        //获取数据
        $ShoppConfRes = $conf->where(array('conf_stype' => 1))->select();
        $GoodsConfRes = $conf->where(array('conf_stype' => 2))->select();
        $this->assign([
            'ShoppConfRes' => $ShoppConfRes,
            'GoodsConfRes' => $GoodsConfRes,
        ]);
        return view();
    }

    /**
     * 配置管理列表
     */
    public function confLst()
    {
        //处理排序的数据
        $conf = db('conf');
        if (request()->isPost()) {
            $data = input('post.');
            foreach ($data['sort'] as $k => $v) {
                $conf->where('conf_id', '=', $k)->update(['sort' => $v]);
            }
            $this->success('排序成功！');
        }
        //展示配置数据
        $confRes = $conf->order('sort DESC')->paginate(15);
        $page = $confRes->render();
        $this->assign([
            'confRes' => $confRes,
            'page' => $page,
        ]);
        return view();
    }

    /**
     * 添加配置
     */
    public function confAdd()
    {
        if (request()->isPost()) {
            $data = input('post.');
            //将中文状态的‘，’替换成英文状态下的‘,’
            if ($data['form_stype'] == 'redio' || $data['form_stype'] == 'select' || $data['form_stype'] == 'checkbox') {
                $data['values'] = str_replace('，', ',', $data['values']);
                $data['value'] = str_replace('，', ',', $data['value']);
            }
            //验证添加的数据
            $validate = validate('Conf');
            if (!$validate->check($data)) {
                $this->error($validate->getError());
                die;
            }
            //添加时间
            $data['addtime'] = time();
            $conf = db('conf')->insert($data);
            if ($conf) {
                $this->success('添加配置成功！', url('Conf/confLst'));
            } else {
                $this->error('添加配置失败！', url('Conf/confAdd'));
            }
        }
        return view();
    }

    /**
     * 配置修改
     */
    public function confEdit($conf_id)
    {

        if (request()->isPost()) {
            $data = input('post.');
            //将中文状态的‘，’替换成英文状态下的‘,’
            if ($data['form_stype'] == 'redio' || $data['form_stype'] == 'select' || $data['form_stype'] == 'checkbox') {
                $data['values'] = str_replace('，', ',', $data['values']);
                $data['value'] = str_replace('，', ',', $data['value']);
            }
            //验证添加的数据
//            $validate = validate('Conf');
//            if (!$validate->check($data)) {
//                $this->error($validate->getError());
//                die;
//            }
            $conf = db('conf')->where(array('conf_id' => $conf_id))->setField($data);
            if ($conf !== false) {
                $this->success('修改配置成功！', url('Conf/confLst'));

            } else {
                $this->error('修改配置失败！');
            }
        }

        $confRes = db('conf')->where(array('conf_id' => $conf_id))->find();
        $this->assign([
            'confRes' => $confRes,
        ]);
        return view();
    }

    /**
     * 配置删除
     */
    public function confDel($conf_id)
    {

        $conf = db('conf')->delete($conf_id);
        if ($conf !== false) {
            $this->success('修改删除成功！', url('Conf/confLst'));

        } else {
            $this->error('修改删除失败！');
        }
    }

    /**
     * 配置预览
     */
    public function preview($conf_id)
    {
        $confRes = db('conf')->where(array('conf_id' => $conf_id))->find();
        $this->assign([
            'confRes' => $confRes,
        ]);
        return view();

    }

    /**
     * 图片处理
     */
    public function upload($imgNema)
    {
        // 获取表单上传文件 例如上传了001.jpg
        $file = request()->file($imgNema);
        // 移动到框架应用根目录/public/uploads/ 目录下
        $info = $file->validate(['size' => 905678, 'ext' => 'jpg,png,gif'])->move(ROOT_PATH . 'public' . DS . 'static' . DS . 'uploads' . DS . 'conf');
        if ($info) {
            // 成功上传后 获取上传信息
            return $info->getSaveName();
        } else {

            // 上传失败获取错误信息
            echo $file->getError();
            die;
        }
    }
}
