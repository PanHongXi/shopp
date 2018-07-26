<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

// [ 应用入口文件 ]

// 定义应用目录
define('APP_PATH', __DIR__ . '/application/');
define('IMG', __DIR__ .'/public/static/uploads/');
define('IMGSPREAD', __DIR__ .'/shopp/public/static/uploads/');
define('PICTURE', __DIR__ .'/public/ueditor');//编辑器上传的图片路径
define('HTTP_PICTURE','/shopp/public/ueditor');//替换编辑器上传的图片路径
define('DEL_PICTURE',__DIR__ .'/.');//删除编辑器上传的图片路径
define('GOODS_THUMB',__DIR__.'/public/static/uploads/goods/thumb/');//商品的主图
define('GOODS_PHOTOS',__DIR__.'/public/static/uploads/goods/photos/');//商品的相册图片
define('UPLOADS',__DIR__.'/public/static/uploads/goods/');

// 加载框架引导文件
require __DIR__ . '/thinkphp/start.php';
$bulid = include APP_PATH.'build.php';
\think\Build::run($bulid);