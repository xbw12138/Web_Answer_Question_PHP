<?php
/**
 * Created by PhpStorm.
 * User: xubowen
 * Date: 2017/6/4
 * Time: 下午3:07
 */
require("db_config.php");
$conn=mysqli_connect($mysql_server_name,$mysql_username,$mysql_password) or die("error connecting") ;
mysqli_query($conn,"set names 'utf8'");
mysqli_select_db($conn,$mysql_database);