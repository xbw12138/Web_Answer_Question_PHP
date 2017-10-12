<?php
/**
 * Created by PhpStorm.
 * User: xubowen
 * Date: 2017/6/4
 * Time: 下午3:38
 */
require_once '../lib/config.php';
$email = $_GET['email'];
$passwd = $_GET['passwd'];
$passwd2 = $_GET['passwd2'];
if($passwd!=$passwd2){
    $rs['code'] = '0';
    $rs['msg'] = "两次密码输入不一致";
}else{
    if($passwd!=null&&$email!=null){
        $sql="insert into user_information(user_name,user_password) values('$email','$passwd')";
        $result = mysqli_query($conn,$sql);
        if($result){
            $rs['code'] = '1';
            $rs['ok'] = '1';
            $rs['msg'] = "注册成功";
        }else{
            $rs['code'] = '0';
            $rs['msg'] = "注册失败";
        }
    }else{
        $rs['code'] = '0';
        $rs['msg'] = "请填写账号或密码";
    }
}

echo json_encode($rs);