<?php
/**
 * Created by PhpStorm.
 * User: xubowen
 * Date: 2017/6/4
 * Time: 下午3:02
 */
require_once '../lib/config.php';
session_start();
$email = $_GET['email'];
$passwd = $_GET['passwd'];
$sql="select user_password,types,id from user_information where user_name='$email'";
$result = mysqli_query($conn,$sql);
$row=mysqli_fetch_row($result);
if($passwd!=null&&$email!=null){
    if($row[0]==$passwd){
        $rs['code'] = '1';
        $rs['ok'] = '1';
        $rs['msg'] = "欢迎回来";
        $_SESSION['username']=$email;
        $_SESSION['types']=$row[1];
        $_SESSION['id']=$row[2];
        if($row[1]=="Y"){
            $_SESSION['title']="出题系统";
        }else{
            $_SESSION['title']="选题系统";
        }
    }else{
        $rs['code'] = '0';
        $rs['msg'] = "账号或者密码错误";
    }
}else{
    $rs['code'] = '0';
    $rs['msg'] = "请填写账号或密码";
}

echo json_encode($rs);