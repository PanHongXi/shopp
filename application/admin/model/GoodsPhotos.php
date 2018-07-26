<?php

namespace app\admin\model;

use think\Model;

class GoodsPhotos extends Model
{

    protected $tableName = 'goods_photos';//不包含表前缀
    protected $trueTableName  = 'sh_goods_photos';//包含表前缀

}