<?php
namespace app\common\model;

use think\Model;

class CategoryAd extends Model
{

    /**
     * 获取顶级分类的左侧商品
     * @param $cateId
     * @return array
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function getCategoryAd($cateId, $position)
    {
        $_data = db('category_ad')->where(array('category_id' => $cateId, 'position' => $position, 'status' => 1))->select();
        $data = array();
        foreach ($_data as $k => $v)
        {
            $data[] = $v;
        }

        return $data;
    }

}