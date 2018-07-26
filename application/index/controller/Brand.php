<?php
namespace app\index\controller;
use think\Controller;
use Catetree\Catetree;
class Brand extends Base
{
    /**
     * ajax获取品牌，点击获一批
     * @return array
     * @throws \think\exception\DbException
     */
    public function brandList()
    {
        $data = array();
        $brandRes = db('brand')->paginate(17);
        $data['totalPage'] = $brandRes->lastPage();
        $brands = $brandRes->items();

        $html = '';
        $html.= '<div class="brand-list" id="recommend_brands"><ul>';
        foreach ($brands as $k => $v)
        {
            $html .= '<li><div class="brand-img"><a href="'.$v['brand_url'].'" target="_blank"><img src="'.config('view_replace_str.__IMG__').'/'.$v['thumb'].'"></a></div><a target="_blank" href="'.$v['brand_url'].'"><div class="brand-mash"></div></a></li>';
        }
        $html .= '</ul><a href="javascript:void(0);" ectype="changeBrand" class="refresh-btn"><i class="iconfont icon-rotate-alt"></i><span>换一批</span></a></div>';
        $data['list'] = $html;
        //返回
        return json($data);
    }

}












































