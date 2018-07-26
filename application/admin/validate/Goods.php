<?php

namespace app\admin\validate;

use think\Validate;

class Goods extends Validate
{
    protected $rule = [
        'goods_name' => 'require',
        'goodsclass_id' => 'require',
        'brand_id' => 'require',
        'goods_desc' => 'require',
        'markte_price' => 'require|gt:0|number',
        'shop_price' => 'require|gt:0|number',
        'goods_weight' => 'require|gt:0|number',


    ];

    protected $message = [
        'goods_name.require' => '商品名称不能为空!',
        'goodsclass_id.require' => '商品分类不能为空!',
        'brand_id.require' => '商品品牌不能为空!',
        'goods_desc.require' => '商品描述不能为空!',
        'markte_price.number' => '市场价格必须为数字!',
        'markte_price.require' => '市场价格不能为空!',
        'markte_price.gt' => '市场价格必须大于0!',
        'shop_price.gt' => '本店价格必须大于0!',
        'shop_price.number' => '本店价格必须为数字!',
        'shop_price.require' => '本店价格不能为空!',
        'goods_weight.gt' => '商品重量必须大于0!',
        'goods_weight.number' => '商品重量必须为数字!',
        'goods_weight.require' => '商品重量不能为空!',
    ];
}