<?php
namespace app\index\model;

use think\Model;

class Cate extends Model
{
    public function getCate ($type, $pid)
    {

        //获取分类
        $cateRes = \model('cate')->where(array('cate_type' => $type, 'pid' => $pid))->select();
        foreach ($cateRes as $k => $v)
        {
            //获取二级分类
            $cateRes[$k]['children'] = $this->where(array('pid' => $v['id']))->select();
        }

        //返回
        return $cateRes;
    }

    //面包屑导航处理
    public function position($cateId)
    {
        $data = $this->field('id, pid, cate_name')->select();

        return $this->_position($data, $cateId);
    }

    private function _position($data, $cateId)
    {
        static $arr = array();
        $cates = $this->field('id, pid,cate_name')->find($cateId);

        if (empty($arr))
        {
            $arr[] = $cates;
        }

        foreach ($data as $k => $v)
        {
            if ($v['id'] == $cates['pid'])
            {
                $arr[] = $v;
                $this->_position($data, $v['id']);
            }

        }
        return array_reverse($arr);
    }

}