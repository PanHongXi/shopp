<?php

namespace app\index\controller;
class Goodslist extends Base
{
    public function category()
    {
        return view();
    }

    public function getCateInfo()
    {
        $data = array();
        $data['topic_content'] = '111';
        $data['cat_content'] = '111';
        $data['brands_ad_content'] = '111';

        return json($data);
    }
}