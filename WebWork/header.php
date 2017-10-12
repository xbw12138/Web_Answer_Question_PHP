<?php
/**
 * Created by PhpStorm.
 * User: xubowen
 * Date: 2017/6/4
 * Time: 下午4:22
 */
require_once 'lib/session_login.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
    <title><?php echo $_SESSION['title'];?></title>
    <!-- CSS fonts.googleapis.com -->
    <link href="//fonts.lug.ustc.edu.cn/icon?family=Material+Icons" rel="stylesheet">
    <link href="asset/materialize/css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="asset/materialize/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
<script src="asset/js/jQuery.min.js"></script>
<nav class="light-blue lighten-1" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="index.php" class="brand-logo"><?php echo $_SESSION['title'];?></a>
        <ul class="right hide-on-med-and-down">
            <li><a href="index.php">首页</a></li>
            <?php if(isset($_SESSION['types'])&&$_SESSION['types']=="N"){//学生
                //echo '<li><a href="problem.php">题目</a></li>';
            }else{//老师
                echo '<li><a href="myquestion.php">我的题</a></li>';
            }?>
            <li><a href="standing.php" >排名</a></li>
            <li><a href="lib/session_logout.php" >注销登录</a></li>
        </ul>

        <ul id="nav-mobile" class="side-nav">
            <li><a href="index.php">首页</a></li>
            <?php if(isset($_SESSION['types'])&&$_SESSION['types']=="N"){//学生
                //echo '<li><a href="problem.php">题目</a></li>';
            }else{//老师
                echo '<li><a href="myquestion.php">我的题</a></li>';
            }?>
            <li><a href="standing.php" >排名</a></li>
            <li><a href="lib/session_logout.php" >注销登录</a></li>
        </ul>
        <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
</nav>

