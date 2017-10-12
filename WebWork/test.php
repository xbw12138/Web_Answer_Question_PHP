<?php
/**
 * Created by PhpStorm.
 * User: xubowen
 * Date: 2017/6/5
 * Time: 下午11:07
 */
//session_start();
//echo $_SESSION['id'];

$str = 'ABC';
$A = preg_match('/.*R.*/', $str, $matches);
echo $A;