<?php
/**
 * Created by PhpStorm.
 * User: xubowen
 * Date: 2017/6/4
 * Time: 下午2:22
 */
session_start();
session_destroy();
header("Location:../login.php");
exit;