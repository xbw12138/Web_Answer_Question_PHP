<?php
/**
 * Created by PhpStorm.
 * User: xubowen
 * Date: 2017/6/4
 * Time: 下午1:44
 */
require_once 'header.php';
require_once 'api/_problem.php';
?>
    <div class="container" style="margin-bottom: 35px;">
        <div class="section">
            <h1>查看试题</h1>
            <a href="problemshow.php?type=danxuan">(一)查看全部单选题</a><br>
            <a href="problemshow.php?type=duoxuan">(二)查看全部多选题</a><br>
            <a href="problemshow.php?type=panduan">(三)查看全部判断题</a><br>
            <h1>查看随机试题</h1>
            <a href="problemshow.php?type=random">查看随机试题100道</a>
        </div>
    </div>
<?php
require_once 'footer.php';
?>