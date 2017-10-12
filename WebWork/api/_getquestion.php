<?php
/**
 * Created by PhpStorm.
 * User: xubowen
 * Date: 2017/6/6
 * Time: 下午3:58
 */
require("lib/db_config.php");
require("lib/config.php");
function getQuestion($type,$id){
    global $conn;
    $sql = "SELECT pro,daan FROM ".$type." WHERE id='$id'";
    $array=array();
    if($result=mysqli_query($conn,$sql)) {
        while ($row = mysqli_fetch_array($result)) {
            $array[] = array(
                0=>$row[0],
                1=>$row[1],
            );
        }
        return $array;
    }
}