<?php

namespace app\index\model;

use think\Model;

class Article extends Model
{
    public function getFooterArts()
    {
        //获取帮助分类
        $helpCateRes = \model('cate')->where(array('cate_type' => 3))->select();
        foreach ($helpCateRes as $k => $v)
        {
            $helpCateRes[$k]['arts'] = $this->where(array('cate_id' => $v['id']))->select();
        }

        return $helpCateRes;
    }

    public function getShopInfo()
    {
        //获取底部帮助分类
        $helpShoppRes = \model('article')->where(array('cate_id' => 3))->field('id,article_title')->select();

        return $helpShoppRes;
    }

    /**
     * @param $cateId  分类id
     * @param $limit   获取的数量
     * @return mixed
     * @throws \think\Exception
     * @throws \think\exception\DbException
     */
    public function getArticleList($cateId, $limit)
    {
        $list = db('article')->where(array('cate_id' => $cateId))->limit($limit)->select();

        return $list;
    }
}