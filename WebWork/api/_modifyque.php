<?php
/**
 * Created by PhpStorm.
 * User: xubowen
 * Date: 2017/6/6
 * Time: 下午3:52
 */
require_once '../lib/config.php';
$pro = $_GET['pro'];
$daan = $_GET['daan'];
$type = $_GET['type'];
$id = $_GET['id'];
$pattern = "/\([^\)]*\)/";
$str=preg_replace($pattern, "<a>$daan</a>", $pro);
if($pro!=null&&$daan!=null){
    $sql="update ".$type." set pro='$pro',daan='$daan',problem='$str' where id='$id'";
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

