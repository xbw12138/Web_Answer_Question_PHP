<?php
/**
 * Created by PhpStorm.
 * User: xubowen
 * Date: 2017/6/5
 * Time: 下午10:08
 */
require_once '../lib/config.php';
session_start();
$pro = $_GET['pro'];
$daan = $_GET['daan'];
$type = $_GET['type'];
$pattern = "/\([^\)]*\)/";
$str=preg_replace($pattern, "<a>$daan</a>", $pro);
$who=$_SESSION['id'];

if($pro!=null&&$daan!=null){
    $sql="insert into ".$type."(problem,pro,daan,who) values('$str','$pro','$daan','$who')";
    $result = mysqli_query($conn,$sql);
    if($result){
        $rs['code'] = '1';
        $rs['ok'] = '1';
        $rs['msg'] = "录入成功";
    }else{
        $rs['code'] = '0';
        $rs['msg'] = "录入异常";
    }
}else{
    $rs['code'] = '0';
    $rs['msg'] = "问题答案不能为空";
}
echo json_encode($rs);