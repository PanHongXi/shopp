<?php
namespace app\member\model;

use think\Model;

 class User extends Model
 {
     public function login($data, $type = 0)
     {
         $userData = array();
         $userData['username'] = trim($data['username']);
         $userData['password'] = md5($data['password']);

         //验证用户名，密码
         $user = db('user')
             ->whereOr(array('username' => $userData['username']))
             ->whereOr(array('mobile_phone' => $userData['username']))
             ->whereOr(array('email' => $userData['username']))->find();

         if ($user) {
             if ($user['password'] == $userData['password']) {

                 //缓存用户的id，用户名
                 session('uid', $user['uid']);
                 session('username', $user['username']);

                 //写入用户的等级以及等级id
                 $points = $user['points'];
                 $member_level = db('member_level')
                     ->where('bom_point', '<=', $points)
                     ->where('top_point', '>=', $points)
                     ->find();

                 session('level_id', $member_level['level_id']);//等级id
                 session('level_rates', $member_level['rates']);//等级折扣率

                 //记住用户的登录信息，写入cookie
                 if (isset($data['remember'])) {
                     //保存时间
                     $aMoth = 30*24*60*60;

                     //用户账号密码
                     $username = encryption($user['username'], 0);
                     $password = encryption($data['password'], 0);

                     //加密写入cookie
                     cookie('username', $username, $aMoth, '/');
                     cookie('password', $password, $aMoth, '/');
                 }

                 $msg = ['error' => 0, 'message' => "", 'url' => ''];
                 if ($type == 1) {
                     return $msg;
                 } else {
                     return json($msg);
                 }

             } else {
                 $msg = ['error' => 1, 'message' => "<i class='iconfont icon-minus-sign'></i>用户名或密码错误", 'url' => ''];
                 if ($type == 1) {
                     return $msg;
                 } else {
                     return json($msg);
                 }
             }

         } else {
             $msg = ['error' => 1, 'message' => "<i class='iconfont icon-minus-sign'></i>用户名或密码错误", 'url' => ''];
             if ($type == 1) {
                 return $msg;
             } else {
                 return json($msg);
             }
         }
     }

     //用户退出登录
     public function loginOut()
     {
         session(null);

         //清除cookie
         cookie('username', null);
         cookie('password', null);
     }
 }