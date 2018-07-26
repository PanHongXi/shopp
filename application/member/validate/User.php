<?php
namespace app\member\validate;
use think\Validate;
class User extends Validate
{
    protected $rule = [
        'username'  =>  'require|max:25|min:4|unique:user',
        'password' => 'require|min:6',
        'mobile_phone' => 'number|length:11|unique:user',
        'send_code' => 'number|length:6',
        'mobile_code' => 'number|length:6',
        'email' =>  'email|unique:user',
        'mobileagreement' => 'require|accepted',
        'register_type' => 'in:0,1',
    ];

    protected $message = [
        'username.require'  =>  '用户名不能为空！',
        'username.max'  =>  '用户名过长！',
        'username.min'  =>  '用户名过短！',
        'username.unique'  =>  '用户名已被占用！',
        'email' =>  '邮箱格式错误',
        'email' =>  '邮箱已被占用',
        'password.require' =>  '密码不能为空！',
        'password.min' =>  '密码过短！',
        'mobile_phone.number' =>  '手机号码格式不正确！',
        'mobile_phone.length' =>  '手机号码格式不正确！',
        'mobile_phone.unique' =>  '该手机已被占用！',
        'send_code.number' =>  '邮箱验证码不正确！',
        'send_code.length' =>  '邮箱验证码不正确！',
        'mobile_code.number' =>  '手机证码不正确！',
        'mobile_code.length' =>  '手机证码不正确！',
        'mobileagreement.require' =>  '注册协议必须！',
        'register_type.in' =>  '注册失败！',
    ];

}