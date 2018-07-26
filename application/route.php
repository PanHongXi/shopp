<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
use think\Route;
Route::rule('cate/:id','index/Cate/index','get',['ext'=>'html|htm'],['id'=>'\d{1,4}']);
Route::rule('article/:id','index/Article/index','get',['ext'=>'html|htm'],['id'=>'\d{1,5}']);
Route::rule('article/:id','index/Article/index','get',['ext'=>'html|htm'],['id'=>'\d{1,5}']);
//商品详情
//Route::rule('goods/:goodsid','index/Goods/goodsDetails','get',['ext'=>'html|htm'],['goodsid'=>'\d{1,5}']);
//购物车页面
Route::rule('cartList1','index/Flow/cartList1','get',['ext'=>'html|htm']);
