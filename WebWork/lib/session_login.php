<?php
/**
 * Created by PhpStorm.
 * User: xubowen
 * Date: 2017/6/4
 * Time: 下午2:19
 */
session_start();
if(!isset($_SESSION['username'])){
    header("Location:login.php");
}