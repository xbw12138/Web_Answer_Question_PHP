<?php
/**
 * Created by PhpStorm.
 * User: xubowen
 * Date: 2017/6/6
 * Time: 上午12:36
 */
$response = array();
require("lib/db_config.php");
require("lib/config.php");
$who=$_SESSION['id'];
function selectDanxuanProblem(){//全部单选题
    global $conn;
    global $who;
    $sql1="select problem, daan, type,id from danxuan where who='$who'";
    $result1=mysqli_query($conn,$sql1);
    $array=array();
    if($result1){
        while($row=mysqli_fetch_array($result1)){
            $array[] = array(
                'pro'=>$row[0],
                'daan'=>$row[1],
                'type'=>$row[2],
                'id'=>$row[3],
            );
        }
        //if($array!=null)
        return $array;//json_encode($array,JSON_UNESCAPED_UNICODE);
    }else {
        $array[] = array(
            'pro'=>'',
            'daan'=>'',
            'type'=>'',
            'id'=>'',
        );
        return $array;//json_encode($array,JSON_UNESCAPED_UNICODE);
    }
}
function selectDuoxuanProblem(){//全部多选题
    global $conn;
    global $who;
    $sql1="select problem, daan, type,id from duoxuan where who='$who'";
    $result1=mysqli_query($conn,$sql1);
    $array=array();
    if($result1){
        while($row=mysqli_fetch_array($result1)){
            $array[] = array(
                'pro'=>$row[0],
                'daan'=>$row[1],
                'type'=>$row[2],
                'id'=>$row[3],
            );
        }
        //if($array!=null)
        return $array;//json_encode($array,JSON_UNESCAPED_UNICODE);
    }else {
        $array[] = array(
            'pro'=>'',
            'daan'=>'',
            'type'=>'',
            'id'=>'',
        );
        return $array;//json_encode($array,JSON_UNESCAPED_UNICODE);
    }
}
function selectPanduanProblem(){//全部判断题
    global $conn;
    global $who;
    $sql1="select problem, daan, type,id from panduan where who='$who'";
    $result1=mysqli_query($conn,$sql1);
    $array=array();
    if($result1){
        while($row=mysqli_fetch_array($result1)){
            $array[] = array(
                'pro'=>$row[0],
                'daan'=>$row[1],
                'type'=>$row[2],
                'id'=>$row[3],
            );
        }
        //if($array!=null)
        return $array;//json_encode($array,JSON_UNESCAPED_UNICODE);
    }else {
        $array[] = array(
            'pro'=>'',
            'daan'=>'',
            'type'=>'',
            'id'=>'',
        );
        return $array;//json_encode($array,JSON_UNESCAPED_UNICODE);
    }
}