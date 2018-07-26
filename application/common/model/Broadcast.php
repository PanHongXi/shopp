<?php
namespace app\common\model;
use think\Model;
class Broadcast extends Model
{
    //获取首页轮播图片
    public function getBroadcast()
    {
        $broadList = $this->limit(4)->order('sort desc')->where(array('status' => 1))->select();

        return $broadList;
    }
}