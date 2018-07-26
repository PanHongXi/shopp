<?php

namespace app\member\controller;
header("content-Type: text/html; charset=Utf-8");
use ChuanglanSmsHelper\ChuanglanSmsApi;
use PHPMailer\PHPMailer\PHPMailer;
use think\Controller;
use app\member\validate;
use app\index\controller\Base;
class Account extends Base
{
    //用户注册
    public function reg()
    {
        if (request()->isPost()) {
            $data = input('post.');

            //验证注册信息
            $validate = validate('User');
            if (!$validate->check($data)) {
                return alert($validate->getError(), '', 5, 3);
            }
           $userData = array();
           $userData['username'] = trim($data['username']);
           $userData['password'] = md5($data['password']);
           $userData['mobile_phone'] = $data['mobile_phone'];
           $userData['email'] = $data['email'];
           $userData['register_type'] = $data['register_type'];
           $userData['reg_time'] = time();

           //保存数据
            $user = db('user')->insert($userData);
            if ($user) {
                $loginRes = $this->login(1);//完成注册登录系统
                if ($loginRes['error'] == 0) {
                    $this->success('注册成功，正在跳转...', 'User/index', '', 2);
                } else {
                    $this->success('注册成功，正在跳转...', 'User/index', '', 2);
                }

            } else {
                return alert('注册失败...', '', 5, 3);
            }

        }
        return view();
    }

    //验证用户名是否存在
    public function isRegistered() {
       if (request()->isAjax()) {
           $username = input('username');
           $userInfo = db('user')->where(array('username' => $username))->find();

           if ($userInfo) {
               return false;
           } else {
               return true;
           }
       } else {
           $this->error('非法申请！');
       }
    }

    //验证手机号码是否存在
    public function checkPhone()
    {
        if (request()->isAjax()) {
            $mobile_phone = input('mobile_phone');
            $mobile_phone = db('user')->where(array('mobile_phone' => $mobile_phone))->find();

            if ($mobile_phone) {
                return false;
            } else {
                return true;
            }
        } else {
            $this->error('非法申请！');
        }
    }

    //验证邮箱是否存在
    public function checkEmails()
    {
        if (request()->isAjax()) {
            $email = input('email');
            $email = db('user')->where(array('email' => $email))->find();

            if ($email) {
                return false;
            } else {
                return true;
            }
        } else {
            $this->error('非法申请！');
        }
    }

    /*
     * 验证码发送
     * type:0:手机注册 1：找回密码 2：发送密码
     * */
    public function sendSms($type = 0, $password = 0)
    {
        $clapi = new ChuanglanSmsApi();
        $code = mt_rand(100000, 999999);

        $tipSms = '';
        if ($password == 0) {
            $tipSms = '【云琰商城】您好，您的验证码是：' . $code;
        } else {
            $tipSms = '【云琰商城】您好，您的新密码是：'. $password.'，请妥善保管！';
        }

        //判断是往哪个号码发送短信
        if ($password == 0) {
            $phoneNum = trim(input('phoneNum'));
        } else {
            //找回密码号码
            $phoneNum = session('getPasswordPhone');
        }

        $result = $clapi->sendSMS($phoneNum, $tipSms);

        if (!is_null(json_decode($result))) {
            $output = json_decode($result, true);

            if (isset($output['code']) && $output['code'] == '0') {

                if ($type == 0) {
                    //缓存手机验证码
                    session('mobile_code', $code);
                } else {
                    //缓存找回密码验证码，号码
                    session('getPasswordCode', $code);
                    session('getPasswordPhone', $phoneNum);
                }

                $msg = ['status' => 0, 'msg' => '发送成功'];
                return json($msg);

            } else {

                $msg = ['status' => 1, 'msg' => $output['errorMsg']];
                return json($msg);

            }
        } else {

            $msg = ['status' => 2, 'msg' => '内部错误！'];
            return json($msg);
        }

    }

    //验证手机验证码
    public function checkdSendMobileCode ()
    {
        if (request()->isAjax()) {
            $moblieCode = input('mobile_code');

            if ($moblieCode == session('mobile_code')) {
                return true;
            } else {
                return false;
            }
        } else {
            $this->error('非法申请！');
        }
    }

    //邮箱发送
    public function sendEmail($email, $password = 0)
    {
        if ($email) {
            $to = $email;
        } else {
            $to = trim(input('email'));
        }

        $title = '云琰商城';
        $code = mt_rand(100000, 999999);

        if ($password == 0) {
            $content = '您的验证码是：' . $code;

        } else {
            $content = '您的新密码是：' . $password .',请妥善保管！';
        }
        $mail = new PHPMailer();

        // 设置为要发邮件
        $mail->IsSMTP();

        // 是否允许发送HTML代码做为邮件的内容
        $mail->IsHTML(TRUE);
        $mail->CharSet = 'UTF-8';

        // 是否需要身份验证
        $mail->SMTPAuth = TRUE;

        /*  邮件服务器上的账号是什么 -> 到163注册一个账号即可 */
        $mail->From = "hspanhongxi@163.com";
        $mail->FromName = "【云琰商城】";
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

        $res = $mail->Send();

        //判断邮箱发送状态
        if ($res == true) {
            //缓存邮箱验证码
            session('emailCode', $code);

            $msg = ['status' => 1, 'msg' => '发送成功'];
            return json($msg);
        } else {
            $msg = ['status' => 0, 'msg' => '发送失败'];
            return json($msg);
        }
    }

    //验证邮箱验证码
    public function checkdEmailSendCode ()
    {
        if (request()->isAjax()) {
            $emailCode = input('send_code');

            if ($emailCode == session('emailCode')) {
                return true;
            } else {
                return false;
            }
        } else {
            $this->error('非法申请！');
        }
    }

    /*
     * 阿里云短信
     * type: 1:注册场景 2：找回密码发送场景 15：发送密码场景
     * $password：0：注册，找回密码发送验证码，
     * */
    public function aliCode($type = 1, $password = 0)
    {
        $phoneNum = input('phoneNum');
        $code = mt_rand(100000, 999999);
        $host = "https://feginesms.market.alicloudapi.com";
        $path = "/codeNotice";
        $method = "GET";
        $appcode = "0745c5ccaeba481a8f23a4793deee594";
        $headers = array();
        array_push($headers, "Authorization:APPCODE " . $appcode);

        //判断使用场景
        if ($password == 0) {
            $skin = 1;
            $code = $code;
        } else {
            $skin = 15;
            $code = $password;
        }

        //判断是往哪个号码发送短信
        if ($password == 0) {
            $phoneNum = trim(input('phoneNum'));
        } else {
            //找回密码号码
            $phoneNum = session('getPasswordPhone');
        }

        $querys = "param=".$code."&phone=".$phoneNum."&sign=1&skin=".$skin;
        $bodys = "";
        $url = $host . $path . "?" . $querys;

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_FAILONERROR, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        if (1 == strpos("$".$host, "https://"))
        {
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        }
        //{"Message":"OK","RequestId":"9CC596A3-75AC-4680-A28E-5481AFCBC24D","BizId":"673514431403802678^0","Code":"OK"}
        //18798225203
        $curl = curl_exec($curl);
        $Codes = json_decode($curl);
        $Codes = get_object_vars($Codes)['Code'];

        if ($Codes == 'OK') {
            if ($type == 1) {
                //缓存手机验证码
                session('mobile_code', $code);
            } else {
                //缓存找回密码验证码，号码
                session('getPasswordCode', $code);
                session('getPasswordPhone', $phoneNum);
            }
            $msg = ['status' => 0, 'msg' => '发送成功'];
            return json($msg);

        } else {

            $msg = ['status' => 1, 'msg' => '发送失败'];
            return json($msg);
        }
    }

    /*
     * 用户登录
     * type: 0:为客户端返回json格式， 1：为服务端返回数组格式
     * */
    public function login($type = 0)
    {
        if (request()->isPost()) {
            $data = input('post.');

            return model('user')->login($data, $type);
        }
        return view();
    }

    //检查用户是否登录
    public function checkLogin()
    {
        $uid = session('uid');
        if ($uid) {
            $arr['error'] = 0;
            $arr['uid'] = $uid;
            $arr['username'] = session('username');

            return json($arr);

        } else {

            //用户自动登录
            if (cookie('username') && cookie('password')) {

                //读取用户的账号信息
                $data['username'] = encryption(cookie('username'), 1);
                $data['password'] = encryption(cookie('password'), 1);

                //验证用户账号信息
                $loginRes = model('user')->login($data, 1);

                //检查用户登录信息
                if ($loginRes['error'] == 0) {
                    $arr['error'] = 0;
                    $arr['uid'] = $uid;
                    $arr['username'] = session('username');

                    return json($arr);
                }
            }

            $arr['error'] = 1;
            return json($arr);
        }
    }

    //用户找回密码
    public function getPassword()
    {
        return view();
    }

    //检测用户找回密码手机是否存在
    public function checkSendSms()
    {
        $data = input('post.');
        $phoneNum = trim($data['phoneNum']);//检测收吗的空格

        if ($phoneNum) {
            $user = db('user')->where(array('mobile_phone' => $phoneNum))->find();
            if ($user) {
               return $this->aliCode(2, 0);
            } else {
                $arr['msg'] = ['该号码不存在！'];
                $arr['status'] = 1;
                return json($arr);
            }

        } else {
            $arr['msg'] = ['请输入手机号码！'];
            $arr['status'] = 1;
            return json($arr);
        }
    }

    /*
     * 验证找回密码验证码
     * 发送用户重置密码
     * */
    public function updateSendPass()
    {
        $data = input('post.');
        $mobile_code = trim($data['mobile_code']);

        $sCode = session('getPasswordCode');
        $sPhone = session('getPasswordPhone');

        //判断验证码
        if ($mobile_code == $sCode) {
            $password = mt_rand(100000, 999999);
            $_password = md5($password);
            $update = db('user')->where(array('mobile_phone' => $sPhone))->update(['password' => $_password]);

            //发送密码
            if ($update) {
               return $this->aliCode(15, $password);
            } else {
                return false;
            }

        } else {
            return false;
        }
    }

    //邮箱找回密码
    public function sendPwdEmail()
    {
        $data = input('post.');
        $username['username'] = trim($data['user_name']);
        $email['email'] = trim($data['email']);

        $user = db('user')->where(array('username' => $username['username']))->find();
        if ($user) {
            if ($email['email'] == $user['email']) {
                $password = mt_rand(100000, 999999);
                $_password = md5($password);
                $update = db('user')->where(array('email' => $email['email']))->update(['password' => $_password]);

                //发送密码
                if ($update) {
                    $_msg = $this->sendEmail($email['email'], $password);
                    $msg['msg'] = '修改密码成功！';
                    $msg['status'] = 0;
                } else {
                    $msg['msg'] = '用户名与邮箱不匹配,请重新输入！';
                    $msg['status'] = 3;

                }
            } else {
                $msg['msg'] = '用户名与邮箱不匹配,请重新输入！';
                $msg['status'] = 2;
            }
        } else {
            $msg['msg'] = '用户名与邮箱不匹配,请重新输入！';
            $msg['status'] = 1;
        }

        $this->assign([
            'show_right' => 1,//判断分类与商品列表的样式
            'status' => $msg['status'],
            'msg' => $msg['msg'],
        ]);
        return view('index@common/tip_info');

    }

    public function json()
    {
//        $curl = '{"Message":"OK","RequestId":"9CC596A3-75AC-4680-A28E-5481AFCBC24D","BizId":"673514431403802678^0","Code":"OK"}';
//        $curl = curl_exec($curl);
//        $Codes = json_decode($curl);
//        $Codes = get_object_vars($Codes)['Code'];

        $msg = ['error' => 0, 'message' => "", 'url' => ''];
        $a = get_object_vars($msg);
        dump(json($a)) ;
    }

}