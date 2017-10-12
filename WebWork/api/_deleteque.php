<?php
/**
 * Created by PhpStorm.
 * User: xubowen
 * Date: 2017/6/6
 * Time: 下午3:10
 */
require_once '../lib/config.php';
$type = $_GET['type'];
$id = $_GET['id'];
$sql="delete from ".$type." where id='$id'";
$result = mysqli_query($conn,$sql);
if($result){
    echo ' <script>alert("删除成功!")</script> ';
    echo " <script>window.location='../myquestionshow.php?type=".$type."';</script> " ;
}