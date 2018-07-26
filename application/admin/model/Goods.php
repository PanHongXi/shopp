<?php

namespace app\admin\model;

use think\Model;

class Goods extends Model
{
    protected $field = true;

    protected static function init()
    {
        //前置钩子上传商品主图
        Goods::beforeInsert(function ($goods) {

            if ($_FILES['og_thumb']['tmp_name']) {
                $imgThumb = $goods->upload('og_thumb');
                $ogThumbs = date('Ymd') . DS . $imgThumb;//原图
                $bigThumb = date('Ymd') . DS . 'big_' . $imgThumb;//大图
                $midThumb = date('Ymd') . DS . 'mid_' . $imgThumb;//中图
                $smThumb = date('Ymd') . DS . 'sm_' . $imgThumb;//小图

                //生成商品主图缩略图
                $image = \think\Image::open(UPLOADS . $ogThumbs);

                // 按照原图的比例生成一个最大为150*150的缩略图并保存为thumb.png
                $image->thumb(config('big_thumb_width'), config('big_thumb_height'))->save(UPLOADS . $bigThumb);
                $image->thumb(config('mid_thumb_width'), config('mid_thumb_height'))->save(UPLOADS . $midThumb);
                $image->thumb(config('sm_thumb_width'), config('sm_thumb_height'))->save(UPLOADS . $smThumb);
                $goods->og_thumb = $ogThumbs;
                $goods->big_thumb = $bigThumb;
                $goods->md_thumb = $midThumb;
                $goods->sm_thumb = $smThumb;

            }
            $goods->goods_code = time() . rand(111111, 999999);//商品编码
            $goods->addtime = time();//添加时间
        });

        //后置钩子方法获取商品的id
        Goods::afterInsert(function ($goods) {
            $goodsData = input('post.');//接收商品的数据
            $goods_id = $goods->goods_id;//接收商品的id

            //批量插入会员价格
            $mpriceRes = $goods->mp;

            if ($mpriceRes) {
                foreach ($mpriceRes as $k => $v) {//循环获取相应的会员级别id以及价格
                    if (trim($v) == '') {//判断是否为空
                        continue;
                    } else {
                        db('member_price')->insert(['mlevel_id' => $k, 'member_price' => $v, 'goods_id' => $goods_id]);
                    }
                }
            }

            //处理商品推荐位
            if (isset($goodsData['recpos']))
            {
                foreach ($goodsData['recpos'] as $k => $v)
                {
                    db('rec_item')->insert(['rec_id' => $v, 'value_id' => $goods_id, 'value_type' => 1]);
                }
            }

            //處理添加的商品屬性
            $i = 0;
            if (isset($goodsData['goods_attr'])) {
                foreach ($goodsData['goods_attr'] as $k => $v) {
                    if (is_array($v)) {
                        //處理單選屬性類型
                        if (!empty($v)) {
                            foreach ($v as $k1 => $v1) {
                                //處理屬性類型為空的情況,如果是空的，則去掉
                                if (!$v1) {
                                    $i++;
                                    continue;
                                }
                                db('goods_attrs')->insert(['attr_id' => $k, 'attr_values' => $v1, 'goods_id' => $goods_id, 'price' => $goodsData['attr_price'][$i]]);
                                $i++;
                            }
                        }
                    } else {
                        //處理唯一屬性類型
                        db('goods_attrs')->insert(['attr_id' => $k, 'attr_values' => $v, 'goods_id' => $goods_id]);
                    }
                }
            }

            //处理商品相册上传的图片
            if ($goods->_hasImages($_FILES['goods_photos']['tmp_name'])) {
                // 获取表单上传文件
                $files = request()->file('goods_photos');
                foreach ($files as $file) {

                    // 移动到框架应用根目录/public/uploads/ 目录下
                    $info = $file->move(ROOT_PATH . 'public' . DS . 'static' . DS . 'uploads' . DS . 'goods');

                    if ($info) {

                        // 输出 42a79759f284b767dfcb2a0197904287.jpg
                        $photoName = $info->getFilename();
                        $ogPhoto = date('Ymd') . DS . $photoName;//原图
                        $bigPhoto = date('Ymd') . DS . 'big_' . $photoName;//大图
                        $midPhoto = date('Ymd') . DS . 'mid_' . $photoName;//中图
                        $smPhoto = date('Ymd') . DS . 'sm_' . $photoName;//小图

                        //生成商品主图缩略图
                        $image = \think\Image::open(UPLOADS . $ogPhoto);

                        // 按照原图的比例生成一个最大为150*150的缩略图并保存为thumb.png
                        $image->thumb(config('big_thumb_width'), config('big_thumb_height'))->save(UPLOADS . $bigPhoto);
                        $image->thumb(config('mid_thumb_width'), config('mid_thumb_height'))->save(UPLOADS . $midPhoto);
                        $image->thumb(config('sm_thumb_width'), config('sm_thumb_height'))->save(UPLOADS . $smPhoto);
                        db('goods_photos')->insert(['goods_id' => $goods_id, 'sm_photo' => $smPhoto, 'mb_photo' => $midPhoto, 'big_photo' => $bigPhoto, 'og_photo' => $ogPhoto]);
                    } else {
                        // 上传失败获取错误信息
                        echo $file->getError();
                    }
                }
            }
        });

        //后置钩子删除与商品有关的数据
        Goods::beforeDelete(function ($goods) {
            $goodsId = $goods->goods_id;

            //删除商品的主图以及缩略图
            if ($goods->og_thumb)
            {
                $thumb = [];
                $thumb[] = UPLOADS . $goods->og_thumb;
                $thumb[] = UPLOADS . $goods->big_thumb;
                $thumb[] = UPLOADS . $goods->md_thumb;
                $thumb[] = UPLOADS . $goods->sm_thumb;
                foreach ($thumb as $k => $v)
                {
                    if (file_exists($v))
                    {
                        @unlink($v);
                    }
                }
            }

            //删除原来的推荐位数据
            $rec_item = db('rec_item');
            $rec_item->where(array('value_type' => 1, 'value_id' => $goodsId))->delete();

            //删除关联的会员价格
            db('member_price')->where(array('goods_id' => $goodsId))->delete();

            //删除关联的商品属性
            db('goods_attrs')->where(array('goods_id' => $goodsId))->delete();

            //删除关联的商品相册
            $goodsPhotoRes = \model('GoodsPhotos')->where('goods_id', '=', $goodsId)->select();
            if (!empty($goodsPhotoRes))
            {
                foreach ($goodsPhotoRes as $k => $v)
                {
                    $photo = [];
                    $photo[] = UPLOADS . $v['og_photo'];
                    $photo[] = UPLOADS . $v['big_photo'];
                    $photo[] = UPLOADS . $v['mb_photo'];
                    $photo[] = UPLOADS . $v['sm_photo'];
                    foreach ($photo as $k1 => $v1)
                    {
                        if (file_exists($v1))
                        {
                            @unlink($v1);
                            db('goods_photos')->where(array('goods_id' => $goodsId))->delete();
                        }
                    }
                }

            }
        });

        //前置钩子，处理修改上传的商品数据
        Goods::beforeUpdate(function ($goods) {
            $goodsData = input('post.');//接收商品的数据
            $member_price = db('member_price');
            $goods_id = $goods->goods_id;

            //删除原来的推荐位数据
            $rec_item = db('rec_item');
            $rec_item->where(array('value_type' => 1, 'value_id' => $goods_id))->delete();

            //插入新的推荐位数据
            if (isset($goodsData['recpos']))
            {
                foreach ($goodsData['recpos'] as $k => $v)
                {
                    $rec_item->insert(['rec_id' => $v, 'value_id' => $goods_id, 'value_type' => 1]);
                }
            }

            //處理修改界面新增的商品屬性
            $goodsData = input('post.');
            if (isset($goodsData['goods_attr']))
            {
                $i = 0;
                foreach ($goodsData['goods_attr'] as $k => $v)
                {
                    if (is_array($v))
                    {

                        //處理單選屬性類型
                        if (!empty($v)) {
                            foreach ($v as $k1 => $v1)
                            {

                                //處理屬性類型為空的情況,如果是空的，則去掉
                                if (!$v1)
                                {
                                    $i++;
                                    continue;
                                }
                                db('goods_attrs')->insert(['attr_id' => $k, 'attr_values' => $v1, 'goods_id' => $goods_id, 'price' => $goodsData['attr_price'][$i]]);
                                $i++;
                            }
                        }
                    }
                    else
                    {
                        //處理唯一屬性類型
                        db('goods_attrs')->insert(['attr_id' => $k, 'attr_values' => $v, 'goods_id' => $goods_id]);
                    }
                }
            }

            //处理修改商品的属性
            if (isset($goodsData['old_goods_attr'])) {
                $attrPrice = $goodsData['old_attr_price'];
                $idsArr = array_keys($attrPrice);
                $valuesArr = array_values($attrPrice);
                $i = 0;
                foreach ($goodsData['old_goods_attr'] as $k => $v)
                {
                    if (is_array($v))
                    {

                        //處理單選屬性類型
                        if (!empty($v)) {
                            foreach ($v as $k1 => $v1)
                            {
                                //處理屬性類型為空的情況,如果是空的，則去掉
                                if (!$v1)
                                {
                                    $i++;
                                    continue;
                                }
                                db('goods_attrs')->where(array('id' => $idsArr[$i]))->update(['attr_values' => $v1, 'price' => $valuesArr[$i]]);
                                $i++;
                            }
                        }
                    }
                    else
                    {
                        //處理唯一屬性類型
                        db('goods_attrs')->where(array('id' => $idsArr[$i]))->update(['attr_values' => $v, 'price' => $valuesArr[$i]]);
                        $i++;
                    }
                }
            }

            //删除原来的商品会员价格，再插入新的商品会员价
            $member_price->where(array('goods_id' => $goods_id))->delete();

            //批量插入会员价格
            $mpriceRes = $goods->mp;
            if ($mpriceRes) {
                foreach ($mpriceRes as $k => $v) {//循环获取相应的会员级别id以及价格
                    if (trim($v) == '') {//判断是否为空
                        continue;
                    } else {
                        $member_price->insert(['mlevel_id' => $k, 'member_price' => $v, 'goods_id' => $goods_id]);
                    }
                }
            }

            //处理上传的商品主图 $_FILES['og_thumb']['tmp_name']
            if ($_FILES['og_thumb']['tmp_name']) {

                //删除旧的商品主图
                @unlink(UPLOADS . $goods->og_thumb);
                @unlink(UPLOADS . $goods->big_thumb);
                @unlink(UPLOADS . $goods->md_thumb);
                @unlink(UPLOADS . $goods->sm_thumb);

                //修改新的商品主图
                $imgThumb = $goods->upload('og_thumb');
                $ogThumbs = date('Ymd') . DS . $imgThumb;//原图
                $bigThumb = date('Ymd') . DS . 'big_' . $imgThumb;//大图
                $midThumb = date('Ymd') . DS . 'mid_' . $imgThumb;//中图
                $smThumb = date('Ymd') . DS . 'sm_' . $imgThumb;//小图

                //生成商品主图缩略图
                $image = \think\Image::open(UPLOADS . $ogThumbs);

                // 按照原图的比例生成一个最大为150*150的缩略图并保存为thumb.png
                $image->thumb(config('big_thumb_width'), config('big_thumb_height'))->save(UPLOADS . $bigThumb);
                $image->thumb(config('mid_thumb_width'), config('mid_thumb_height'))->save(UPLOADS . $midThumb);
                $image->thumb(config('sm_thumb_width'), config('sm_thumb_height'))->save(UPLOADS . $smThumb);
                $goods->og_thumb = $ogThumbs;
                $goods->big_thumb = $bigThumb;
                $goods->md_thumb = $midThumb;
                $goods->sm_thumb = $smThumb;
            }
            $goods->uptime = time();//商品修改时间

            //处理修改商品的相册
            //处理商品相册上传的图片
            if ($goods->_hasImages($_FILES['goods_photos']['tmp_name'])) {

                // 获取表单上传文件
                $files = request()->file('goods_photos');
                foreach ($files as $file) {

                    // 移动到框架应用根目录/public/uploads/ 目录下
                    $info = $file->move(ROOT_PATH . 'public' . DS . 'static' . DS . 'uploads' . DS . 'goods');
                    if ($info) {
                        // 输出 42a79759f284b767dfcb2a0197904287.jpg
                        $photoName = $info->getFilename();
                        $ogPhoto = date('Ymd') . DS . $photoName;//原图
                        $bigPhoto = date('Ymd') . DS . 'big_' . $photoName;//大图
                        $midPhoto = date('Ymd') . DS . 'mid_' . $photoName;//中图
                        $smPhoto = date('Ymd') . DS . 'sm_' . $photoName;//小图

                        //生成商品主图缩略图
                        $image = \think\Image::open(UPLOADS . $ogPhoto);

                        // 按照原图的比例生成一个最大为150*150的缩略图并保存为thumb.png
                        $image->thumb(config('big_thumb_width'), config('big_thumb_height'))->save(UPLOADS . $bigPhoto);
                        $image->thumb(config('mid_thumb_width'), config('mid_thumb_height'))->save(UPLOADS . $midPhoto);
                        $image->thumb(config('sm_thumb_width'), config('sm_thumb_height'))->save(UPLOADS . $smPhoto);
                        db('goods_photos')->insert(['goods_id' => $goods_id, 'sm_photo' => $smPhoto, 'mb_photo' => $midPhoto, 'big_photo' => $bigPhoto, 'og_photo' => $ogPhoto]);
                    } else {

                        // 上传失败获取错误信息
                        echo $file->getError();
                    }
                }
            }
        });
    }


    //判断商品相册是否有图片上传
    public function _hasImages($photoArr)
    {
        foreach ($photoArr as $k => $v) {
            if ($v) {
                return true;
            }
        }
        return false;
    }

    //处理上产图片的路径
    public function upload($imgName)
    {
        // 获取表单上传文件 例如上传了001.jpg
        $file = request()->file($imgName);

        // 移动到框架应用根目录/public/uploads/ 目录下
        if ($file) {
            $info = $file->move(ROOT_PATH . 'public' . DS . 'static' . DS . 'uploads' . DS . 'goods');
            if ($info) {
                return $info->getFilename();
            } else {

                // 上传失败获取错误信息
                echo $file->getError();
            }
        }
    }
}