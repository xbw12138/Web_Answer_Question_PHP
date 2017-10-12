<?php
/**
 * Created by PhpStorm.
 * User: xubowen
 * Date: 2017/6/6
 * Time: 下午12:34
 */
require("lib/db_config.php");
require("lib/config.php");
function getStanding(){
    global $conn;
    $sql = "SELECT id,user_name,standing FROM user_information WHERE types='N' ORDER BY standing DESC";
    $array=array();
    if($result=mysqli_query($conn,$sql)) {
        while ($row = mysqli_fetch_array($result)) {
            $array[] = array(
                0=>$row[0],
                1=>$row[1],
                2=>$row[2],
            );
        }
        return $array;
    }
}
