<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件

/*
 * 对用户写入cookie的账号信息加密
 * @param string $value
 * @param int $type 0:加密  1：解密
 *
 * ^：异位或机密
 * $key = md5('http://panhongxi.top/');
 */
function encryption ($value, $type) {

    $key = config('encryption_key');
    if ($type == 0) {
        //加密
        return str_replace('=', '', base64_encode($value ^ $key)) ;
    } else {
        //解密
        $value = base64_decode($value);
        return  $value ^ $key;
    }
}

//发送邮件
function sendEmail($to, $title, $content)
{
//    require_once('./Plugin/phpmailer/class.phpmailer.php');
    $mail = new \PHPMailer();
    // 设置为要发邮件
    $mail->IsSMTP();
    // 是否允许发送HTML代码做为邮件的内容
    $mail->IsHTML(TRUE);
    $mail->CharSet = 'UTF-8';
    // 是否需要身份验证
    $mail->SMTPAuth = TRUE;
    /*  邮件服务器上的账号是什么 -> 到163注册一个账号即可 */
    $mail->From = "hspanhongxi@163.com";
    $mail->FromName = "hspanhongxi";
    $mail->Host = "smtp.163.com";  //发送邮件的服务协议地址
    $mail->Username = "hspanhongxi";
    $mail->Password = "2009131191pan";
    // 发邮件端口号默认25
    $mail->Port = 25;
    // 收件人
    $mail->AddAddress($to);
    // 邮件标题
    $mail->Subject = $title;
    // 邮件内容
    $mail->Body = $content;
    return ($mail->Send());
}

/**
 * 处理ueditor编辑器上传的图片函数
 * 递归方法处理
 */
function my_scandir($dir = PICTURE)
{
    $dir_list = scandir($dir);
    $files = array();
    foreach ($dir_list as $file)
    {
        if ($file != '.' && $file != '..')
        {
            //判断是文件还是文件夹
            if (is_dir($dir . '/' . $file))
            {
                //文件的处理方式
                $files[$file] = my_scandir($dir . '/' . $file);
            }
            else
            {
                //文件的处理方式
                $files[] = $dir . '/' . $file;
            }
        }
    }
    return $files;
}

/**
 * 字符串截取并且超出显示省略号
 * @param $text  字符串
 * @param $length 截取的长途
 * @return string
 */
function subtext($text, $length)
{

    if (mb_strlen($text, 'utf8') > $length)
    {
        return mb_substr($text, 0, $length, 'utf8') . '…';
    }

    return $text;

}
/**
 * $msg 待提示的消息
 * $url 待跳转的链接
 * $icon 这里主要有两个，5和6，代表两种表情（哭和笑）
 * $time 弹出维持时间（单位秒）
 */
function alert($msg='',$url='',$icon='',$time=3)
{
    $str = '<script type="text/javascript" src="' . config('admin_static') . 'https://code.jquery.com/jquery-3.3.1.min.js"></script><script type="text/javascript" src="' . config('admin_static') . '/shopp/public/static/layer/layer.js"></script>';//加载jquery和layer
    $str .= '<script>$(function(){layer.msg("' . $msg . '",{icon:' . $icon . ',time:' . ($time * 500) . '});setTimeout(function(){self.location.href="' . $url . '"},1000)});</script>';//主要方法
    return $str;
}
