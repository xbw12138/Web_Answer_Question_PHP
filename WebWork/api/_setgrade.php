<?php
/**
 * Created by PhpStorm.
 * User: xubowen
 * Date: 2017/6/6
 * Time: 下午2:36
 */
require_once '../lib/config.php';
session_start();
$total = $_GET['total'];
$id=$_SESSION['id'];
$sql="update user_information set standing = standing+'$total' where id ='$id'";
$result = mysqli_query($conn,$sql);
if($result){
    $rs['code'] = '1';
    $rs['ok'] = '1';
    $rs['msg'] = "提交成功";
}else{
    $rs['code'] = '0';
    $rs['msg'] = "提交失败";
}
echo json_encode($rs);