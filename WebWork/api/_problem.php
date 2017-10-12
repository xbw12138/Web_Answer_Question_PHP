<?php
/**
 * Created by PhpStorm.
 * User: xubowen
 * Date: 2017/6/4
 * Time: 下午4:52
 */
$response = array();
require("lib/db_config.php");
require("lib/config.php");

function selectRandomProblem(){//随机100题
    global $conn;
    global $danxuan;
    global $duoxuan;
    global $panduan;
    $sql1="select pro, daan, type from danxuan order by rand() limit $danxuan";
    $sql2="select pro, daan, type from duoxuan order by rand() limit $duoxuan";
    $sql3="select pro, daan, type from panduan order by rand() limit $panduan";
    $result1=mysqli_query($conn,$sql1);
    $result2=mysqli_query($conn,$sql2);
    $result3=mysqli_query($conn,$sql3);
    $array=array();
    if($result1&&$result2&&$result3){
        while($row=mysqli_fetch_array($result1)){
            $array[] = array(
                'pro'=>$row[0],
                'daan'=>$row[1],
                'type'=>$row[2],
            );
        }
        while($row=mysqli_fetch_array($result2)){
            $array[] = array(
                'pro'=>$row[0],
                'daan'=>$row[1],
                'type'=>$row[2],
            );
        }
        while($row=mysqli_fetch_array($result3)){
            $array[] = array(
                'pro'=>$row[0],
                'daan'=>$row[1],
                'type'=>$row[2],
            );
        }
        return $array;//json_encode($array,JSON_UNESCAPED_UNICODE);
    }else {
        $array[] = array(
            'pro'=>'',
            'daan'=>'',
            'type'=>'',
        );
        return $array;//json_encode($array,JSON_UNESCAPED_UNICODE);
    }
}
function selectDanxuanProblem(){//全部单选题
    global $conn;
    $sql1="select pro, daan, type from danxuan";
    $result1=mysqli_query($conn,$sql1);
    $array=array();
    if($result1){
        while($row=mysqli_fetch_array($result1)){
            $array[] = array(
                'pro'=>$row[0],
                'daan'=>$row[1],
                'type'=>$row[2],
            );
        }
        return $array;//json_encode($array,JSON_UNESCAPED_UNICODE);
    }else {
        $array[] = array(
            'pro'=>'',
            'daan'=>'',
            'type'=>'',
        );
        return $array;//json_encode($array,JSON_UNESCAPED_UNICODE);
    }
}
function selectDuoxuanProblem(){//全部多选题
    global $conn;
    $sql1="select pro, daan, type from duoxuan";
    $result1=mysqli_query($conn,$sql1);
    $array=array();
    if($result1){
        while($row=mysqli_fetch_array($result1)){
            $array[] = array(
                'pro'=>$row[0],
                'daan'=>$row[1],
                'type'=>$row[2],
            );
        }
        return $array;//json_encode($array,JSON_UNESCAPED_UNICODE);
    }else {
        $array[] = array(
            'pro'=>'',
            'daan'=>'',
            'type'=>'',
        );
        return $array;//json_encode($array,JSON_UNESCAPED_UNICODE);
    }
}
function selectPanduanProblem(){//全部判断题
    global $conn;
    $sql1="select pro, daan, type from panduan";
    $result1=mysqli_query($conn,$sql1);
    $array=array();
    if($result1){
        while($row=mysqli_fetch_array($result1)){
            $array[] = array(
                'pro'=>$row[0],
                'daan'=>$row[1],
                'type'=>$row[2],
            );
        }
        return $array;//json_encode($array,JSON_UNESCAPED_UNICODE);
    }else {
        $array[] = array(
            'pro'=>'',
            'daan'=>'',
            'type'=>'',
        );
        return $array;//json_encode($array,JSON_UNESCAPED_UNICODE);
    }
}